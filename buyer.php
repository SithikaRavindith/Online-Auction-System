<?php
session_start();
?>
<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
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

   
    
    <div class = "banner-index">
        <div class="content">
            <h1 class="cs">Super Value<br><section id="deals">Deals</section> </h1>
            <h1 class="cs1">On all Products</h1> 
        </div>
    </div>

<!-- Footer section -->

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