<?php session_start();
     $conn = mysqli_connect("localhost","root","","test_database");
     $loginid=$_SESSION['user'];
	 $password=$_SESSION['password'];
	           
	  
	 $sql = "SELECT * FROM tbl_login WHERE loginid='".$loginid."' AND password='".$password."'";
       $query= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
	 if (mysqli_num_rows($query) == 1)
	 {	
 
		 while($row = mysqli_fetch_assoc($query))
			 {
				 
				$rent=$row["rent"];
				 
				 
				$netbalance=$row["netbalance"];
				$row["netbalance"]=$netbalance - $rent;
				$nb1=$row["netbalance"];
				$anumber=$row["ano"];
			    
				//$oid=$row["accountno"];
				
			 }
			 
			  $sql="UPDATE tbl_login SET rent='' , netbalance='".$nb1."'  WHERE loginid='".$loginid."' AND password='".$password."'";
			  if (mysqli_query($conn, $sql)) 
			 {
				 
				?> <html>
				<title>EASYPAY </title>
				<head><meta http-equiv="refresh" content="3;url=userhome.php" /></head>
				<body> <center> <p> 
				Transaction Successful <br>
				Rs.<?php echo $rent ?> Successfully credited to <?php
				
				//header("Location: addservice.php");
				
			} else {
				 echo "Errorrr1: " . $sql . "<br>" . mysqli_error($conn);
			}
	 }
	 
	 $sql1 = "SELECT * FROM bank_account WHERE accountno='".$anumber."' ";
       $query1= mysqli_query($conn,$sql1) or die(mysqli_error($conn)) ;
	 if (mysqli_num_rows($query1) == 1)
	 {		 
		 while($row = mysqli_fetch_assoc($query1))
			 {
				
				$netbalance1=$row["amount"];
				$row["amount"]=$netbalance1 + $rent;
				$nb2=$row["amount"];
				
			 }
              
			  $sql1="UPDATE bank_account SET amount='".$nb2."'  WHERE accountno='".$anumber."' ";
			  if (mysqli_query($conn, $sql1)) 
			 {
				$sql="UPDATE tbl_login SET  rent='' WHERE loginid='".$loginid."' AND password='".$password."'";
				echo $anumber;?>
				<br>
				Balance Before Transfer:<?php
				echo $netbalance; ?>
				<br>Balance After Transfer:<?php
				echo $nb1;
				
				?>
				<a href="userhome.php">Click here to go to HomePage</a>
				</p>
				</center>
				</body>
				</html>
				<?php
				//header("Location: addservice.php");
				
			} else {
				 echo "Errorrr1: " . $sql . "<br>" . mysqli_error($conn);
			}
	 }
	 
	 
   
   
 ?>
	 