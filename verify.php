<?php
  include_once "inc/function.php";
	secure_session_start();
  // session_start();
  include_once 'inc/Database.php';
	$db = new Database();
  
  // $_POST['email'];
	// $_POST['password'];

$sql = "SELECT `id`,`password`,`first_name` FROM `user` WHERE `email`='{$_POST['email']}'";
$result = $db->select($sql);

if(sizeof($result)==0){
    echo "no user with that email address";
}
else if(sizeof($result)>1){
    echo "issue with the system";
}
else{
  // echo "testing";
  // var_dump($result);
  // echo $result[0]["password"];
  if(password_verify($_POST['password'], $result[0]["password"])===true){
    echo "login successful";
    $_SESSION['id'] = $result[0]['id'];
    $_SESSION['firstName'] = $result[0]['first_name'];
    header('Location: index.php');
  }else{
    echo "login failed";
  }
}

?>