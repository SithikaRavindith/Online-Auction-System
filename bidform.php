<?php
require 'connect.php';
session_start();
$buyerId = $_SESSION['buyer_id'];
$id=$_GET['id'];

$sql = "select highestBid from item where IID = $id";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)){
$highestBid = $row["highestBid"];
}

if(isset($_POST["submit"])){
    $amount = $_POST["amount"];
    if($highestBid < $amount){
        $newbid = "update item set highestBid = '$amount' where IID = '$id'";
        mysqli_query($con, $newbid);

        $query = "SELECT COUNT(*) as count FROM bid WHERE IID = '$id' AND BID = '$buyerId'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        if ($count > 0) {
            $updatebid = "UPDATE bid SET amount = '$amount' WHERE IID = '$id' AND BID = '$buyerId'";
            $highbidresult = mysqli_query($con, $updatebid);}
        else {
            $highbidsql = "insert into bid(amount,IID,BID) values ('$amount','$id','$buyerId')";
            $highbidresult = mysqli_query($con,$highbidsql);
        }
        if($highbidresult){
            header('location:auctions.php');
        }else{
            die(mysqli_error($con));
        }
    }
    else{
        echo '<script>
        alert("Your bid must be higher than the highest bid!!")</script>'; 
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
</head>
<body>
    <section id="header">
        
        <h1 class="heading"><a href="buyer.php">SuperBid</a></h1>
       
    </section>

    <!-- Middle section -->
    
    <section id="form-style">
        <?php
        if(isset($_SESSION["username"])){
        echo '<form method = "post">

            <label for="Amount">Amount :</label>
            <input  class="f1" type="text" name="amount" placeholder="Enter amount" style="width:250px;" > <br>
            <input class="submit" type="submit" name="submit" id = "sbtn1" value="Place the bid">
             

        </form>';
        }
        else
            header("Location:signin.php");
        ?>
    </section>

</body>

</html> 