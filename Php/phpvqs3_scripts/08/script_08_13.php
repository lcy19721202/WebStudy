<?php // Script 8.13 - login.php #2
/* This page lets people log into the site (in theory). */

// Set the page title and include the header file:
define('TITLE', 'Login');
require('templates/header.html');

// Print some introductory text:
print '<h1>Login Form</h1>
	<p>Users who are logged in can take advantage of certain features like this, that, and the other thing.</p>';

// Check if the form has been submitted:
if ( isset($_POST['submitted']) ) {

	// Handle the form:
	if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
	
		if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) { // Correct!
	
			// Redirect the user to the welcome page!
			ob_end_clean(); // Destroy the buffer!
			header ('Location: welcome.php');
			exit();
		
		} else { // Incorrect!
	
			print '<p>The submitted email address and password do not match those on file!<br />Go back and try again.</p>';
		
		}
	
	} else { // Forgot a field.
	
		print '<p>Please make sure you enter both an email address and a password!<br />Go back and try again.</p>';
		
	}

} else { // Display the form.

	print '<form action="login.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" /></p>
	<p>Password: <input type="password" name="password" size="20" /></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	<input type="hidden" name="submitted" value="true" />
	</form>';

}

require('templates/footer.html'); // Need the footer.
?>