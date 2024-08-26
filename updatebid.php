<?php
include 'connect.php';
session_start();
$id1=$_GET['updateid1'];
$id2=$_GET['updateid2'];
$sql = "select highestBid from item where IID = '$id1'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)){
$highestBid = $row["highestBid"];
}

if(isset($_POST["submit"])){
    $amount = $_POST["amount"];
    if($highestBid < $amount){
        $newbid = "update item set highestBid = '$amount' where IID = '$id1'";
        mysqli_query($con, $newbid);
        $highbidsql = "UPDATE bid SET amount = '$amount' WHERE IID = '$id1' AND BID = '$id2'";
        $highbidresult = mysqli_query($con,$highbidsql);
        header('location:mybid.php');
    }
    else{
        echo '<script>
        alert("Your bid must be higher than the highest bid!!")</script>'; 
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
        <?php
        if(isset($_SESSION["username"])){
        echo '<form method = "post">

            <label for="Amount">Amount :</label>
            <input  class="f1" type="text" name="amount" placeholder="Enter amount" style="width:250px;" > <br>
            <input class="submit" type="submit" name="submit" id = "sbtn1" value="Place the bid"">
             

        </form>';
        }
        else
            header("Location:signin2.php");
        ?>
    </section>
    
</body> 
</html>
