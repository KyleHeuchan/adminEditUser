<?php

	function createUser($fname, $username, $password, $email, $lvllist) {
		include('connect.php');
		$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$lvllist}', 'no' )";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "There was an issue with this user.";
			return $message;
		}
		mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');

		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Lost your job RIP";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Cya later... till next time ";
			return $message;
		}
		mysqli_close($link);
	}
?>
