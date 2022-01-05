<?php
include "config.php";
//add config file to main login form
if(isset($_POST['but_submit'])){//if submit button is pressed
//get username and password from input fields
    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);
//if they are filled ( not empty )
    if ($uname != "" && $password != ""){
//save query into variable
        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and pass='".$password."'";
//results into variable
        $result = mysqli_query($con,$sql_query);
//getting row in order to access different items from it
        $row = mysqli_fetch_array($result);
//getting count variable
        $count = $row['cntUser'];
//check if count is not 0, means password and username matches input
        if($count > 0){
//save variable for later use (open session by username in index.php, transporting variable through $_session parameter
            $_SESSION['uname'] = $uname;
//goto main page
            header('Location: index.php');
//if not true then show message
        }else{
            echo '<div class="center">';
		echo '<p><h1>Invalid username or password, try again.</h1></p></div>';
        }
    }
}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- style for login merged here in .php -->
			<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  left: 650px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 550px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 500px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
body, h1, h2, h3, h4, h5, h6  {
  font-family: "Segoe UI", Arial, sans-serif;
}
.center {
  padding: 70px 0;
  text-align: center;
}
hr{
border: 1px solid gray;
}
body {
  background-image: url('../images/background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
		</head>
		<body>
			<div class="center">
				<img src="../images/logo.PNG" style="float:middle">
					<p>
						<h1>Welcome to our community, sign in and let's get started.</h1>
					</p>
					<p>
						<h1>#IAmAChan</h1>
					</p>
				</div>
				<!-- onclick button, call openForm() function from script in order to make login form appear from bottom -->
				<button class="open-button" onclick="openForm()">Login</button>
				<div class="form-popup" id="myForm">
					<form method="post" action="" class="form-container"><!-- All of forms are method=post for sending data into php scripts by id or name of input  -->

						<div id="div_login">
							<h1>Login</h1>
							<label for="email">
								<b>Email</b>
							</label>
							<input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Email" required>
							<label for="psw">
								<b>Password</b>
							</label>
							<input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" required>
							<button type="submit" value="Submit" name="but_submit" id="but_submit" class="btn">Login</button>
							<p>
								<hr><!--Reference to register for creating an account in case it doesn't exists -->

									<a href="http://localhost/teste_isw/ReviewChan/html/register.php">Don't have an account yet? Register here.
					</a>
								</p>
								<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
							</div>
						</form>
					</div>
					<!-- Script to close and open form by id -->

					<script>
					
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
				</body>
			</html>


