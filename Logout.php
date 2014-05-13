<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
session_destroy();
session_regenerate_id();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php print session_id();?></title>
    </head>
    <body>
    <center><h3>LOGIN AGAIN</h3></center>
    </body>
</html>
