<?php
// con varible make a connection of user X33564044 to the database (mysql) 
// die will close the connection if there is an error occur 
$con = mysqli_connect("localhost", "X33564044","X33564044", "X33564044") or die("Unable to connect");
mysqli_select_db($con, "X33564044") OR die('cannot connect to database'.mysqli_error("X33564044"));

?>
