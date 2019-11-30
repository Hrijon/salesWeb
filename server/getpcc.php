<?php
	//session start will start the connection to the database where require  calls the php page of the connection code

        session_start();
        require'config.php';
//if error it will throw an error as connect error and die the server

if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
$query = 'h400i';
$query2= 'carbide';
$query3= 'matrexx';
$sql = "SELECT * FROM Items  WHERE  (ItemID LIKE '%$query%') OR (ItemName LIKE '%$query%') OR (Discription LIKE '%$query%') OR (price LIKE '%$query%') OR (ItemID LIKE '%$query2%') OR ".
"(ItemName LIKE '%$query2%') OR (Discription LIKE '%$query2%') OR (price LIKE '%$query2%') OR".
"(ItemID LIKE '%$query3%') OR (ItemName LIKE '%$query3%') OR (Discription LIKE '%$query3%') OR (price LIKE '%$query3%')";

$result = $con->query($sql);

if ($result->num_rows > 0) {
$items= array( );
$cart_item = "<p><input type='submit' name='cart' value='Add to Cart' class='btnaddaction'/><br><br>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

$var = $row["ItemName"];

//echo "<div class='column'> <div class='card' style='width: 18rem;'> <div class='card-body'> <h5 class='card-title'> ". $var.
//   " <p class='card-text'>". $row["Discription"]. "<h4>Price:".$row["price"].
"</h4></p><p><a href='../webclient/index.php#buy'><button>Buy Item</button></a></p> </div> </div> </div>";
//echo "<br> ItemName: ". $row["ItemName"]. " - discription: ". $row["Discription"]. "<br>";
echo "<div class='column'> <div class='card' style='width: 18rem;'> <div class='card-body'> <h5 class='card-title'> ". $var.
" <p class='card-text'>". $row["Discription"]."<br> InStock: ". $row["stock"] . "<br><h4> Price: </h4>$ " . $row["Price"] .
 "</p> $cart_item <p><a href='../webclient/index.php#buy'><button>Buy Item</button></a></p> </div> </div> </div>";

//echo "<div class='item'> <h2>". $row["ItemName"]."</h2> <p>". $row["Discription"]. "</p><h4>Price:". $row["Price"]. "</h4></div>".
//"</p> <p><a href='#'><button>Buy now</button></a></p>";

  }

} else {
    echo "0 results";
}

$con->close(); //close will die the connection


?>

