<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level.";
		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User Portal</title>
</head>
<body>
	<h2 id="mainMessage">Hello and welome to the Create User page</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
		<label>First Name:</label>
		<input type="text" name="fname" value=" <?php if(!empty($fname)){echo $fname;} ?> "><br><br>
		<label>Username:</label>
		<input type="text" name="username" value=" <?php if(!empty($username)){echo $username;} ?> "><br><br>
		<label>Password:</label>
		<input type="text" name="password" value=" <?php if(!empty($password)){echo $password;} ?>"><br><br>
		<label>Email:</label>
		<input type="text" name="email" value=" <?php if(!empty($email)){echo $email;} ?>"><br><br>

		<select name="lvllist">
			<option value="">Please select a user level to the account</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Owner</option>
		</select><br><br>
		<input type="submit" name="submit" value="Create User">
	</form>
</body>
</html>
