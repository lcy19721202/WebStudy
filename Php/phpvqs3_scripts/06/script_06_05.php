<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error { color: red; }
	</style>
</head>
<body>
<h2>Registration Results</h2>
<?php // Script 6.5 - handle_reg.php #4
/* This script receives eight values from register.html:
email, password, confirm, month, day, year, color, submit */

// Address error management, if you want.

// Flag variable to track success:
$okay = TRUE;

// Validate the email address:
if (empty($_POST['email'])) {
	print '<p class="error">Please enter your email address.</p>';
	$okay = FALSE;
}

// Validate the password:
if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = FALSE;
}

// Check the two passwords for equality:
if ($_POST['password'] != $_POST['confirm']) {
	print '<p class="error">Your confirmed password does not match the original password.</p>';
	$okay = FALSE;
}

// Validate the birthday:
$birthday = '';

// Validate the month:
if (is_numeric($_POST['month'])) {
	$birthday = $_POST['month'] . '-';
} else {
	print '<p class="error">Please select the month you were born.</p>';
	$okay = FALSE;
}

// Validate the day:
if (is_numeric($_POST['day'])) {
	$birthday .= $_POST['day'] . '-';
} else {
	print '<p class="error">Please select the day you were born.</p>';
	$okay = FALSE;
}

// Validate the year:
if (is_numeric($_POST['year'])) {
	$birthday .= $_POST['year'];
} else {
	print '<p class="error">Please enter the year you were born as four digits.</p>';
	$okay = FALSE;
}

// Check that they were born before 2009:
if ($_POST['year'] >= 2009) {
	print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
	$okay = FALSE;
}

// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
	print "<p>You entered your birthday as $birthday.</p>";
}
?>
</body>
</html>