<?php
    require_once "database.php";
?>

<!DOCTYPE html>
<html>
<html>
<?php
    require_once "general_page_and_styles.php";
    load_head_and_page_theme("Ropaz – Kirjautuminen"); 
?>
<body>

    <?php
        load_header();
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

                    <?php if(isset($_GET['error'])): ?> 
                    <div class="error">
                        <h3>Kirjautuminen epäonnistui :(</h3>
                    </div>
                    <?php endif ?> 
            </form>
        </div>   
    </div>

<script type="text/javascript" src="scripts.js"></script>
<script>
    summer_theme()
</script>
</body>
</html>
