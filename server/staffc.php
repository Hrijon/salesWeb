<?php
	//session start will start the connection to the database where require  calls the php page of the connection code
	session_start();
	require'config.php';
	
//if error it will throw an error as connect error and die the server
if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}

//session variable is a global variable which we can call from any php page under the same connection

			if('staff1' == $_SESSION['username'] OR 'staff2' == $_SESSION['username'] OR 'staff3' == $_SESSION['username']){

                        	include("staff.php");
//include is calling the index page or staff page
                        }
                        else
                        include("../webclient/index.php");

?>
