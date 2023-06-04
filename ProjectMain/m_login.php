<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moderator Login</title>
	<link rel="stylesheet" type="text/css" href="login_signup_style.css">
</head>
<body>
	<form action="m_logincheck.php" method="post">
		<h2>Login as a Moderator</h2>
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<input type="email" name="email" placeholder="Email Address"><br>

		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
		<a href="m_signup.php" target="_blank">Join as a moderator</a>
	</form>

</body>
</html>