<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register User</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/main.css"/>
		<script>
	
	function redirectPage(){
		window.location.replace('http://localhost/RapidRide/login/login.php');
		exit();
	}
	</script>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="register.php" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="first_name" id="first_name" class="input-text" placeholder="First Name" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" id="last_name" class="input-text" placeholder="Last Name" required>
						</div>
					</div>

					<div class="form-row">
						<select name="gender">
						    <option class="option" value="title">Gender</option>
						    <option class="option" value="Male">male</option>
						    <option class="option" value="Female">female</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>

					<div id ="age">
					<div class="form-row form-row-1">
							<input type="text" name="age" id="age" class="input-text" placeholder="DOB" required onfocus="(this.type='date')" onfocusout="(this.type='text')">
						</div>
						</div>

					<div class="form-row">
						<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
						<div>

						<div class="form-row">
							<input type="text" name="password" id="password" class="input-text" placeholder="Password" required>
						</div>
						

					<div class="form-row form-row-2">
							<input type="password" name="retype_password" id="retype_password" class="input-text" placeholder="Retype Password" required>
						</div>

					<div class="form-row form-row-2">
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="form-right">


					<h2>Address</h2>
					<div class="form-row">
					    <input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
					</div>
					<div class="form-row">
						<input type="text" name="company" class="company" id="company" placeholder="Company Name" required>
					</div>
					<div class="form-row">
						<input type="text" name="address" class="additional" id="additional" placeholder="Address">
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="register" class="login100-form-btn">
								Register For A Ride
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rapidride";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_POST){
$firstName=$_POST['first_name'];
$lastName=$_POST['last_name'];
$dob=$_POST['age'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobNo=$_POST['phone'];
$company=$_POST['company'];
$address=$_POST['address'];
if(empty($bikeModel)){
	$bikeModel='';
}
if(empty($carModel)){
	$carModel='';
}
if(empty($carType)){
	$carType='';
}

if(checkDuplicate($conn,$mobNo)){
$sql="insert into user_details(password,mail_id,mobile_number,birth_day,gender,company_name,first_name,last_name,address,offerer) values 
('".$password."','".$email."','".$mobNo."','".$dob."','".$gender."','".$company."','".$firstName."','".$lastName."','".$address."',0)";
if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">redirectPage()</script>';
}
}

$conn->close();

}

function checkDuplicate($conn,$mobNo){
	$sql="select * from user_details where mobile_number='".$mobNo."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return false;
	}else{
		return true;
	}
}
  
?>