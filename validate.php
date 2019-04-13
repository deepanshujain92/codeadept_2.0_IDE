<?php
try{
$conn = new PDO('mysql:dbname=ide;host=127.0.0.1;charset=utf8', 'root', '');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$username = $_POST['username'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? && password=?"); 
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $password);
$arr = $stmt->execute();
if($stmt->rowCount()==1){
	session_start();
	$_SESSION['username'] = $username;
	if (!is_dir($username)) {
        mkdir($username);
        exec("chmod -R 777 $username");      
     }	
	echo "1";
}
else{
	echo "-1";
}
}
catch (Exception $e) {
	echo "2";
    
}


?>