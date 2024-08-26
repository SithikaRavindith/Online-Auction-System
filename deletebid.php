<?php
include 'connect.php';

if (isset($_GET['deleteid1']) && isset($_GET['deleteid2'])) {
    $id1 = $_GET['deleteid1'];
    $id2 = $_GET['deleteid2'];

    $sql = "DELETE FROM bid WHERE IID = $id1 AND BID = $id2";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Deleted successfully";
        header('location:mybid.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
