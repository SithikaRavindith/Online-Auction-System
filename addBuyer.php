<!--Insert form data into database-->
<?php
include 'connect.php';
if(isset($_POST['Bsubmit'])){
    $name = $_POST['Username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "insert into buyer(Username,Address,Email,Password)
    values('$name','$address','$email','$password')";

    $result = mysqli_query($con,$sql);

    if($result){
        //echo "Data inserted successfully";
        header('location:admin.php');
    }else{
        die(mysqli_error($con));
    }
}

?>

<!Doctype html>
<html>

<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SuperBid</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="signup.css">
    <script src="script.js"></script>
</head>
<body>
    <section id="header">
        
        <h1 class="heading"><a href="buyer.php">SuperBid</a></h1>
    </section>

    <!-- Middle section -->
    
    <section id="form-style">
        <form method = "post" onSubmit="return checkPassword()">

            <!-- Username:-->
            <label for="Username">Username :</label>
            <input  class="f1" type="text" name="Username" placeholder="Enter Username" style="width:250px;" > <br>

             <!-- address: -->
             <label for="address">Address :</label>
             <input class="f1" type="address" name="address" placeholder="Enter address" style="width:250px;"><br>

            <!-- Email: <br> -->
            <label for="email">Email :</label>
            <input class="f1" type="email" name="email" placeholder="Enter Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="width:250px;" required><br>

            <!-- Password: <br> -->
            <label for="pass">Password :</label>
            <input class="f1" type="password" name="password" placeholder="Enter Password" id = "pwd" style="width:250px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>

            <!-- Confirm Password: <br> -->
            <label for="cpass">Confirm Password :</label>
            <input class="f1" type="password" name="cpass" placeholder="Re-enter Password" id = "cmfpwd" style="width:250px;"><br>

             <input class="submit" type="submit" name="Bsubmit" id = "sbtn1" value="Submit">
             

        </form>

    </section>

</body>

</html> 