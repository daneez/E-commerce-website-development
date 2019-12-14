<?php
/*
$_POST['username']
$_POST['email']
$_POST['password']
*/

if(!isset($_POST['username'])||!isset($_POST['email'])||!isset($_POST['password'])){
	die("Data error");
}

if(!strpos($_POST['email'],"@")){
	die("Invalid email address");
}

//assume data is valid

include_once "config.php";

$conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

$username = $_POST['username'];

$stmt = $conn->prepare("SELECT count(*) FROM `users` WHERE `username` = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
if($count>0){
	die("Error, username already exists.");
}
$stmt->close();

$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);


$stmt2 = $conn->prepare("INSERT INTO `users` (`username`,`email`,`password`) VALUES (?,?,?)");
echo $conn->connect_error;
var_dump($stmt2);
$stmt2->bind_param("sss",$username,$email,$password);
$stmt2->execute();

$conn->close();

//header("Location: ../signin.php");*/