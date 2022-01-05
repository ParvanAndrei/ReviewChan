
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

</style>
</head>
<body class="w3-theme-l5">
<?php 
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
?>
<!-- Navbar -->
<!-- Different buttons with reference to different sites such as google, facebook, home, gmail -->

<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="http://localhost/teste_isw/ReviewChan/html/index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Review Chan</a>
  <a href="https://www.google.ro/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Google Search"><i class="fa fa-globe"></i></a>
  <a href="https://www.facebook.com/#!/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Share it on Facebook"><i class="fa fa-user"></i></a>
  <a href="https://www.google.com/intl/en-GB/gmail/about/#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Send it on email"><i class="fa fa-envelope"></i></a>
 <!-- DropDown notifications -->

 <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">We updated your User Experience on 07-December-2021</a>
      <a href="#" class="w3-bar-item w3-button">We updated your Account Privacy Settings on 11-October-2021</a>
      <a href="#" class="w3-bar-item w3-button">We updated your Login Security on 26-November-2021</a>
    </div>
  </div>
  <!-- button for premium, opens separate page -->

      <a href="#" onclick="window.open('http://localhost/teste_isw/ReviewChan/html/checkout.html','Checkout Form','width=1600,height=900')" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-address-card"></i>Get Premium</a>
<!-- logout button, go by reference to login form -->

  <a href="http://localhost/teste_isw/ReviewChan/html/login.php"  class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../images/logout.png" class="w3-circle" style="height:23px;width:23px" alt="Log Out">Log Out
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

