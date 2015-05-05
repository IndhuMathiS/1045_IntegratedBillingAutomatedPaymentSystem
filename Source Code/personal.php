<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);




// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$emailId = $_POST["one"];
$confirmemailId = $_POST["two"];
$password = $_POST["three"];
$confirmpassword = $_POST["four"];
$name = $_POST["five"];
$street = $_POST["six"];



$sql="INSERT INTO addcash_manual(easyid,addone,city,state,mob1,mob2)
VALUES('".$emailId."','".$confirmemailId."','".$password."','".$confirmpassword."','".$name."','".$street."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 ?><html><head>
	 <title>EASYPAY</title>
	 </head> 
	 <body><center><p>
	 'Thanks for contacting Us.Our Team will get in Touch with You Shortly';
	 </p>
	 <a href="userhome.php">Homepage</a>
	 </center>
	 </body>
	 </html><?php
	 
	  
	
	 
	 
} 
else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>