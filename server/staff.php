
<!DOCTYPE html>
<html>
<body>

<?php
	//session start will start the connection to the database where require  calls the php page of the connection code
	session_start();
	require'config.php';
	
//if error it will throw an error as connect error and die the server

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM Items";
$user = "SELECT * FROM UserInfo";

$result = $con->query($sql);
$ruser = $con->query($user);

if ($result->num_rows > 0 OR $ruser->num_rows > 0) {
    // output data of each row
echo("<h4 style='color:red; text-align:center; font-size:25px;'>Items table datas:</h4> <br><br>");
    while($results = $result->fetch_assoc()) {

$re = "<strong> Item No: </strong>". $results['ItemID']. "<strong> Item Name: </strong>".$results['ItemName'].  "<strong> Item Description: </strong>".$results['Discription']. "<strong> Item Price: </strong>".$results['Price']."<br><br>";
		echo($re);

    }
	echo("<br> <br><h4 style='color:red; text-align:center; font-size:25px;'> User information table datas:</h4><br> <br> ");
	    while($ur = $ruser->fetch_assoc()) {

		$user_result = "<strong> User Name: </strong>". $ur['username']. "<strong> password: </strong>".$ur['password'].  "<strong> Email: </strong>".$ur['email']. "<strong> Address: </strong>".$ur['address']."<br><br>";
                echo($user_result);

	    }

} else {
    echo "0 results";
}

$con->close(); //close will die the connection

?>

</body>
</html>