$servername = "localhost";
$username = "dani";
$password = "4444";
$dbname = "isw";
error_reporting(E_ERROR | E_PARSE);
$search_value=$_SESSION['uname'];//keep this variable from login form in order to query it and retrieve information about actual session
$con=new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
    echo 'Connection Failed: '.$con->connect_error;
    }else if(!($search_value == null or $search_value == '')){
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
        echo '<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Email - '.$row["email"].'</p>';
        echo '<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>User ID - '.$row["user_id"].'</p>';
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
          <button onclick="myFunctionCreate()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Create Review</button>
          
          <button onclick="myFunctionSearch()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Search Review</button>
          
          <button onclick="myFunctionMine()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Reviews</button>		      
      </div>
	  </div>
      <br>     
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
		  <!-- These are here cause we need them in order to have an idea about what categories to search for -->
            <span class="w3-tag w3-small w3-theme-d5">Shopping</span>
            <span class="w3-tag w3-small w3-theme-d4">Learning</span>
            <span class="w3-tag w3-small w3-theme-l4">Streaming</span>
            <span class="w3-tag w3-small w3-theme-l4">General</span>			
          </p>
        </div>
      </div>
      <br>    
      <!-- Alert Boxes, needed for design purposes, they don't have logic implemented -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Tips & Tricks</strong></p>
        <p>Review sites easier using this tools.</p>
		<p>Check this out.</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Check this 5 stars rated sites.</strong></p>
		<p>See more details</p>
      </div>
	  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Need help on how to review?</strong></p>
        <p>Click here and let's get started.</p>
      </div>   
	<!-- Card for weather -->
	   <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
<iframe src="https://www.meteoblue.com/en/weather/widget/three?geoloc=detect&nocurrent=0&noforecast=0&noforecast=1&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=image"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 310px; height: 200px"></iframe><div><!-- DO NOT REMOVE THIS LINK --><a href="https://www.meteoblue.com/en/weather/week/index?utm_source=weather_widget&utm_medium=linkus&utm_content=three&utm_campaign=Weather%2BWidget" target="_blank" rel="noopener">meteoblue</a></div></div>
      </div>
	  <br>	  
	  <!-- Code for embedded youtube song while reviewing :D -->  
	   <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
		<iframe width="310" height="200" src="https://www.youtube.com/embed/pAgnJDJN4VA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
      </div>
	  <br>	  
    <!-- End Left Column -->
    </div>   
    <!-- Middle Column -->			
    <p>
	<div class="w3-col m7">  
	<!-- here is situated first card with create review tag -->
      <div class="w3-row-padding">
        <div class="w3-col m12">
		<p>
          <div id="create" class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding" align="center">
			<hr>
              <h1 class="w3-opacity"><b>Create</b> Review</h1>
			  <hr>
			  <p>
	 <form action="index.php" method="post">
			<i class="material-icons">title</i><!-- Here is the area for different details about the site/review -->
			  <input type="text" id="id3" name="id3" placeholder="ID" contenteditable="true" class="w3-border w3-padding" required></p>
			<i class='fa fa-address-book'></i>
<input type="text" id="title3" name="title3" placeholder="Title" contenteditable="true" class="w3-border w3-padding" required></p>
             <p><i class='fa fa-internet-explorer'></i>
<input type="text" id="name3" name="name3" placeholder="Name of site" contenteditable="true" class="w3-border w3-padding" required></p>
			    <p><i class='fa fa-link'></i>
<input type="text" id="link3" name="link3" placeholder="Link" contenteditable="true" class="w3-border w3-padding" required></p>
<!-- input in the form of select with dropdown options -->
<label for="category3">Category</label>
				<select name="category3" id="category3">
				<option value="Shopping">Shopping</option>
				<option value="Learning">Learning</option>
				<option value="Streaming">Streaming</option>
				<option value="General">General</option>
				</select>			
<label for="stars">Stars</label>
				<select name="stars" id="stars">
				<option value="1">★</option>
				<option value="2">★★</option>
				<option value="3">★★★</option>
				<option value="4">★★★★</option>
				<option value="5">★★★★★</option>
				</select>
<p>
<i class='fa fa-align-justify'></i>
<textarea placeholder="Write your review here" id="review3" name="review3" rows="9" cols="80" required></textarea>
</p>
<button  type="submit3" value="Submit3" id ="but_submit3" name="but_submit3"  class="block"><i class="fa fa-pencil"></i>  Post</button> 	
</form>		  
            </div>
          </div>
		</p>
        </div>
      </div>
	  </p> 
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
	     //if submitted, send them to table reviews in mysql connection and display an alert message
	  if(isset($_POST['but_submit3']))
{    	
		$review_id= $_POST["id3"];
		$user_id =  $_SESSION['user_id'];
        $title = $_POST['title3'];
        $name =  $_POST['name3'];
        $link = $_POST['link3'];
		$description = $_POST['review3'];
		$stars = $_POST['stars'];
		$sql = "INSERT INTO reviews(review_id,user_id,title,name,description,stars,link) VALUES ('$review_id','$user_id','$title','$name','$description','$stars','$link')"; 

			if(mysqli_query($conn, $sql)) 
			{
				echo'<div class="alert alert-success">';
				echo'<strong>Success!</strong> Review added to our site.';
				echo'</div>';
			}
			 else{
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		
					}	
     mysqli_close($conn);
}
?> 
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
	     //also on the same button functionality, send category to separate table
	  if(isset($_POST['but_submit3']))
{    	
		$review_id= $_POST["id3"];
		$category= $_POST["category3"];
		$sql = "INSERT INTO category(review_id,category) VALUES ('$review_id','$category')"; 
			if(mysqli_query($conn, $sql)) 
			{
				echo'<div class="alert alert-success">';
				echo'<strong>Success!</strong> Review added to our category.';
				echo'</div>';
			}
			 else{
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		
					}		
    mysqli_close($conn);
}
?>  
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
				<option value="review_id">Review ID</option>
				<option value="title">Title</option>
				<option value="name">Name</option>
				<option value="stars">Stars</option>
				<option value="link">Link</option>
				<option value="category">Category</option>
				</select>
				<br><br>
				<label for="orderbyy">Order by</label>
				<select name="orderby" id="orderby">
				<option value="review_id">Review ID</option>
				<option value="title">Title</option>
				<option value="name">Name</option>
				<option value="stars">Stars</option>
				<option value="link">Link</option>
				<option value="link">Category</option>
				</select>
				<br><br>
				<label for="ascdesc">Type of order</label>
				<select name="ascdesc" id="ascdesc">
				<option value="ASC">Ascending</option>
				<option value="DESC">Descending</option>
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
$servername = "localhost";
$username = "dani";
$password = "4444";
$dbname = "isw";
error_reporting(E_ERROR | E_PARSE);
$search_value=$_POST["search"];
$what_to_search=$_POST["searchby"];
$order=$_POST["orderbyy"];
$ascc=$_POST["ascdesc"];
$con=new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
    echo 'Connection Failed: '.$con->connect_error;
    }else if(!($search_value == null or $search_value == '')){
        $sql="SELECT name,description,fullname,title,stars,link,category FROM reviews r join users u on r.user_id=u.user_id join category c on c.review_id=r.review_id where $what_to_search like '%$search_value%' order by '$order' '$ascc'";
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
  <div id="mine" class="w3-container w3-card w3-white w3-round w3-margin"><br>
 <p>  
	  <?php
//this code is the same as you saw earlier, but it is oriented on the #_SESSION variable named UNAME where UNAME is the email address of the user, and 
//we query this in order to retrieve details about current user logged in and show based on clicking the My Reviews button
$servername = "localhost";
$username = "dani";
$password = "4444";
$dbname = "isw";
error_reporting(E_ERROR | E_PARSE);
$search_value=$_SESSION['uname'];
$con=new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
    echo 'Connection Failed: '.$con->connect_error;
    }else if(!($search_value == null or $search_value == '')){	
		$sql="SELECT name,description,title,stars,fullname,link FROM reviews r join users u on r.user_id=u.user_id where u.email like '%$search_value%'";		
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){		
			//echo ' <div class="w3-container w3-card w3-white w3-round w3-margin"><br> ';
        echo '<u><h2><b><em>'.$row["title"].'</h2></b></em></u>';
		        echo '<h5>By '.$row["fullname"].' </h5>';
				echo' <hr class="w3-clear">';
				echo '<a href="'.$row["link"].'"><h4>'.$row["name"].'</a></h4><br>';
				echo '<h4>'.$row["stars"].' ★</h4>';
				echo' <hr class="w3-clear">';
				echo ' <p>'.$row["description"].'</p>';
				echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> ';		
            }       
        }
