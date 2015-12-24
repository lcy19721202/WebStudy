<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<style type="text/css" media="screen">
.error {
	color: red;
}
</style>
</head>
<body>
	<h2>Registration Results</h2>
<?php 
// Script 6.8 - handle_reg.php #7
/*
 * This script receives eight values from register.html: email, password, confirm, month, day, year, color, submit
 */

// Address error management, if you want.

// Flag variable to track success:
$okay = TRUE;

// Validate the email address:
if (empty ( $_POST ['email'] )) {
	print '<p class="error">Please enter your email address.</p>';
	$okay = FALSE;
}

// Validate the password:
if (empty ( $_POST ['password'] )) {
	print '<p class="error">Please enter your password.</p>';
	$okay = FALSE;
}

// Check the two passwords for equality:
if ($_POST ['password'] != $_POST ['confirm']) {
	print '<p class="error">Your confirmed password does not match the original password.</p>';
	$okay = FALSE;
}

// Validate the birthday:
$birthday = '';

// Validate the month:
if (is_numeric ( $_POST ['month'] )) {
	$birthday = $_POST ['month'] . '-';
} else {
	print '<p class="error">Please select the month you were born.</p>';
	$okay = FALSE;
}

// Validate the day:
if (is_numeric ( $_POST ['day'] )) {
	$birthday .= $_POST ['day'] . '-';
} else {
	print '<p class="error">Please select the day you were born.</p>';
	$okay = FALSE;
}

// Validate the year:
if (is_numeric ( $_POST ['year'] ) and (strlen ( $_POST ['year'] ) == 4)) {
	
	// Check that they were born before 2009.
	if ($_POST ['year'] >= 2009) {
		print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
		$okay = FALSE;
	} else {
		$birthday .= $_POST ['year'];
	} // End of 2nd conditional.
} else { // Else for 1st conditional.
	
	print '<p class="error">Please enter the year you were born as four digits.</p>';
	$okay = FALSE;
} // End of 1st conditional.
  
// Validate the color:
switch ($_POST ['color']) {
	case 'red' :
		print '<p style="color:red;">Red is your favorite color.</p>';
		break;
	case 'yellow' :
		print '<p style="color:yellow;">Yellow is your favorite color.</p>';
		break;
	case 'green' :
		print '<p style="color:green;">Green is your favorite color.</p>';
		break;
	case 'blue' :
		print '<p style="color:blue;">Blue is your favorite color.</p>';
		break;
	default :
		print '<p class="error">Please select your favorite color.</p>';
		$okay = FALSE;
		break;
} // End of switch.
  
// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
	print "<p>You entered your birthday as $birthday.</p>";
}
?>
</body>
</html>