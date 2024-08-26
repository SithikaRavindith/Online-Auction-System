<?php
include 'connect.php';
session_start();
$sellerId = $_SESSION['seller_id'];

if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "delete from item where IID=$id AND SID = $sellerId";
    $result = mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('location:ItemManagement.php');
    }else{
        die(mysqli_error($con));
    }
}
?>