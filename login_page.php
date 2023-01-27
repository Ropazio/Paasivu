<?php
    require_once "database.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main_page_styles.css" />
    <title>Ropaz – Kirjautuminen</title>
</head>
<body>

    <?php
        require_once "header.php";
    ?>

    <div class="bottom">

        <?php
            require_once "navi.php";
        ?>

        <div class="desc">


            <form method="POST" action="login.php">
                <div class="text">
                    <div>

                        <div>
                            <h3 class="input_headline">Käyttäjänimi:</h3>
                        </div>
                        <div class="input">
                            <input type="text" id="username" name="username" style="width: 200px;"/>
                        </div>

                        <div>
                            <h3 class="input_headline">Salasana:</h3>
                        </div>
                        <div class="input">
                            <input type="password" id="password" name="password" style="width: 200px;"/>
                        </div>
                    </div>

                    <div class="button_box">
                        <button type="submit" class="button">Kirjaudu!</button>
                    </div>
            </form>
        </div>   
    </div>
</body>
</html>
