<?php

function addItem($author, $itemName ,$amount) {
    require_once 'validateUser.php';
    include 'dbh.php';
    require_once 'package/setLog.php';

    $query = "SELECT * FROM inventory WHERE mine_name='$itemName' AND mine_author='$author'";
    $table = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($table);

    if ($row['mine_name'] === null && $row['mine_author'] === null) {
        $query = "INSERT INTO inventory(mine_author, mine_name, mine_amount) VALUES('$author','$itemName','$amount')";
        mysqli_query($conn, $query);
        setLog("database queries", "{$author} does not have {$itemName}, Now inserting $amount...");
    } else {
        $query = "UPDATE inventory SET mine_amount = mine_amount + $amount WHERE mine_author = '$author' AND mine_name = '$itemName'";
        mysqli_query($conn, $query);
        setLog("database queries", "{$author} has {$itemName}, Now upadting to +$amount");
    }

}