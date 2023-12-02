<?php
    include 'config.php';
    session_start();

    $username = $_POST['tusername'];
    $password = md5($_POST['tpasswd']);

    //set up the query
    $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";

    //run the query and get the number of offected rows
    $result = mysqli_query($conn,$query ) or die('error making query');
    $affected_rows = mysqli_num_rows($result);
    $data = mysqli_fetch_row($result);

    //if there's exactly one result, the user is validatetd, Otherwise, he's invalid
    if($affected_rows == 1) {
        $_SESSION['sadmin_username']=$username;
        header( 'location: admin.php');
    
    } else {
        header( 'location: login.php');
    }
    ?>