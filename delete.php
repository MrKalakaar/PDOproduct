<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        include("auth.php");
        include 'dbclass.php';
$obj = new dbclass();
    
    $r = $obj->deletepro($_GET['pid']);
    if($r==1)
	header('Location:productdetail.php');
else
    echo "please try again to register";

        ?>
    </body>
</html>
