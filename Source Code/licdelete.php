<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	$loginid=$_SESSION["user"];
	$password=$_SESSION["password"];
	$sql1 = "SELECT * FROM tbl_login WHERE loginid='".$loginid."' AND password='".$password."'";
    $query= mysqli_query($conn,$sql1) or die(mysqli_error($conn)) ;
	$count=mysqli_num_rows($query);
         if($count==1)
		 {
			 while($row = mysqli_fetch_assoc($query)) 
			 {
	
	
				
				$sql1="UPDATE tbl_login SET premium='' , policyholder='' , policyno='' ,totinsurance='', expiry=''  WHERE loginid='".$loginid."' AND password='".$password."'";
			 }
			 
if (mysqli_query($conn, $sql1)) {
      header("Location:userhome.php");
	 // echo $netbalance1;
	 //echo <a href="index.php">Go back to the main page</a>;
} 
else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
		 }
?>