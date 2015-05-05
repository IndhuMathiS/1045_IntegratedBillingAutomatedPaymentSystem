<?php session_start();
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

$polname = $_POST["holdername"];
$polno = $_POST["policyno"];
$totamount = $_POST["tamount"];
$dueamount = $_POST["pamount"];
$startingdate = $_POST["sdate"];
$expirydate = $_POST["edate"];




$sql="INSERT INTO lic(name,policyno,totalamount,dueamount,startingdate,expirydate)
VALUES('".$polname."','".$polno."','".$totamount."','".$dueamount."','".$startingdate."','".$expirydate."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 echo '<script type="text/javascript">';
             echo 'alert("Account Linked Successfully")';
             echo '</script>';
			 echo '<a href="licregister.html">Register Another Account</a>';
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>