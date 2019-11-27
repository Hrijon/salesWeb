<?php
	session_start();
	require'config.php';
	

if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}

//include 'getitem.php?varname=<?php echo $var_value ';
echo($_SESSION["var"]);
$sql = "SELECT * FROM Items where ItemName='{$_SESSION['var']}";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//echo "<div class='column'> <div class='card' style='width: 18rem;'> <div class='card-body'> <h5 class='card-title'> ". $row["ItemName"].
//    " <p class='card-text'>". $row["Discription"]. "</p> <p><a href='#i5'><button>View Item</button></a></p> </div> </div> </div>";
//echo "<br> ItemName: ". $row["ItemName"]. " - discription: ". $row["Discription"]. "<br>";

if($_SESSION['username'] == 'rijan' OR $_SESSION['username'] == 'user3' OR$_SESSION['username'] == 'user2' OR$_SESSION['username'] == 'user1' ){ 
$buy_item = "<p><a href='../webclient/index.php#buy'><button>Buy Item</button></a></p>";
}
else{
$buy_item = "<p><a href='../webclient/index.php#nonuser'><button>Buy Item</button></a></p>";
}

$cart_item = "<p><input type='submit' name='cart' value='Add to Cart' class='btnaddaction'/><br><br>";


echo "<div class='item'> <h2>". $_SESSION["var"] ."</h2> <p>". $row["Discription"]. "</p><h4>Price:". $row["Price"]. "</h4></div>".
"</p> $cart_item $buy_item </p>";
    

  }

} else {
    echo "0 results";
}
$con->close();

?>


