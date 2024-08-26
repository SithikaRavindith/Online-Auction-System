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

    <table width = 75% id = "user" align="center">
  <thead>
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Bid amount</th>
      <th scope="col">highsetBid</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $sql = "select i.Name,i.highestBid,b.amount,b.BID,b.IID from bid b,item i where i.IID = b.IID AND b.BID = $buyerId";
    $result = mysqli_query($con,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
        $id1 = $row['IID'];
        $id2 = $row['BID'];
        $name = $row['Name'];
        $amount = $row['amount'];
        $highBid = $row['highestBid'];

        echo '<tr>
        <td>'.$name.'</td>
        <td>'.$amount.'</td>
        <td>'.$highBid.'</td>
        <td><button class = "submit" ><a href="updatebid.php?updateid1='.$id1.'&updateid2='.$id2.'">Update</a></button>
            <button class = "submit"><a href="deletebid.php?deleteid1='.$id1.'&deleteid2='.$id2.'">Delete</a></button>
        </td>
      </tr>';
    }
    }
    ?>


</tbody>
</table>

</body>

</html> 