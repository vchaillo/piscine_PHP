<?php
session_start();
include("function.php");
?>

<html>
    <head>
        <title>MiniShop - Product</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
    </head>
    <body>
        <div id="global_content">
            <center>
            <div class="pane">
                <div class="text">
                <?PHP
                    echo get_name_by_id($_GET["id"]); 
                ?>
                </div>
                <br />
                <img class="image" src=<?PHP echo '"'.get_image_by_id($_GET["id"]).'"'; ?> >
            </div>
            <div class="pane">
                <center>
                <div class="price">
                    <div class="text">
                    <?php
                        echo get_price_by_id($_GET["id"]). " Euros TTC";
                    ?>
                    </div>
                </div>
                <center>
                    <div>
                        <input id="add_cart" type="submit" name="submit" value="Add to cart" />
                        <?PHP
                            if ($_POST["submit"] = "Add to cart")
                                $_SESSION["cart"][] = $_GET["id"];
                        ?>
                    </div>
                </center>
                <div class="description">
                    <div class="text">
                        <?PHP
                            echo get_description_by_id($_GET["id"]);
                        ?>
                    </div>
                </div>
            </div>
            </center>
        </div>
        <?php include("header.php") ?>
    </body>	
</html>