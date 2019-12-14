<?php

	include_once "inc/function.php";
	secure_session_start();
	$_SESSION = array();
	$params = session_get_cookie_params();
	//unset the session cookie by setting a time in the distant past
	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	session_destroy();
?>

<?php
	include_once("inc/head.php");
?>
	<!--HEADER-->
	<header>
		<div class='container'>
			<h1>Log Out</h1>
		</div>
	</header>

	<!--MAIN-->
	<main class='container'>
		<p>You have been successfully logged out</p>
		<a href='signin.php' class='btn btn-primary'>Log Back In</a>
	</main>

<?php
	include("inc/foot.inc.php");
?>