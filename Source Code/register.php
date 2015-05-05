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

$emailId = $_POST["email"];
$confirmemailId = $_POST["confirmemail"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];
$name = $_POST["name"];
$street = $_POST["Streetname"];
$phonenumber = $_POST["phone"];
$Countryy =$_POST["Country"];
$datenumber=$_POST["datenum"];
$month=$_POST["month"];
$dobyear=$_POST["yearofbirth"];
$casee=$_POST["case"];
$key = mt_rand(1000,999999);


$sql="INSERT INTO tbl_login(loginid,confirmloginid,aid,password,confirmpassword,Name,phonenumber,street,country,gender,datenumber,month,yearofbirth)
VALUES('".$emailId."','".$confirmemailId."','".$key."','".$password."','".$confirmpassword."','".$name."','".$phonenumber."','".$street."','".$Countryy."','".$casee."','".$datenumber."','".$month."','".$dobyear."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 
	 echo 'Successfully Registered';
	 echo '<a href="index.html">Go back to the main page</a>';
	 
} 
else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>