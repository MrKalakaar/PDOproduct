<?php

class dbclass {

    public $cn;

    function __construct() {
        $dsn = "mysql:host=localhost;dbname=productpdo";
        $this->cn = new PDO($dsn, "root", "");
        //echo $this->cn;
        //  $cn = new Mongo();
        //   $db = $this->cn->productinfo;
        //  $col = $db->productdetail;
    }

    function validate($unm, $pwd) {
        $qry = "select * from user where username=:a and password=:b";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $unm);
        $stmt->bindParam(':b', $pwd);
        $stmt->execute();
        $c = $stmt->rowCount();
        return $c;
    }

    function findproductbyid($pid) {
        $qry = "select * from productdetail where id=:a";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $pid);
        $r = $stmt->execute();
        $r = $stmt->fetch();
        $res = array('id' => $r['id'], 'pname' => $r['pname'], 'pdesc' => $r['pdesc'], 'qty' => $r['pqty'], 'price' => $r['pprice']);
        return $res;
    }

    function findproduct($unm) {
        $qry = "select * from user where username=:a";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $unm);
        $stmt->execute();
        while ($res = $stmt->fetch()) {
            $id1 = $res['id'];
        }

        $qry = "select * from productdetail where userid=:a";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $id1);
        $stmt->execute();
        echo "<table border=1 > ";
        echo "<th> Product Name </th> <th> Product Desc </th> <th> Product Qty </th> <th> Product Price </th> ";
        while ($res = $stmt->fetch()) {

            echo "<tr> <td> $res[pname] </td> ";
            echo " <td> $res[pdesc] </td>";
            echo " <td> $res[pqty] </td>";
            echo " <td> $res[pprice] </td>  ";
            echo "<td> <a href=update.php?pid=$res[id]> update </a> </td> ";
            echo "<td> <a href=delete.php?pid=$res[id]> delete </a> </td> ";
        }
    }

    function deletepro($pid) {
        $qry = "delete * from productdetail where pid=:a";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $pid);
        $stmt->execute();
        return 1;
    }

    function updateproduct($pname, $desc, $qty, $price, $pid) {
        $qry = "update productdetail set pname=:a,pdesc=:pd,pqty=:pq,price=:pr where id=:x";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $pname);
        $stmt->bindParam(':pd', $desc);
        $stmt->bindParam(':pq', $qty);
        $stmt->bindParam(':pr', $pname);
        $stmt->bindParam(':x', $pid);
        $stmt->execute();
        return 1;
    }

    function product_insert($uname, $pwd, $pname, $desc, $qty, $price) {
        $qry = "insert into user(username, password) values(:x, :y )";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':x', $uname);
        $stmt->bindParam(':y', $pwd);
        $stmt->execute();

        $id = $this->cn->LastInsertId();


        $qry1 = "insert into productdetail(userid,pname, pdesc, pqty, pprice) values(:x, :a, :b, :c, :d )";
        $stmt = $this->cn->prepare($qry1);
        $stmt->bindParam(':x', $id);
        $stmt->bindParam(':a', $pname);
        $stmt->bindParam(':b', $desc);
        $stmt->bindParam(':c', $qty);
        $stmt->bindParam(':d', $price);
        $stmt->execute();
        //  return 1;
    }

    function product_insert_more($unm, $pname, $desc, $qty, $price) {
        $qry = "select * from user where username=:a";
        $stmt = $this->cn->prepare($qry);
        $stmt->bindParam(':a', $unm);
        $stmt->execute();
        while ($res = $stmt->fetch()) {
            $id1 = $res['id'];
        }
        $qry1 = "insert into productdetail(userid,pname, pdesc, pqty, pprice) values(:x, :a, :b, :c, :d )";
        $stmt = $this->cn->prepare($qry1);
        $stmt->bindParam(':x', $id1);
        $stmt->bindParam(':a', $pname);
        $stmt->bindParam(':b', $desc);
        $stmt->bindParam(':c', $qty);
        $stmt->bindParam(':d', $price);
        $stmt->execute();
    }

}

?>
