<?php

function getTotalUsers() {
    include 'dbh.php';
    require_once 'package/setLog.php';

    $query = "SELECT COUNT(*) FROM users";
    $table = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($table);
    setLog("database queries", "Getting total users..");
    
    setLog("database queries", "Total users fetched! Database has {$row[0]} users");
    return $row[0];
}