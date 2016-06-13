<?php 
session_start();
 ?>

<html>
    <head>
        <title>MiniShop - Categories</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
    </head>
    <div id="global_content">
        <center>
            <table>
                <tr>
                    <th>ASIAN</th>
                </tr>
                <td>
                    <a href="product.php?id=1">Lee</a>
                    <a href="product.php?id=5">Wang</a>
                </td>
                <tr>
                    <th>EUROPEAN</th>
                </tr>
                <td>
                    <a href="product.php?id=4">Paul</a>
                    <a href="product.php?id=3">Sophie</a>
                </td>
                <tr>
                    <th>AFRICAN</th>
                </tr>
                <td>
                    <a href="product.php?id=2">Rolihlahla</a>
                    <a href="product.php?id=6">Koffi</a>
                </td>
            </table>
        </center>
    </div>
    <?php include("header.php") ?>
    </body>	
</html>
