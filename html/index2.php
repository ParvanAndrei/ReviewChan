
<html>
<title>ReviewChan</title>
<meta charset="UTF-8">
<!-- Links to different functions/fonts/bootstraps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-dark-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../javascript/index.js"></script>
<head>
<!-- some style for table view (right side is top 5 table) -->

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
footer {
    position: fixed;
    height: 30px;
    bottom: 0;
    width: 100%;
}





</style>
</head>
<body class="w3-theme-l5">
<?php 
session_start();    
?>

<!-- Navbar -->
<!-- Different buttons with reference to different sites such as google, facebook, home, gmail -->

<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="http://localhost/teste_isw/ReviewChan/html/index2.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Review Chan</a>
 <!-- DropDown notifications -->

 
  <!-- button for premium, opens separate page -->

      <a href="#" onclick="window.open('http://localhost/teste_isw/ReviewChan/html/checkout.html','Checkout Form','width=1600,height=900')" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-address-card"></i>Get Premium</a>
<!-- logout button, go by reference to login form -->

  <a href="http://localhost/teste_isw/ReviewChan/html/login.php"  class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../images/logout.png" class="w3-circle" style="height:23px;width:23px" alt="Log Out">Log Out Guest
  </a>
 </div>
</div>

<!-- Navbar on small screens, didn't edited this too much such as we don't need it, we're only displaying on a local computer -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->	  
<?php
  //get parameters for connection
include "config.php";

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
$search_value='guest';//keep this variable from login form in order to query it and retrieve information about actual session
  if(!($search_value == null or $search_value == '')){
		//this select is applied for current logged user in order to display his info on the top-left side of the site
        $sql="SELECT * FROM users where email like '%$search_value%'";
		

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
        $_SESSION['user_id'] = $row["user_id"];
//show result in card form top-left zone
		echo '<div class="w3-card w3-round w3-white">';
        echo '<div class="w3-container">';
        echo '<h4 class="w3-center">Welcome, '.$row["fullname"].'</h4>';
        echo '<hr>';
        echo '</div>';
        echo '</div>';
        echo '<br>';

            }       

        }
		
?>  	  
      <!-- Accordion -->
	  <!-- 3 buttons with 3 functions, to open cards such as search review, create review etc -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          
          <button onclick="myFunctionSearch()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Search Review</button>
          
      </div>
	  </div>
      <br>     
      <!-- Interests --> 
     
      <br>    
      <!-- Alert Boxes, needed for design purposes, they don't have logic implemented -->
      
	 
	 
	
    <!-- End Left Column -->
    </div>   
    <!-- Middle Column -->			
    <p>
	<div class="w3-col m7">  
	<!-- here is situated first card with create review tag -->
      <div class="w3-row-padding">
        <div class="w3-col m12">
		
        </div>
      </div>
	  </p> 
	 

	  <!-- Here you can search for review by different types of input, order them ascending or descending -->
	  <p>
      <div class="w3-row-padding">
        <div class="w3-col m12">
		<p>
          <div id="search" class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding" align="center">
			<hr>
              <h1 class="w3-opacity"><b>Search</b> Review</h1>
			<hr>
				<form action="" method="post">
				<p><input type="text" name="search" placeholder="Search Review" size="80" contenteditable="true" class="w3-border w3-padding" ></p>					
				<label for="searchby">Search by</label>
				<select name="searchby" id="searchby">
				<option value="name">Name</option>
				<option value="title">Title</option>
				<option value="stars">Stars</option>
				<option value="link">Link</option>
				<option value="category">Category</option>
				</select>
				<br><br>
				<label for="orderbyy">Order by</label>
				<select name="orderby" id="orderby">
				<option value="name">Name</option>
				<option value="title">Title</option>
				<option value="stars">Stars</option>
				<option value="link">Link</option>
				<option value="category">Category</option>
				</select>
				<br><br>
				<label for="ascdesc">Type of order</label>
				<select name="ascdesc" id="ascdesc">
				<option value="desc">Ascending</option>
				<option value="asc">Descending</option>
				</select>
				<br><br>
				<button type="submit" value="Search" class="block"><i class='fa fa-search'> Search</i></button>
				</form>		
            </div>
          </div>
		  </p>
        </div>
      </div>
	 <?php
