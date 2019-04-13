<?php
header('Content-Type: text/html; charset=utf-8');
//error_reporting( 0 );

// include 'cpp.php';
// include 'python2.php';
// include 'python3.php';
$lang = $_POST['lang'];
switch ($lang) {
	case 'c':
	    include 'c.php';
		c_run();
		break;
	case 'cpp':
	    include 'cpp.php';
		cpp_run();
		break;
	case 'python2':
	    include 'python2.php';
		python2_run();
		break;
	case 'python3':
	    include 'python3.php';
		python3_run();
		break;
	case 'java':
	    include 'java.php';
		java_run();
		break;
	default:
		# code...
		break;
}




?>