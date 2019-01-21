
<html>
<head>
	<meta charset="utf-8">
	<title>Register Offerer</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/main.css"/>
	<script src="js/main.js" type="text/javascript"></script>
	<script>
	
	function redirectPage(){
		window.location.replace('http://localhost/RapidRide/login/login.php');
		exit();
	}
	function functionVehicleTypeChange(){
		var value = document.getElementById("vehicle-id").value;
		if(value === 'Car'){
			document.getElementById("bike-model").style.display = "none";

			document.getElementById("car-type").style.display = "block";
			document.getElementById("car-model").style.display = "block";
			document.getElementById("car-type-arrow").style.display = "block";
		}else if("Bike"){
			document.getElementById("car-type").style.display = "none";
			document.getElementById("car-model").style.display = "none";
			document.getElementById("car-type-arrow").style.display = "none";

			document.getElementById("bike-model").style.display = "block";
		}
	}
	var source = new EventSource("register.php");
source.onopen = function() {
  alert('working')
};
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

					<div class="form-group">

					<div id ="age">
					<div class="form-row">
							<input type="text" name="age" id="age" class="input-text" placeholder="DOB" required onfocusout="(this.type='text')" onfocus="(this.type='date')">
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
                    </div>

						<div class="form-row">
							<input type="password" name="password" class="password" id="password" placeholder="Password" required>
						</div>

					<div class="form-row">
							<input type="password" name="password" class="password" id="cfm-password" placeholder="Confirm Password" required>
						</div>

					<div class="form-row">
						<input type="text" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>

					
						<div>
						<div class="form-row">
						<input type="text" name="phone" class="phone" id="phone" placeholder="Mobile No" required>
					</div>
						<div class="form-row">
							<input type="text" name="company" class="company" id="company" placeholder="Company Name" required>
						</div>
					<div class="form-row">
						<input type="text" name="additional" class="additional" id="additional" placeholder="Address" required>
					</div>

					<div class="form-row form-row-2">
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="form-right">


					<h2>Vehicle Details</h2>
					<div class="form-row">
					<select name="type" id = "vehicle-id" onchange="functionVehicleTypeChange()">
							    <option value="Vehicle Type">Vehicle Type</option>
							    <option value="Car">Car</option>
							    <option value="Bike">Bike</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
					</div>
					<div class="form-row">
						<input type="text" name="number" class="additional" id="number" placeholder="Vehicle Number" required>
					</div>
						<div class="form-row form-row-1">
							<input type="text" name="bikemodel" class="zip" id="bike-model" placeholder="Bike Model" required>
						</div>
					<div class="form-row form-row-2">
						<input type="text" name="carmodel" class="zip" id="car-model" placeholder="Car Model" required>
						</div>
					<div class="form-row">
					<select name="cartype" id ="car-type">
							    <option value="Car Type">Car Type</option>
							    <option value="Mini">Mini</option>
							    <option value="Sedan">Sedan</option>
								<option value="SUV">SUV</option>
							</select>
							<span class="select-btn" id = "car-type-arrow">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
					</div>
					<div class="form-row">
						<input type="text" name="license" id="your_LicenceId" class="input-text" required  placeholder="Licence Id" required>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="offerer" class="login100-form-btn" onClick="registerValuues()">
								Register For A Drive
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>
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
$address=$_POST['additional'];
$type=$_POST['type'];
$number=$_POST['number'];
$bikeModel=$_POST['bikemodel'];
$carModel=$_POST['carmodel'];
$carType=$_POST['cartype'];
$license=$_POST['license'];
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
('".$password."','".$email."','".$mobNo."','".$dob."','".$gender."','".$company."','".$firstName."','".$lastName."','".$address."',1)";
if ($conn->query($sql) === TRUE) {
	$sql="insert into vechile_details(mobile_no,vehicle_type,vehicle_no,bike_model,car_model,car_type,license_no) values
	 ('".$mobNo."','".$type."','".$number."','".$bikeModel."','".$carModel."','".$carType."','".$license."')";
	 if ($conn->query($sql) === TRUE) {
		 echo '<script type="text/javascript">redirectPage()</script>';
	 }
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