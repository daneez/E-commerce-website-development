<?php
	include "inc/head.php";
?>
	<!--HEADER-->
	<header>
		<div class='container'>
			<h1>Create an Account</h1>
		</div>
	</header>
	<!--MAIN-->
	<main class='container'>
		<form action='inc/create_account.php' method='POST'>
			<div class='form-group'>
				<label for='username'>Username:</label>
				<input id='username' type='text' class='form-control' name='username'>
			</div>
			<div class='form-group'>
				<label for='username'>Email:</label>
				<input id='username' type='text' class='form-control' name='email'>
			</div>
			<div class='form-group'>
				<label for='password'>Password:</label>
				<input id='password' type='password' class='form-control' name='password'>
			</div>
			<button type='submit' class='btn btn-primary'>Create Account</button>
		</form>
	</main>
	<!--FOOTER-->
<?php
	include "inc/foot.php";
?>