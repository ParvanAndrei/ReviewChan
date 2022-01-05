
<html>
<title>ReviewChan</title>
<meta charset="UTF-8">
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

<script src="../javascript/index.js"></script>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Review Chan</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new review posted</a>
      <a href="#" class="w3-bar-item w3-button">Your post has been submitted</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your review</a>
    </div>
  </div>
  <a href="http://localhost/teste_isw/ReviewChan/html/login.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../images/logout.png" class="w3-circle" style="height:23px;width:23px" alt="Log Out">Log Out
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
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
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
?>
	  
<?php
  

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
		
        $sql="SELECT * FROM users where email like '%$search_value%'";
		

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
        $_SESSION['user_id'] = $row["user_id"];

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
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunctionCreate()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Create Review</button>
          
          <button onclick="myFunctionSearch()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Search Review</button>
          
          <button onclick="myFunctionMine()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Reviews</button>
         

		 <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
            <a href="https://www.emag.ro/"> <img src="../images/emag-logo.png" style="width:100%" class="w3-margin-bottom"> </a>
           </div>
           <div class="w3-half">
            <a href="https://www.olx.ro/"> <img src="../images/olx.png" style="width:100%" class="w3-margin-bottom"> </a>
           </div>
           <div class="w3-half">
            <a href="https://www.cel.ro/"> <img src="../images/cel.png" style="width:100%" class="w3-margin-bottom"> </a>
           </div>
           <div class="w3-half">
            <a href="https://www.eclipse.org/"> <img src="../images/eclipse.png" style="width:100%" class="w3-margin-bottom"> </a>
         </div>
          </div>
        </div>      
      </div>
	  </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">Shopping</span>
            <span class="w3-tag w3-small w3-theme-d4">Learning</span>
            <span class="w3-tag w3-small w3-theme-d3">Books</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Trips</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Movies</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
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
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
	
    <p>
	<div class="w3-col m7">
    
	
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
			<i class="material-icons">title</i>
			  <input type="text" id="id3" name="id3" placeholder="ID" contenteditable="true" class="w3-border w3-padding" required></p>
			<i class='fa fa-address-book'></i>
<input type="text" id="title3" name="title3" placeholder="Title" contenteditable="true" class="w3-border w3-padding" required></p>
             <p><i class='fa fa-internet-explorer'></i>
<input type="text" id="name3" name="name3" placeholder="Name of site" contenteditable="true" class="w3-border w3-padding" required></p>
			    <p><i class='fa fa-link'></i>
<input type="text" id="link3" name="link3" placeholder="Link" contenteditable="true" class="w3-border w3-padding" required></p>




<p>
<i class='fa fa-align-justify'></i>
<textarea placeholder="Write your review here" id="review3" name="review3" rows="9" cols="80" required></textarea>
</p>
			<h3>Rate it</h3>


				
				
				
<div class="cont">
<div class="stars">
  <input class="star star-5" id="star-5" type="radio" name="star" value=5/>
  <label class="star star-5" for="star-5"></label>
  <input class="star star-4" id="star-4" type="radio" name="star" value=4/>
  <label class="star star-4" for="star-4"></label>
  <input class="star star-3" id="star-3" type="radio" name="star" value=3/>
  <label class="star star-3" for="star-3"></label>
  <input class="star star-2" id="star-2" type="radio" name="star" value=2/>
  <label class="star star-2" for="star-2"></label>
  <input class="star star-1" id="star-1" type="radio" name="star" value=1/>
  <label class="star star-1" for="star-1"></label>
  			 <button  type="submit3" value="Submit3" id ="but_submit3" name="but_submit3"  class="block"><i class="fa fa-pencil"></i>  Post</button> 	

</form>
</div>
</div>


			  
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
	     
	  if(isset($_POST['but_submit3']))
{    	
		$review_id= $_POST["id3"];
		$user_id =  $_SESSION['user_id'];
        $title = $_POST['title3'];
        $name =  $_POST['name3'];
        $link = $_POST['link3'];
		$description = $_POST['review3'];
		$stars = $_POST['stars3'];
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
				</select>
				<br><br>
				<label for="orderbyy">Order by</label>
				<select name="orderby" id="orderby">
				<option value="review_id">Review ID</option>
				<option value="title">Title</option>
				<option value="name">Name</option>
				<option value="stars">Stars</option>
				<option value="link">Link</option>
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
		
        $sql="SELECT name,description,fullname,title,stars,link FROM reviews r join users u on r.user_id=u.user_id where $what_to_search like '%$search_value%' order by '$order' '$ascc'";
		

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
            
			
				echo ' <div class="w3-container w3-card w3-white w3-round w3-margin"><br> ';
				echo '<u><h2><b><em>'.$row["title"].'</h2></b></em></u>';
		        echo '<h5>By '.$row["fullname"].' </h5>';
				echo' <hr class="w3-clear">';
				echo '<a href="'.$row["link"].'"><h4>'.$row["name"].'</a></h4><br>';
				echo '<h4>'.$row["stars"].' ★</h4>';
				echo' <hr class="w3-clear">';
				echo ' <p>'.$row["description"].'</p>';
				echo '<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> ';
				echo '</div>  ';

		}       

    }
?>

	  </p>
 
 
 <p>
      <div id="mine" class="w3-container w3-card w3-white w3-round w3-margin"><br>
	  <?php



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
          <p><b><h3>Drafts</h3></b></p>
          <img src="../images/draft.png" alt="Forest" style="width:100%;">
          <p><strong>About Apple.com</strong></p>
          <p>Friday 3:36 PM</p>
          <p><button class="w3-button w3-block w3-theme-l4">Continue</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Review Request</p>
          <span>Marcus03 wants to share your review.</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check">Accept</i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove">Decline</i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      
     
      
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
