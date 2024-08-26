<?php
session_start(); // Start the session

// Retrieve the username from the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $selectQuery = "SELECT SID FROM seller WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($con, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        $seller = mysqli_fetch_assoc($result);
        $sellerId = $seller['SID'];
    }
    else{
        echo "You don't have any item yet";
    }
}

?>
    
