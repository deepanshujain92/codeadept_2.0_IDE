<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username']!='' && isset($_POST['question_no']) && isset($_SESSION[$_POST['question_no'].'lang'])){
$path = './'.$_SESSION['username'].'/'.$_POST['question_no'].'/'.$_POST['question_no'];
//echo $path;
if (file_exists($path)) {
	    $code = file_get_contents($path);
        $json =array();
        $temp = array('lang'=>$_SESSION[$_POST['question_no'].'lang'],'code' => $code );
        array_push($json,$temp);
        echo json_encode($json);

     }	
	

}
else{
	echo "-1";
}

?>