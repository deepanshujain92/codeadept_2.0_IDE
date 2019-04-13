<?php
session_start();

$problem  = $_POST['prob'];
$prefix = $_SESSION['username'];
$problem_file = $problem;
exec("chmod -R 777 $prefix");
chdir($prefix);
exec("mkdir $problem");
exec("chmod -R 777 $problem");
chdir($problem);
	// echo getcwd();
   if( isset( $_POST['code'] ) ){
        shell_exec("touch $problem_file");
		shell_exec( "chmod 777 $problem_file" );
		$code = $_POST['code'];
		$f =fopen($problem,"w+");
		fwrite($f,$code);
		fclose($f);
		
		//echo getcwd();
}



?>