?>
</div>
	  </p>
    <!-- End Middle Column -->
    </div>
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><b><h3>TOP 5</h3></b></p>		  
		  <!-- Show top5 sites - best rated -->
		  <form action="index.php" method="post">
		  <!-- clicking on refresh triggers the php script below -->
		   <p><button value="refresh" type="submit" id="refresh" name="refresh" class="w3-button w3-block w3-theme-l4">Refresh</button></p>
		   </form>
		   <p>
			<?php
			$servername = "localhost";
			$username = "dani";
			$password = "4444";
			$dbname = "isw";
			error_reporting(E_ERROR | E_PARSE);
			$con=new mysqli($servername,$username,$password,$dbname);
			if($con->connect_error){
			echo 'Connection Failed: '.$con->connect_error;
			}else if(isset($_POST['refresh'])){
		//retrieve the name of site and calculate the average of stars rated for that site, and print them in the form of a table with positions/name/overall Rating
			$sql="SELECT name as Name, AVG(stars) 'Overall Rating' FROM reviews GROUP BY name ORDER BY AVG(stars) DESC limit 5;";		
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
      <!-- Form to search directly for another sites to review on google inside our page, cool stuff I know you don't have to do anything hard to review it. haha :D -->
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><img src="../images/google.png" width="100" height="50"></p>
		<h6 style="text-align: center;"><b>Search the site, and then review it!</b></h6>
       <form action="http://www.google.com/search" method="get" target="_blank">
		<input type="text" name="q"/>
		<p><input type="submit" value="Search" /></p>
		</form>
      </div>
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
<footer class="w3-container w3-theme-d5">
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
