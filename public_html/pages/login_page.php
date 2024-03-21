<?php
    require_once __DIR__ . "/../constructor.php";
    require_once get_be("database.php");
    require_once get_be("general_functionalities.php");
?>

<!DOCTYPE html>
<html>
<?php
    load_head_and_page_theme("Ropaz – Kirjautuminen"); 
?>
<body>
        
    <?php
        load_header();
    ?>

    <div class="bottom">

        <?php
            require_once "integration/navi.php";
        ?>

        <div class="desc">
            <form method="POST" data-ajax="false" action="integration/login.php">
                <div class="text">
                    <div>
                        <div>
                            <h3 class="input_headline">Käyttäjänimi:</h3>
                        </div>
                        <div class="input">
                            <input type="text" id="username" name="username"/>
                        </div>

                        <div>
                            <h3 class="input_headline">Salasana:</h3>
                        </div>
                        <div class="input">
                            <input type="password" id="password" name="password"/>
                        </div>
                    </div>

                    <div class="button_box">
                        <button type="submit" class="button" name="login_button">Kirjaudu!</button>
                    </div>

                    <?php if(isset($_GET['error'])): ?> 
                    <div class="error">
                        <h3>Kirjautuminen epäonnistui :(</h3>
                    </div>
                    <?php endif ?> 
                </div>
            </form>
        </div>   
    </div>

    <?php
        load_footer();
    ?>

<script type="text/javascript" src="../js/scripts.js"></script>
</body>
</html>
