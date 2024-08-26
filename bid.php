<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>SuperBid</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="auctions.css">
    <link rel="stylesheet" href="bid.css">
    <style>
    
  </style>
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
        <li><a class="bar12" href="mybid.php">My biddings</a></li>
        <form action="logOff.php" method="post">
        <input type="submit" class="bar12" name="logoff" value="Log Off" class="bar12"/>
        </form>
</ul>

</section>
  
  <div>
    <?php
    $id=$_GET['id'];
    $sql = "Select * from item where IID=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['IID'];
        $photo = $row['photo'];
        $name = $row['Name'];
        $price = $row['startPrice'];
        $description = $row['Description'];
        $sdate = $row['startDate'];
        $edate = $row['endDate'];
        $highBid = $row['highestBid'];
        ?>

        <div class="row">
          <div class="column">
            <div class="gallery2">
              <a href="">
                <?php echo '<img src="data:app_icon;base64,' . base64_encode($photo) . ' "  >'; ?>
              </a>
              <div class="desc2">
                <b><?php echo $name; ?></b>
              </div>
              <div style="font-size: 25px;">
            <label>Start Price:</label>
            <?php echo $price; ?><br>
            <label>Highest Bid:</label>
            <?php echo $highBid; ?><br></div>
              
            </div>

            <?php echo'<div style="margin-top:450px;margin-left:288px;">
            <button id="bid-button"><a href="bidform.php? id='.$id.'">Bid</a></button></div>'?>

          
          </div>
          <div class="column">
            <h2 style="color:black;">Description</h2>
            <p>
            <div
              style="padding: 4px;padding-left:0px;text-align: left;color:black;font-size: 18px;width:90%;overflow-wrap:break-word;">
              <?php echo $description; ?></br></br></br></br>
              <label>Start Date:</label>
              <?php echo $sdate; ?></br></br>
              <label>End Date:</label>
              <?php echo $edate; ?></br>
            </div>
            </p>
        

        <?php

      }
    }

    ?>
  </div>



</body>

</html>