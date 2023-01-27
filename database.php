<?php
require_once "sessions.php";

// Database

$dbConfig = [
    'name'          => 'calendar',
    'user'          => 'root',
    'password'      => '',
    'options'       => []
];

$pdo = new PDO(
    'mysql:host=127.0.0.1;dbname='. $dbConfig['name'],
    $dbConfig['user'],
    $dbConfig['password'],
    $dbConfig['options']
);


// Connecting to the database

$pdo->exec('SET NAMES utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

///////////////////////////////////////////////////////////////////////////////

function check_login($username, $password) {
    global $pdo;

    // Search user from the database users
    $query = $pdo->prepare("SELECT password, user_ID FROM users WHERE username = ?");
    
    $query->execute([$username]);
    [$user_password_in_database, $user_ID_in_database] = $query->fetch();

    // Login failed
    if (empty($user_password_in_database)) {
        return null;
    }

    // Login successful
    if ($user_password_in_database == $password) {
        return $user_ID_in_database;
    }

    // Login failed
    return null;
}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

function get_notes($user_ID) {
    global $pdo;

    // Get all notes
    $query = "SELECT * FROM notes WHERE user_ID = ?";
    $sth = $pdo->prepare($query);
    $sth->execute([$user_ID]);

    $notes = $sth->fetchAll();

    foreach ($notes as &$note) {

        $note = [
            'note_ID'       => $note['note_ID'],
            'note'          => $note['note'],
            'day'           => $note['day']
        ];
    }

    return $notes;
}

function add_note($day, $note) {
    global $pdo;

    // Add note
    $query = "INSERT INTO notes (day, note, user_ID) VALUES (?, ?, ?)";
    $pdo->prepare($query)->execute([$day, $note, $_SESSION['user_ID']]);
}

function delete_note($note_ID) {
    global $pdo;

    // Fetch all notes and delete selected note
    $pdo->prepare("DELETE FROM notes WHERE note_ID = ?")->execute([$note_ID]);
}

?>