<?php

if(isset($_POST['submit'])){
    $name = $_POST['Username'];
    $password = $_POST['password'];

    $sql = "select * from buyer where Username = '$name' and Password = '$password'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count == 1){
        header("Location:index.php");
    }else{
        echo '<script>
            window.location.href ="signin.php";
            alert("Login failed,Invalid username or password!!")
            </script>';
    }
}

?>