<?php
	include_once "inc/function.php";
	secure_session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Shawpify Home</title>
	<!--CSS-->
	<!--Bootstrap-->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<!--Optional Bootstrap Theme-->

	<!--FontAwesome-->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

	<!--Custom CSS-->
	<link rel='stylesheet' href='css/style.css'>
</head>
<body>

<nav class='navbar navbar-inverse navbar-fixed-top'>
	<div class='container-fluid'>
		<header class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			<a id="home" class='navbar-brand ajax-link' href='index.php'>Shawpify Home</a>
		</header>
		<div class='collapse navbar-collapse' id='myNavbar'>
			<ul class='nav navbar-nav'>
				<li><a class='ajax-link' href='products.php'>Products</a></li>
				<li><a class='ajax-link' href='deals.php'>Deals</a></li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<?php
					if(isset($_SESSION['id'])) {
						echo "<li><a href='signout.php'><span class='glyphicon glyphicon-user'></span>Sign Out</a></li>";
					}
					else {
						echo "<li><a class='ajax-link' href='signin.php'><span class='glyphicon glyphicon-user'></span>Sign In</a></li>";
					}
				?>

				<li><a class='ajax-link' href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span>Cart</a></li>
				<li>
					<form class='navbar-form' action='products.php' method='GET'>
						<input type='text' class='form-control' placeholder='Search for a Product'>
						<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-search'></span></button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>