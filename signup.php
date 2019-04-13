<?php
try{
$conn = new PDO('mysql:dbname=ide;host=127.0.0.1;charset=utf8', 'root', '');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$year = $_POST['year'];


$stmt = $conn->prepare("INSERT INTO users (username,password,email,phone,branch,year) VALUES (?,?,?,?,?,?)");
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $password);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $phone);
$stmt->bindParam(5, $branch);
$stmt->bindParam(6, $year);
$arr = $stmt->execute();

if($stmt->rowCount()==1){
	echo "1";
}
else{
	echo "-1";
}
}
catch (Exception $e) {
	echo "-1";
    //print $e->getMessage ();
}


?>