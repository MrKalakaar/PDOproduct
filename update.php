<?php
include("auth.php");

echo "Welcome:-" . $_SESSION['username'];
echo "<br><br>";

include 'dbclass.php';
$obj = new dbclass();

$r = $obj->findproductbyid($_GET['pid']);
?>
<table border="1" cellspacing="1" cellpadding="1">       
    <form>
    <tr>
    <tr><th>Product id: </th> 
        <td> <input type="text" readonly name="pid" value="<?php  echo $r['id']; ?>"  > </td>
    </tr>
    <tr><th>Product name: </th> 
        <td> <input type="text" name="pname" value="<?php echo $r['pname']; ?>"  > </td>
    </tr>
    <tr><th>Desc:</th> 
        <td><input type="text" name="desc" value="<?php echo $r['pdesc']; ?>" ></td>
    </tr>
    <tr><th>Qty :</th>  
        <td><input type="text" name="qty" value="<?php echo $r['qty']; ?>" ></td>
    </tr>  
    <tr><th>Price:</th>
        <td><input type="text" name="price" value="<?php echo $r['price'] ?>" > </td>
    </tr>

    <tr>
        <td><input type="submit" name="update" value="Update"  ></td>
    </tr>


</form>
</table>
<?php
if (isset($_GET['update'])) {
    $r = $obj->updateproduct($_GET['pname'], $_GET['desc'], $_GET['qty'], $_GET['price'], $_GET['pid']);
    if ($r == 1)
        header('location:productdetail.php');
}
?>
<br/><br/>
<a href="logout.php" >Log out</a>