<html>
	<head>
		<title>Login TU</title>
	</head>
	<body>
		<div align="center">
			<h2>Login TU</h2>
			<form method="POST" action="<?php echo base_url();?>TU/login">
				<br><input type="text" placeholder="Username" name="username">
				<br><input type="password" placeholder="Password" name="password">
				<br><button type="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
