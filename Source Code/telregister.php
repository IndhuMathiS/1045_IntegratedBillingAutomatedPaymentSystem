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

$username = $_POST["username"];
$password = $_POST["password"];
$billamount = $_POST["billamount"];
$duedate = $_POST["duedate"];




$sql="INSERT INTO tel_login(username,password,telbill,teldate)
VALUES('".$username."','".$password."','".$billamount."','".$duedate."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 echo '<script type="text/javascript">';
             echo 'alert("Account Linked Successfully")';
             echo '</script>';
			 echo '<a href="telregister.html">Register Another Account</a>';
} 
else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>