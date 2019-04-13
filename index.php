<?php
session_start();
if(isset($_SESSION['username']) && trim($_SESSION['username'])!='' ){
 header('location:ide.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
<style type="text/css">
  .box{
    margin: 20px auto;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12), 0 2px 6px rgba(0, 0, 0, 0.24);
    padding: 10px;
    text-align: center;
    background-color:rgba(59, 89, 152,0.5);
    border-radius:5px;
  }
body{
  background-image:url('bg.jpg');
  background-size:100%;
  background-repeat: no-repeat;
  border:none;
 font-family: 'Source Code Pro', monospace;
}
@font-face {
    font-family: 'Source Code Pro';
    font-style: normal;
    font-weight: 700;
    src: local('Source Code Pro'), local('Source Code Pro'), url(./Source_Code_Pro/SourceCodePro-Regular.ttf) format('truetype');
}
.btn{
	border: none;
}
#x{
	float: right; top: 0;transform: rotate(90deg);
	width: 20px;
	color: white;
	background: #3B5998;
	font-size: 18px;
}
#x:hover{
	background: #323232;
}
</style>
</head>
<body>
<div class="navbar navbar-default" style="background-color:#3B5998;color:white;text-align:center;border:none;">
 <h1>CodeAdept 2.0 </h1>
</div>
 <div class="container" style="color:#000;font-size: 17px;margin: auto;color:white;background-color:rgba(59, 89, 152,0.7);">
  <h2>instructions</h2>
  <hr>
 <p>1.Each challenge has a pre-determined score.</p>
 <p>2.A participant’s score depends on the number of test cases a participant’s code submission successfully passes.</p>
 <p>3.Participants are ranked by score. If two or more participants achieve the same score, then the tie will be broken by the efficiency and cleanness of code.</p>
  </div>
	<div class="container">
		<form class="box form-group col-md-4 col-lg-4 col-sm-4 col-xs-4" onsubmit="check(event)" style="color:white;">
			<div class="form-group">
               <h2 style="text-align: center;color:white;">Log in</h2>
               <hr>
	              <input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
            </div>
            <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
            </div>    
            <button type="submit" class="btn" style="background-color:#3B5998;color: white;" >Login</button> Or <button type="submit" class="btn" style="background-color:#3B5998;color: white;" onclick="show(event)" ><a style="text-decoration: none;color:white;cursor: pointer;">Sign up</a></button>
		</form>

    <form class="box form-group col-md-4 col-lg-4 col-sm-4 col-xs-4" id="signup" onsubmit="register(event)" style="margin-left:20px;visibility: hidden;">
      <div class="form-group" >
      	    <div style="margin-top:-20px;cursor: pointer;" onclick="show(event)"> <b id="x">X</b></div>
               <h2 style="text-align: center;color:white;">Sign up</h2>
               <hr>
                <input type="text" class="form-control" name="username" placeholder="Enter Username" id="usrname">
            </div>
            <div class="form-group">
                  <input type="password" class="form-control" name="password" id="passwd" placeholder="Enter Password">
            </div>
            <div class="form-group">
                            <select class="form-control" id="branch" name="branch" >
                              <option >Branch</option>
                              <option value="ME">ME</option>
                              <option value="CSE">CSE</option>
                              <option value="IT">IT</option>
                              <option value="EC">EC</option>
                              <option value="EX">EX</option>
                              <option value="AU">AU</option>
                              <option value="CE">CE</option>
                            </select>
            </div>
              <div class="form-group">
                                <select class="form-control" id="year" name="year">
                                  <option >Year</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                </div>
                <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                    </div>
                <div class="form-group">
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Contact No" required>
                          </div>
            <button type="submit" style="background-color:#3B5998;color: white;" class="btn">Sign up</button>
    </form>
		
	</div>
<script>
	var username = document.getElementById('username');
	var password = document.getElementById('password'); 
   function check(event) {
   	//console.log('check');
   	event.preventDefault();
   if(username.value.trim()==='' || username.value===null ){
		swal('warning','Please fill username','warning');
		return;
	}
	if(password.value.trim()==='' || password.value===null){
		swal('warning','Please fill password','warning');
		return;
	}
    let xhr = new XMLHttpRequest();
    xhr.open('POST','validate.php',true);
   // console.log(xhr);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
    data = 'username='+encodeURIComponent(username.value) + '&' + 'password='+encodeURIComponent(password.value);
   // console.log(data);
    xhr.onload = function(){
    	console.log(this.responseText);
    	if(this.responseText=='1'){
    		swal('Good job! ','Your are going to next page ','success');
        setTimeout(()=>{
                  window.location.href="ide.php";
        },1000);
    	}
    	else if(this.responseText=='-1'){
    		swal('Error','Username or Password is Incorrect','error');
    	}
    	else{
    		swal('warning','something went Really Wrong please try again ','warning');
    	}
    }
    xhr.send(data);
	
   }
   function show(event){
   	event.preventDefault();
    if(document.getElementById('signup').style.visibility=="visible"){
    document.getElementById('signup').style.visibility="hidden";
    }
    else{
      document.getElementById('signup').style.visibility="visible";
    }
   }
   
   function register(event){
    event.preventDefault();
    let username = document.getElementById('usrname').value;
    let password = document.getElementById('passwd').value; 
    let email = document.getElementById('email').value;
    let branch = document.getElementById('branch').value;
    let year = document.getElementById('year').value;
    let phone = document.getElementById('phone').value;
    //console.log(username,password,email,branch,year,phone);  

    let xhr = new XMLHttpRequest();
    xhr.open('POST','signup.php',true);
   // console.log(xhr);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
    data = 'username='+encodeURIComponent(username) + '&' + 'password='+encodeURIComponent(password) + '& '+ 'email='+encodeURIComponent(email)+'&'+'branch='+encodeURIComponent(branch)+'&' + 'year='+encodeURIComponent(year)+'&'+'phone='+encodeURIComponent(phone);
   // console.log(data);
    xhr.onload = function(){
      console.log(this.responseText);
      if(this.responseText=='1'){
        swal('Congratulations ! ','Your are registered Sucessfully ! ','success');
        document.getElementById('signup').style.visibility="hidden";
      }
      else if(this.responseText=='-1'){
        swal('Error','Username  is  Already Taken Try different Username','error');
      }
      else{
        swal('warning','something went Really Wrong please try again ','warning');
      }
    }
    xhr.send(data);  

   }
	

</script>
<script src="sweetalert.min.js"></script>
</body>
</html>
