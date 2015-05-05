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

$newpass1 = $_POST["newpass"];
$loginid=$_SESSION['user'];






$sql="UPDATE tbl_login SET password='".$newpass1."' WHERE loginid='".$loginid."'";

if (mysqli_query($conn, $sql)) {
      $_SESSION['password']=$newpass1;
	   echo '<script type="text/javascript">';
             echo 'alert("Password Changed Successfully")';
             echo '</script>';
	  header("Location: userhome.php");
	  
	 //echo <a href="index.php">Go back to the main page</a>;
} 
else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>