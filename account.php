<?php
include 'connect.php';
session_start();
$buyerId = $_SESSION['buyer_id'];
?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <section id="header">
        
        <h1 class="heading"><a href="index.html">SuperBid</a></h1>
    <ul id="bar">
        <li><a style="color:#088178"  class="bar12" href="buyer.php">Home</a></li>
        <li><a class="bar12" href="auctions.php">Auctions</a></li>
        <li><a class="bar12" href="about.html">About</a></li>
        <li><a class="bar12" href="help.html">Help</a></li>
        <li><a class="bar12" href="account.php">My Account</a></li>
        <li><a class="bar12" href="mybid.php">My Bids</a></li>
        <form action="logOff.php" method="post">
        <input type="submit" class="bar12" name="logoff" value="Log Off" class="bar12"/>
        </form>
</ul>
    
    </section>

    <?php

    $sql = "select * from buyer where BID = $buyerId";
    $result = mysqli_query($con,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
        $id = $row['BID'];
        $name = $row['Username'];
        $address = $row['Address'];
        $email = $row['Email'];
        $password = $row['Password'];

        echo '<table width = 75% id = "user" align="center">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <td>'.$name.'</td></tr>
            <tr>
            <th scope="col">Address</Address></th>
            <td>'.$address.'</td></tr>
            <tr>
            <th scope="col">Eamil</th>
            <td>'.$email.'</td></tr>
            <tr>
            <th scope="col">Password</th>
            <td>'.$password.'</td></tr>
        </thead>
        <tbody><br><br>
        <button class = "submit" ><a href="updatebyBuyer.php? updateid='.$id.'">Update</a></button>';
    }
    }
    ?>


</tbody>
</table>

</body>
</html> 