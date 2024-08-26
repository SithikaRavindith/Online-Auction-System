
<?php

include 'connect.php';
$db = mysqli_select_db($con,'superbid');
session_start();
$sellerId = $_SESSION['seller_id'];

if(isset($_POST['Bsubmit'])){
    $file = addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
    $name = $_POST['ItemName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $startDate = $_POST['sdate'];
    $endDate = $_POST['edate'];

    $startDate = mysqli_real_escape_string($con, $startDate);
    $endDate = mysqli_real_escape_string($con, $endDate);


    $sql = "insert into item(Name,startPrice,highestBid,SID,Description,startDate,endDate,photo) values('$name','$price','$price','$sellerId','$description','$startDate','$endDate','$file')";

        $result = mysqli_query($con,$sql);

    if($result){
        header('location:ItemManagement.php');
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
        <form method = "post" enctype="multipart/form-data">

            <label for="item name">Item Name:</label>
            <input  class="f1" type="text" name="ItemName" placeholder="Enter item name" style="width:250px;" > <br>

            <label for="price">Item starting price:</label>
            <input class="f1" type="text" name="price" placeholder="Enter item price" style="width:250px;" ><br>
            <label for="description">Description:</label>
            <textarea class="f1" placeholder="Enter item description" name="description" rows="4" cols="50">
            </textarea>
            <label for="startDate">Start Date:</label>
            <input type="date"  class="f1" name="sdate"><br>
            <label for="endDate">end Date:</label>
            <input type="date"  class="f1" name="edate"><br>
            <input type="file" class="f1" name="photo"><br>
            
            <input class="submit" type="submit" name="Bsubmit" id = "sbtn1" value="Submit">
             

        </form>

    </section>
</body>

</html> 