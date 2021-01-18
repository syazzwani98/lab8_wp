<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style type="text/css">
        .jumbotron {
            background-color: #F0F8FF;
        }
        
        body{
            background-color: #ADD8E6;
        }
    </style>
    
    <title>Member Page</title>
</head>

<body>
<!-- <div id="wrapper"> -->
<div class="container"> 
	<!--
    <header>
        <h1>Software Engineering Club</h1>
    </header> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">
        <img src="selogo.jpg" width="40" height="30" class="d-inline-block align-top" alt=""> 
        SE Club
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link" href="index.html">HOME </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.html">EVENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.html">SIGN UP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">LOGIN</a>
         </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main>
        <div class="jumbotron">
            <div class="alert alert-info" role="alert">			
			<?php 
			
			//Step 1. Connect to the database.
			//Step 2. Handle connection errors
			//including the database connection file
			include_once("config.php");

			$uname = $studentID = $email = $password = $rpassword = $birthday = $event = "";

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// do post
				if ( isset($_POST["uname"]) && isset($_POST["studentID"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rpassword"]) && isset($_POST["birthday"])&& isset($_POST["event"]) ) {
					
					$uname = $_POST["uname"];
					$studentID = $_POST["studentID"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$rpassword = $_POST["rpassword"];
					$birthday = $_POST["birthday"];
					$event = $_POST["event"];
					
					//validate member exists or not
					$sql = "SELECT `email`, `studentid` FROM `members` WHERE `studentid`='".$studentID."' OR `email`='".$email."'";
					$result = $conn->query($sql); 
					if($result->num_rows >= 1) {
						echo "<h2>Email or Student ID already exists.</h2>";
						echo "<a class=\"nav-link\" a href=\"signup.html\">Sign Up</a>"; 
						echo "<a class=\"nav-link\" a href=\"login.html\">Log In</a>"; 
					} else {						
						//Step 3. Execute the SQL query.	
						//insert data into database's table: members     
           // prepare and bind
            $stmt = $conn->prepare("INSERT INTO members(name,studentid,email,password,birthday,event) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $uname,$studentID,$email,$password,$birthday,$event);
            $stmt->execute();
            
						//Step 4. Process the results.
						//display success message & the new data can be viewed on index.php
						echo "<h2>Registration successful.</h2>";
            echo "<a class=\"nav-link\" href=\"login.html\">Log In</a>"; 
            $stmt->close();
					}
				}
			} 
				
			//Step 5: Freeing Resources and Closing Connection using mysqli	
      $conn->close();
			
			?> 
			</div>
        </div>
    </main>
     </div> <!-- end jumbotron -->
     
    
    <footer class="container text-center font-italic">
        <hr>
        Copyright &copy; 2019 UM Software Engineering Club <br>
        <a href="mailto:umseclub@um.edu.my">umseclub@um.edu.my</a>
    </footer>
</div>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
