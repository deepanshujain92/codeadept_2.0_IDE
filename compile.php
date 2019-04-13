<?php
header('Content-Type: text/html; charset=utf-8');
//error_reporting( 0 );

$error_file = "error.txt";

// include 'cpp.php';
// include 'python2.php';
// include 'python3.php';
$lang = $_POST['lang'];
switch ($lang) {
	case 'c':
	    include 'c.php';
		c_compile();
		break;
	case 'cpp':
	    include 'cpp.php';
		cpp_compile();
		break;
	case 'python2':
	    include 'python2.php';
		python2_compile();
		break;
	case 'python3':
	    include 'python3.php';
		python3_compile();
		break;
	case 'java':
	    include 'java.php';
		java_compile();
		break;
	default:
		# code...
		break;
}




?>