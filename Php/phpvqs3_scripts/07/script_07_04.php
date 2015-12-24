<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Books and Chapters</title>
</head>
<body>
<?php 
// Script 7.4 - books.php
/* This script creates and prints out a multidimensional array. */
// Address error management, if you want.

// Create the first array:
$phpvqs = array (
		1 => 'Getting Started',
		'Variables',
		'HTML Forms and PHP',
		'Using Numbers' 
);

// Create the second array:
$phpadv = array (
		1 => 'Advanced PHP Techniques',
		'Developing Web Applications',
		'Advanced Database Concepts',
		'Security Techniques' 
);

// Create the third array:
$phpmysql = array (
		1 => 'Introduction to PHP',
		'Programming with PHP',
		'Creating Dynamic Web Sites',
		'Introduction to MySQL' 
);

// Create the multidimensional array:
$books = array (
		'PHP VQS' => $phpvqs,
		'PHP 5 Advanced VQP' => $phpadv,
		'PHP 6 and MySQL 5 VQP' => $phpmysql 
);

// Print out some values:
print "<p>The third chapter of my first book is <i>{$books['PHP VQS'][3]}</i>.</p>";
print "<p>The first chapter of my second book is <i>{$books['PHP 5 Advanced VQP'][1]}</i>.</p>";
print "<p>The fourth chapter of my fourth book is <i>{$books['PHP 6 and MySQL 5 VQP'][4]}</i>.</p>";

// See what happens with foreach:
foreach ( $books as $key => $value ) {
	print "<p>$key: $value</p>\n";
}

?>
</body>
</html>