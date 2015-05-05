<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		 {
						$cardnum = $_POST["cardnum"];
						$sql="SELECT * FROM bank_account WHERE cardnum='".$cardnum."'";
						$query= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
						$count=mysqli_num_rows($query);
						
					if($count==1)
					{
						while($row = mysqli_fetch_assoc($query)) 
						  {
							  
							  ?>
							  
								<html>
								<head>
								<link href="css/fetchview.css" rel="stylesheet" type="text/css" /></head>
								<body><center>
								
								<br><table border="1">
								<tr>
								<th>Bank</th>
								<th>Account Number</th>
								<th>Holder Name</th>
								<th>Card Number</th>
								<th>CVV</th>   
								</tr>
								<tr>
    <?php 
    //this is to display your data	 
    	
   
    ?>	
								<td><?php  echo $row['bank']?></td>
								<td><?php  echo $row['accountno']?></td>
								<td><?php  echo $row['holdername']?></td>
								<td><?php  echo $row['cardnum']?></td>
								<td><?php  echo $row['cvv']?></td>        
								<br>
	<?php
   
    ?>
								</tr>
								</table>
								<br>
								<br>
								<p><a href="bankinfo.html">View Another Account</a></p></center>
								</body>
								</html>
	<?php
						  }
					}
		 }
		 ?>
	
	

					  