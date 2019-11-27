
<!DOCTYPE html> 
<html> 
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' href='../css/styles.css'>
        <title>Index Page</title>
	<script type="text/javascript" src="../js/script.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../js/jquery-3.3.1.js"></script>	
	<script src="../js/index.js"></script>

  </head>
<body>
<?php

 	session_start();
        require'config.php';

	if(isset($_POST['login']))
	{
		 $username= $_POST['username'];
			$password= $_POST['password'];

		$query="select*from UserInfo WHERE username='$username' AND password='$password'";
		 $query_run = mysqli_query($con,$query);

		if(mysqli_num_rows($query_run)>0)
		{		
			//valid
		//	include("#user-panel");
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$results = mysqli_fetch_array($query_run);
			//echo($results["email"] . "hello from username");

		}
		else
		{
			//invalid
			echo'<script type="text/javascript"> alert("Invalid Username or Password")</script>';
			include("../webclient/index.php");
		}


	}
	else{
            echo'<script type="text/javascript"> alert("Username or Password may not match.. Try again")</script>';
			include("../webclient/index.php");
	}

include("../webclient/index.php");

?>
	<div id="id03" class="homeModal" style="overflow:hidden;position:fixed; background-color:white;top:100px;width:100%;">
		<form id="home" class="homePage-content animate" action="logout.php"  method="post">

			<div class="imgcontainer">
				<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h2>Home Page</h2>
				<h3> Welcome <?php echo $_SESSION['username'] ?> </h3>
				<p><a href='#profile'>View Profile</a></p>
				<img src="../img/anonymous.jpeg" alt="anonymous" class="anonymous">
			</div>


			<div class="container" style="background-color:#f1f1f1">
				<input type="submit" name="logout" class="logoutbtn" value="Logout"/>
			</div>

			<article id='profile' hidden='hidden'>
				<div class="profilecontainer">
					<h1>Personal Profile</h1>
					<strong>Name:  </strong><span><?php echo $_SESSION['username'] ?> <br></span>
					<strong>User name:  </strong><span><?php echo $_SESSION['username'] ?> <br></span>
				<strong>Password:  </strong><span><?php echo $_SESSION['password'] ?> <br></span>
				<strong>Email:  </strong><span><?php echo($results["email"]); ?>  <br></span>
				<strong>Address:  </strong><span><?php echo($results["address"]);?>  <br></span>
				</div>
			</article>
		</form>
 	</div>



 <script type="text/javascript" src="script.js"> </script>

</body>
</html>


