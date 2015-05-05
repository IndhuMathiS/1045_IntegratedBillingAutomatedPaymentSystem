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

$banknme = $_POST["bank"];
$branchname = $_POST["branch"];
$accono = $_POST["cardnum"];
$cno = $_POST["cnum"];
$cvv = $_POST["cvv"];
$acconame = $_POST["holdername"];

$amont = $_POST["amount"];



$sql="INSERT INTO bank_account(bank,branch,accountno,holdername,amount,cardnum,cvv)
VALUES('".$banknme."','".$branchname."','".$accono."','".$acconame."','".$amont."','".$cno."','".$cvv."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 
	 echo 'Successfully Registered';
	 echo '<a href="index.html">Go back to the main page</a>';
	 
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	//echo 'Account Number Invalid';
}
?>