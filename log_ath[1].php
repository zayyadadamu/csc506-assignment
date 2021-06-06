<?php session_start();
require 'connection.php';


$username = $_POST['username'];
$password = $_POST['password'];

$username= mysqli_real_escape_string($connected, $username);
$password= mysqli_real_escape_string($connected, $password);

$query= mysqli_query($connected, "SELECT id FROM users WHERE username= '$username' AND password= '$password'");

$row = mysqli_fetch_array($query);

$count = mysqli_num_rows($query);

if ($count!=""){
    $_SESSION['log_username']= $username;
    
    $_SESSION['user_id']= $row['id'];
    header("Location: profile.php");
}
else{

    echo 2;
}
?>