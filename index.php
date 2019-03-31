<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Blog 21</title>
        <link rel="stylesheet" href="style.css"/> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
    <br><br><center>
        <h3>Log in here</h3>
        <table border="1" cellspacing="1" cellpadding="1" >


            <form>
                <tr> <th>username:</th> 
                    <td><input type="text" name="name" ></td></tr>
                <tr> <th>password:</th>
                    <td><input type="text" name="pwd" ></td> </tr>
                <tr><td><input type="submit" name="login" value="Login" > </td>
                </tr>
        </table>

        <br/><br/><br/><br/>
        <h3>Register product from here </h3>

        <table border="1" cellspacing="1" cellpadding="1">                </tr>
           
            <tr><th>Product name: </th> 
                <td> <input type="text" name="pname"  > </td>
            </tr>
            <tr><th>Desc:</th> 
                <td><input type="text" name="desc" ></td>
            </tr>
            <tr><th>Qty :</th>  
                <td><input type="text" name="qty" ></td>
            </tr> 
            <tr><th>Price:</th>
                <td><input type="text" name="price" > </td>
            </tr>
            <tr>
                <td><input type="submit" name="register" value="Register"  ></td>
            </tr>


            </form>
        </table>
    </center>
    <br/> <br/>
    <?php
    if (isset($_GET['login'])) {
        include 'dbclass.php ';
        $obj = new dbclass();
        $r = $obj->validate($_GET['name'], $_GET['pwd']);
        if ($r == 1) {
            $_SESSION['username'] = $_GET['name'];
            header('location:productdetail.php');
        }
    }

    if (isset($_GET['register'])) {
        include 'dbclass.php ';
        $obj = new dbclass();
        $r = $obj->product_insert($_GET['name1'], $_GET['pwd1'], $_GET['pname'], $_GET['desc'], $_GET['qty'], $_GET['price']);
        if ($r)
            echo "inserted successfuly";
    }
    ?>



</body>
</html>
