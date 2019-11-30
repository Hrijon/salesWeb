
<!DOCTYPE html>
<html>
<body>

<?php
	session_start();
	require'config.php';
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM Items";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($results = $result->fetch_assoc()) {

$re = "<strong> Item No: </strong>". $results['ItemID']. "<strong> Item Name: </strong>".$results['ItemName'].  "<strong> Item Description: </strong>".$results['Discription']. "<strong> Item Price: </strong>".$results['Price']."<br><br>";
		echo($re);

    }
} else {
    echo "0 results";
}

$con->close(); //close will die the connection

?>

</body>
</html>
