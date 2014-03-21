<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Add A Quotation</title>
</head>
<body>
<?php // Script 11.1 - add_quote.php
/* This script displays and handles an HTML form. This script takes text input and stores it in a text file. */

// Check for a form submission:
if (isset($_POST['submitted'])) { // Handle form.

	if ( !empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.') ) { // Need some thing to write.
	
		if ($fp = fopen ('../quotes.txt', 'ab')) { // Try to open the file.

			// Set the encoding:
			stream_encoding($fp, 'utf-8');

			fwrite($fp, "{$_POST['quote']}\n"); // Write the data. Use \r\n on Windows.
			fclose($fp); // Close the file.
			
			// Print a message:
			print "<p>Your quotation has been stored.</p>";
		
		} else { // Could not open the file.
			print '<p style="color: red;">Your quotation could not be stored due to a system error.</p>';
		}
		
	} else { // Failed to enter a quotation.
		print '<p style="color: red;">Please enter a quotation!</p>';
	}
	
} // End of submitted IF.

// Leave PHP and display the form:
?>

<form action="add_quote.php" method="post">
	<textarea name="quote" rows="5" cols="30">Enter your quotation here.</textarea>
	<input type="submit" name="submit" value="Add This Quote!" />
	<input type="hidden" name="submitted" value="true" />
</form>

</body>
</html>