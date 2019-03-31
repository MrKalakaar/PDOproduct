

<!DOCTYPE html>
<html>
    <head>
  <title>Blog 21</title>
  <link rel="stylesheet" href="style.css"/> 
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
    <body>
         <br><br>
 <?php
include("auth.php"); 


echo "Welcome:-" . $_SESSION['username']; echo "<br><br>";

?>
            <br/><br/>
            
        <table border="1" cellspacing="1" cellpadding="1">    
            <form>
        </tr>
           
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
 <br><br>
<?php 
include 'dbclass.php';
$obj = new dbclass();
if(isset($_GET['register']))
{
    $r = $obj->product_insert_more($_SESSION['username'],$_GET['pname'], $_GET['desc'], $_GET['qty'] , $_GET['price']);
    
}

$r = $obj->findproduct($_SESSION['username']);

?>
<br/><br/>
  <a href="logout.php" >Log out</a>
    </body>