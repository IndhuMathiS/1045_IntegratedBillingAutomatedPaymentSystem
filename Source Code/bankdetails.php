<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	$loginid=$_SESSION["user"];
	$password=$_SESSION["password"];	
         if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		 {
						$cardnum = $_POST["cardnum"];
						$holdername = $_POST["holdername"];
						$cvv = $_POST["cvv"];
						$bankname = $_POST["bankname"];
						$wallet = $_POST["amount"];
						
						
						$slq="SELECT * FROM bank_account WHERE cardnum='".$cardnum."' AND cvv='".$cvv."' AND bank='".$bankname."' ";
						$qury= mysqli_query($conn,$slq) or die(mysqli_error($conn)) ;
						$count=mysqli_num_rows($qury);
						
					if($count==1)
					{
						while($row = mysqli_fetch_assoc($qury)) 
						  {
								$netblnce = $row["netbalance"];
								$netbalance1 = $wallet + $netblnce;
								$sql="UPDATE tbl_login SET cardnum='".$cardnum."' , holdername='".$holdername."' , cvv='".$cvv."' , bankname='".$bankname."' , walletbalance='".$wallet."' , netbalance='".$netbalance1."'  WHERE loginid='".$loginid."' AND password='".$password."'";
								 if (mysqli_query($conn, $sql)) 
								 {
									  header("Location:userhome.php");
									 // echo $netbalance1;
									 //echo <a href="index.php">Go back to the main page</a>;
								  } 
								else 
									{
										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
						 }
			 }
		else
		{
			?>
			<html>
			<head>
			<title>
			EASYPAY
			</title>
			</head>
			<body>
			<center>
			"Invalid Card Details"
			<br><br><a href="bank_details.html">ReEnter Details</a>
			</center>
			</body>
			</html>
			<?php
		}
			 
			 

		 }
		 
?>