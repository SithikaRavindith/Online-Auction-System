<?php
    include 'connect.php';

?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="auctions.css">
    <style>
div.gallery {
  margin-top: 20px;
  margin-left: 80px;
  margin-bottom: 20px;
  border: 2px solid #ccc;
  float: left;
  width: 250px;
  background-color: white;
  /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s; */

  /* position: absolute; */
}

.itemlist{
    background-color: none;
  margin-top: 20px;
  display: grid;
  grid-template-columns: auto auto auto auto;
}

div.gallery:hover {
  border: 2px solid #3d3c3c;
  /* box-shadow: 0 8px 16px 0 rgba(155, 54, 54, 0.2); */
}

div.gallery img {
  width: 100%;
  height: 250px;
  /* padding: 10px; */
}

div.desc {
  padding: 10px;
  text-align: center;
  color: black;
  font-size: 20px;
}

/* div.prz {
  padding: 10px;text-align: center;color: #ffffff;font-size: 10px;
} */



</style>
</head>

<body>
    <!-- Nav bar section -->
    <section id="header">

    <h1 class="heading"><a href="index.html">SuperBid</a></h1>
    <ul id="bar">
        <li><a style="color:#088178"  class="bar12" href="index.php">Home</a></li>
        <li><a class="bar12" href="auction2.php">Auctions</a></li>
        <li><a class="bar12" href="about2.html">About</a></li>
        <li><a class="bar12" href="help2.html">Help</a></li>
        <li><a class="bar12" href="signin.php">Log in</a></li>
        <li><a class="bar12" href="signup.php">Register</a></li>
        </ul>

    </section>
    <div class="itemlist">
    <!-- Body section -->
            <?php
                $sql = "SELECT `IID`,`Name`,`startPrice`,`Description`,`startDate`,`endDate`,`photo` FROM `item`";
                $result = mysqli_query($con,$sql);
                if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id=$row['IID'];
                    $photo = $row['photo'];
                    $name = $row['Name'];
                ?>

<div class="gallery">
          <?php echo '<a href="bid2.php?id='.$id.'">';?>
          <?php echo '<img src="data:phot0;base64,' . base64_encode($photo) . ' "  >';?>
        </a>
          <div class="desc">
            <b><?php echo $row['Name']; ?></b><br><br>
            
            <label >Start Price:</label>
            <?php echo $row['startPrice']; ?><br>
            
            </div>
        </div>


        <?php
                }
            }  


    ?>



            
        
            </div>

    <!-- Footer section  -->

    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong> 146/6 Medhanada Mawatha,Pahala Bomiriya,Kaduwela </p>
            <p><strong>Phone: </strong> +94 776926567</p>
            <p><strong>Hours: </strong> 9:00 - 20:00,Mon - Sat</p>
        </div>
    
        <div class="col">
            <h4>About</h4>
            <a href="about.html">About us</a>
            <a href="catergorise.html">Catergories</a>
            <a href="#">Terms [& Conditions</a>
            <a href="#">Contact us</a>
        </div>
    
        <div class="col">
            <h4>My Account</h4>
            <a href="signin.html">Sign In</a>
            <a href="#">View cart</a>
            <a href="buying.html">Buying</a>
            <a href="selling.html">Selling</a>
            <a href="help.html">Help</a>
        </div>
    
       
    
        <div class="copyright">
            <p>@2023,Tech2 etc - HTML CSS Ecommerce Template</p>
        </div>
    </footer>
</body>    
</html>