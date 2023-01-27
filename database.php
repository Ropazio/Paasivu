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

function get_notes($user_notes) {
    global $pdo;

    // Get all notes
    $query = "SELECT * FROM notes WHERE user_notes = ?";
    $sth = $pdo->prepare($query);
    $sth->execute([$user_notes]);

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

//////////////////////////////////////////////////////////////////////////////

?>