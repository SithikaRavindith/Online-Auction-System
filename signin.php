<?php
    include 'connect.php';
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION["username"] = $_POST["username"];
        $username = $_SESSION["username"];
        $password = $_POST["password"];
    
        $adminQuery = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
        $adminResult = mysqli_query($con, $adminQuery);

        if (mysqli_num_rows($adminResult) == 1) {
            header("Location: admin.php");
            exit();
           
        }

        $buyerQuery = "SELECT BID FROM buyer WHERE Username = '$username' AND Password = '$password'";
        $buyerResult = mysqli_query($con, $buyerQuery);
    
        if (mysqli_num_rows($buyerResult) == 1) {
            $buyer = mysqli_fetch_assoc($buyerResult);
            $buyerId = $buyer['BID'];
            $_SESSION['buyer_id'] = $buyerId;
            header("Location: buyer.php");
            exit();
           
        }

        $sellerQuery = "SELECT SID FROM seller WHERE username = '$username' AND password = '$password'";
        $sellerResult = mysqli_query($con, $sellerQuery);
    
        if (mysqli_num_rows($sellerResult) == 1) {
            $seller = mysqli_fetch_assoc($sellerResult);
            $sellerId = $seller['SID'];

            // Store the seller's ID in a session variable
            $_SESSION['seller_id'] = $sellerId;

            // Redirect to the item management page
            header("Location: ItemManagement.php");
            exit();
        }else{
            echo '<script>
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }

        
    }

?>


<!Doctype html>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="signin.css">
    <script src="script.js"></script>
</head>
<body>
    <section id="header">
        
        <h1 class="heading"><a href="index.html">SUPER BID</a></h1>
    </section>

    <!-- Middle section -->

    <section id="form">
        <form name="form" method="POST" class="fstyle" onsubmit="return isvalid()" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="Username">Username :</label>
            <input   type="text" name="username" placeholder="Enter Username" style="width:250px;" > <br>

            <label for="pass">Password :</label>
            <input  type="password" name="password" placeholder="Enter Password" style="width:250px;"><br>

            <input class="submit" type="submit" name="submit" value="Log in"><br>
            <label>If you don't have an account yet <a href = "signup.php">Sign up</a>.</label>  
        </form>

        <?php
            // Display error message if exists
            if (isset($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
        ?>

    </section>
</body>

</html> 