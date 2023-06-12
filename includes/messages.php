<?php 

if (isset($m)) {
	switch ($m) {
		case 'logout':
			$message = "<p>You have logged out successfully.</p>";
			break;
		case 'loggedout':
			$message = "<p>You have been logged out due to inactivity. Please login again.</p>";
			break;
		default:
			// code...
			break;
	}
}

?>