//php to show review based on what you just searched (search_value is input field you typed earlier, what_to_search is the category of input(title, stars, link etc), order and ascc variables, well it's pretty obviously
include "config.php";
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}error_reporting(E_ERROR | E_PARSE);
$search_value=$_POST["search"];
$what_to_search=$_POST["searchby"];
$order=$_POST["orderby"];
$ascc=$_POST["ascdesc"];
 if(!($search_value == null or $search_value == '')){
        $sql="SELECT name,description,fullname,title,stars,link,category FROM reviews r join users u on r.user_id=u.user_id where $what_to_search like '%$search_value%' order by '$order' '$ascc'";
		//we always do a join in order to return some data from review's author too. EX: fullname
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){      
			//show as many cards as records in database that does match the description from $sql statement
				echo ' <div class="w3-container w3-card w3-white w3-round w3-margin"><br> ';
				echo '<u><h2><b><em>'.$row["title"].'</h2></b></em></u>';
		        echo '<h5>By '.$row["fullname"].' </h5>';
				echo' <hr class="w3-clear">';
				echo '<a href="'.$row["link"].'"><h4>'.$row["name"].'</a></h4><br>';
				echo '<h4>'.$row["stars"].' ★</h4>';
				echo' <hr class="w3-clear">';
				echo ' <p>'.$row["description"].'</p>';
				echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">'.$row["category"].'</button> ';
				echo '</div>  ';
		}       
    }
	
?>
	  </p>
  
	  </p>
    <!-- End Middle Column -->
    </div>
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><b><h3>TOP 5</h3></b></p>		  
		  <!-- Show top5 sites - best rated -->
		  <form action="index2.php" method="post">
		  <!-- clicking on refresh triggers the php script below -->
		   <p><button value="refresh" type="submit" id="refresh" name="refresh" class="w3-button w3-block w3-theme-l4">Refresh</button></p>
		   </form>
		   <p>
			<?php
			include "config.php";
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
			else if(isset($_POST['refresh'])){
		//retrieve the name of site and calculate the average of stars rated for that site, and print them in the form of a table with positions/name/overall Rating
			$sql="SELECT name as Name, AVG(stars) 'Overall Rating' FROM reviews  GROUP BY name ORDER BY AVG(stars) DESC limit 5;";		
			$res=$con->query($sql);
				echo '<table>';
				echo '<tr>';
				echo '	<th>No.</th>';
				echo '	<th>Name</th>';
				echo '	<th>Overall Rating</th>';
				echo '</tr>';
				$ct=0;
			while($row=$res->fetch_assoc()){
				$ct=$ct+1;				
				echo '<tr>';
				echo '	<td>'.$ct.'</td>';
				echo '	<td>'.$row["Name"].'</td>';
				echo '	<td>'.$row["Overall Rating"].'</td>';
				echo '</tr>';
            }       
			echo '</table>';
        }		
			?>
			  </p>			        
        </div>
      </div>
      <br>      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <b><p>Love our site? Support us.</p></b>
<!-- hyperlinks for sharing on different Social Media sites (works only if this site will ever be hosted) -->
<a href="https://www.facebook.com/sharer/sharer.php?u=<URL>" class="fa fa-facebook" style="font-size: 30px; text-decoration: none"></a>
<a href="https://twitter.com/share?url=<URL>&text=<TEXT>via=<USERNAME>" class="fa fa-twitter"style="font-size: 30px; text-decoration: none"></a>
<a href="https://www.linkedin.com/shareArticle?url=<URL>&title=<TITLE>&summary=<SUMMARY>&source=<SOURCE_URL>" class="fa fa-linkedin"style="font-size: 30px; text-decoration: none"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"style="font-size: 30px; text-decoration: none"></a>
<a href="https://reddit.com/submit?url=<URL>&title=<TITLE>" class="fa fa-reddit"style="font-size: 30px; text-decoration: none"></a>       
        </div>
      </div>
      <br>      
      <!-- Form to search directly for another sites to review on google inside our page -->
      
  <!-- End Right Column -->
    </div> 
  <!-- End Grid -->
  </div>
<!-- End Page Container -->
</div>
<br>
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Review Chan</h5>
</footer>
<footer class="w3-container w3-theme-d5" >
  <small>&copy; Copyright 2021, Chanvelopers Team </small> 
</footer>
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body>
</html> 
