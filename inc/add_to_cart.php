<?php
  include_once "inc/function.php";
  secure_session_start();

  if(isset($_SESSION['cart'])){
    array_push($_SESSION['cart'], $_POST['productId']);
  }
  else{
    $_SESSION['cart'] = array($_POST['productId']);
  }
?>