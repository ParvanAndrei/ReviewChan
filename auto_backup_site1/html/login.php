<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and pass='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: index.php');
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
<p><h1>Welcome to our community, sign in and let's get started.</h1></p>
<p><h1>#IAmAChan</h1></p>

</div>
<button class="open-button" onclick="openForm()">Login</button>

<div class="form-popup" id="myForm" >
  <form method="post" action="" class="form-container">
  <div id="div_login">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" required>

    <button type="submit" value="Submit" name="but_submit" id="but_submit" class="btn">Login</button>
	<p><hr>
	<a href="http://localhost/teste_isw/ReviewChan/html/register.php">Don't have an account yet? Register here.
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


