<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username']!='' && isset($_POST['question_no']) && isset($_POST['lang'])){
$problem  = $_POST['question_no'];
$prefix = $_SESSION['username'];
$problem_file = $problem;
chdir($prefix);
if (!is_dir($problem)) {
        mkdir($problem);
        exec("chmod -R 777 $problem");      
     }	
chdir($problem);
	// echo getcwd();
   if( isset( $_POST['code'] ) ){
        shell_exec("touch $problem_file");
		shell_exec( "chmod 777 $problem_file" );
		$code = $_POST['code'];
		$f =fopen($problem,"w+");
		fwrite($f,$code);
		fclose($f);
		$_SESSION[$problem.'lang'] = $_POST['lang'];
		//echo getcwd();
}
}
else{
	header('location:index.php');
}



?>