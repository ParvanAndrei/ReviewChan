<?php
  
$servername = "localhost";
$username = "dani";
$password = "4444";
$dbname = "isw";
  
// Create connection
$conn = new mysqli($servername, 
    $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}
		
     
	 if(isset($_POST['but_submit2']))
{    	

		$user_id =  $_POST['id'];
        $fullname = $_POST['fullname'];
        $email =  $_POST['email'];
        $pass = $_POST['password'];
		$pass2 = $_POST['password2'];
		if($pass == $pass2)
		{	$sql = "INSERT INTO users (user_id,fullname,email,pass) VALUES ('$user_id','$fullname','$email','$pass')"; 
			if(!( $user_id == "" or $fullname = "" or $email == "" or $pass == ""))
			if (mysqli_query($conn, $sql)) {
			echo '<div class="center">';
			echo '<p><h1>New account has been created successfully, return to login page <a href="http://localhost/teste_isw/ReviewChan/html/login.php">here</a></h1></p></div>';
			
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		}
		else
		{
		echo '<div class="center">';
		echo '<p><h1>Password typed incorrectly</h1></p></div>';
		}
     mysqli_close($conn);
}

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<p><h1>Join our community, register now!</h1></p>
<p><h1>#BecomeAChan</h1></p>

</div>
<button class="open-button" onclick="openForm()">Register</button>

<div class="form-popup" id="myForm" >
  <form method="post" action="register.php" class="form-container">
  <div id="div_login">
    <h1>Register</h1>

<label for="email"><b>ID</b></label>
    <input type="text" class="textbox" id="id" name="id" placeholder="ID" required>
	<label for="fullname"><b>Full Name</b></label>
    <input type="text" class="textbox" id="fullname" name="fullname" placeholder="Full name" required>
    <label for="email"><b>Email</b></label>
    <input type="text" class="textbox" id="email" name="email" placeholder="Email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" class="textbox" id="password" name="password" placeholder="Password" required>
	
	 <label for="psw2"><b>Repeat Password</b></label>
    <input type="password" class="textbox" id="password2" name="password2" placeholder="Repeat Password" required>

	<button type="submit2" value="Submit2" name="but_submit2" id="but_submit2" class="btn">Register</button>
		<p><hr>
	<a href="http://localhost/teste_isw/ReviewChan/html/login.php">Already have an account ? Sign in here.
	</a></p>

    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </div>
  </form>
</div>

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


