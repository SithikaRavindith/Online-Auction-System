<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql = "select * from buyer where BID = $id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['Username'];
$address = $row['Address'];
$email = $row['Email'];
$password = $row['Password'];

if(isset($_POST['Bsubmit'])){
    $name = $_POST['Username'];
    $address = $_POST['Address'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "update buyer set BID=$id,Username='$name',Address='$address',Email='$email',Password='$password' where BID=$id";
    $result = mysqli_query($con,$sql);

    if($result){
        //echo "Updated successfully";
        header('location:account.php');
    }else{
        die(mysqli_error($con));
    }
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>SuperBid</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="signup.css">
</head>
<body>
<section id="header">
        
        <h1 class="heading"><a href="buyer.php">SuperBid</a></h1>
</section>
        <section id="form-style">
        <form method = "post">

            <!-- Username:-->
            <label for="Username">Username :</label>
            <input  class="f1" type="text" name="Username" placeholder="Enter Username" style="width:250px;" autocomplete = "off" value = <?php echo $name;?>> <br>

             <!-- address: -->
             <label for="address">Address :</label>
             <input class="f1" type="address" name="Address" placeholder="Enter address" style="width:250px;" autocomplete = "off" value = <?php echo $address;?>><br>

            <!-- Email: <br> -->
            <label for="email">Email :</label>
            <input class="f1" type="email" name="Email" placeholder="Enter Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="width:250px;" required autocomplete = "off" value = <?php echo $email;?>><br>

            <!-- Password: <br> -->
            <label for="pass">Password :</label>
            <input class="f1" type="password" name="Password" placeholder="Enter Password" id = "pwd" style="width:250px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete = "off" value = <?php echo $password;?>><br>

             <input class="submit" type="submit" name="Bsubmit" id = "sbtn1" value="Update">
             

        </form>

    </section>
    
</body> 
</html>
