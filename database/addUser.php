<?php

function addUser($username) {
    include 'dbh.php';
    require_once 'package/setLog.php';

    $query = "SELECT * FROM users WHERE username = '$username'";
    $table = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($table);
    setLog("database queries", "Validating user...");
    
    if ($row['username'] === null) {
        setLog("database queries", "Didin't find $username in users database, Now inserting...");
        $query = "INSERT INTO users(username) VALUES('$username')";
        mysqli_query($conn, $query);
        setLog("database queries", "New user added to database! ($username)");
    } else {
        setLog("database queries", "$username is already in users database...");
    }
}