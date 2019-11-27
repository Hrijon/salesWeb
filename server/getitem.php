<?php
	session_start();
	require'config.php';
if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM Items";
$result = $con->query($sql);
if ($result->num_rows > 0) {
$items= array( );
    // output data of each row
/*while($row = mysql_fetch_assoc($result))
{
    $items[] = $row;
}
print_r($items);
*/
/*
$cart_item = "<form method='POST'> <p><input type='submit' name='cart' value='Add to Cart' class='btnaddaction'/> <br> </form>";
	if(isset($_POST ['cart'])){
	echo'<script type="text/javascript"> alert("Item $var added to the cart.")</script>';
	//	echo "This is cart button that is selected";
	}
	/* $query= "select*from UserInfo WHERE username='$username'"; 
         $query_run = mysqli_query($con,$query);
          {
            $query= "INSERT INTO cart_item(ItemID, ItemName,username) values('$ItemID','$ItemName','username')";
            $query_run = mysqli_query($con,$query);
                if($query_run)
                {
                        echo'<script type="text/javascript"> alert("user Registered.. go to login")</script>';
                        include("../webclient/index.php");
                }*/
if($_SESSION['username'] == 'rijan' OR $_SESSION['username'] == 'user3' OR$_SESSION['username'] == 'user2' OR$_SESSION['username'] == 'user1'){
$buy_item = "<p><a href='../webclient/index.php#buy'><button>Buy Item</button></a></p>";
}

else{
$buy_item = "<p><a href='../webclient/index.php#nonuser'><button>Buy Item</button></a></p>";
}

$cart_item = "<p><input type='submit' name='cart' value='Add to Cart' class='btnaddaction'/><br><br>";
 while($row = $result->fetch_assoc()) {
//
$var = $row["ItemName"];
$items[] = $row["ItemName"];
$_SESSION["var"] = $items;
//$cart_btn = echo('<span><input type="button" value="Add to Cart">'); 
echo "<div class='column'> <div class='card' style='width: 18rem;'> <div class='card-body'> <h5 class='card-title'> ". $var.
  " <p class='card-text'>". $row["Discription"]."<br> InStock: ". $row["stock"] . "<br><h4> Price: </h4>$ " . $row["Price"] .
	 "</p> $cart_item $buy_item </div> </div> </div>";
//echo "<br> ItemName: ". $row["ItemName"]. " - discription: ". $row["Discription"]. "<br>";
	
//echo "<div class='item'> <h2>". $row["ItemName"]."</h2> <p>". $row["Discription"]. "</p><h4>Price:". $row["Price"]. "</h4></div>".
//"</p> <p><a href='#'><button>Buy now</button></a></p>";
    
  }
} else {
    echo "0 results";
}
?>
