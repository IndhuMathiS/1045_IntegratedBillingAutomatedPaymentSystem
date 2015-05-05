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

$acntno = $_POST["accno"];
$hldrname = $_POST["name"];
$bankname = $_POST["bank"];
$branch = $_POST["branch"];
$rentamount = $_POST["rent"];
$lastdate = $_POST["rdate"];




$sql="INSERT INTO houserent(accno,holname,bankname,branch,rentamount,lastdate)
VALUES('".$acntno."','".$hldrname."','".$bankname."','".$branch."','".$rentamount."','".$lastdate."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 echo '<script type="text/javascript">';
             echo 'alert("Account Linked Successfully")';
             echo '</script>';
			 echo '<a href="rentregister.html">Register Another Account</a>';
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>