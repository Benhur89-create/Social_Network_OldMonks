<?php
if (isset($_POST['color'])) {
	setcookie('header_color', $_POST['color'], time() + (86400 * 30), '/'); // Set the cookie to expire in 30 days
	header('Location: /functions/settings_admin.php'); // Redirect back to the settings page
	exit;
}
?>
