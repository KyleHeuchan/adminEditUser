<?php
	session_start();
	function confirm_logged_in() {
		if(!isset($_SESSION['user_id'])){
			redirect_to("admin_login.php");
		}
	}
	function logged_out() {
		session_destroy();
		redirect_to("../admin_login.php");
	}
		// I was trying to do functionality 4 here, but could only figure out how to make it so afte 3 minutes of inactivity, the user is logged out.

		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
	    // last request longer than 15 minutes ago

	    session_unset();     // unset $_SESSION variable for the current run time
	    session_destroy();   // destroys session data in the storage area
	}

	$_SESSION['LAST_ACTIVITY'] = time(); // update the last active time stamp

	if (!isset($_SESSION['CREATED'])) {
	    $_SESSION['CREATED'] = time();

	} else if (time() - $_SESSION['CREATED'] > 900) {
	    // session started 15 minutes ago or longer
	    session_regenerate_id(true);    // change session ID for the current session which overwites on invalid old session IDs
	    $_SESSION['CREATED'] = time();  // update the date of creation
	}

?>
