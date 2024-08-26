<?php
include 'connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "delete from seller where SID=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('location:sellerManagement.php');
    }else{
        die(mysqli_error($con));
    }
}
?>