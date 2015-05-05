<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		 {
						$ename = $_POST["eid"];
						$sql="SELECT * FROM tbl_login WHERE loginid='".$ename."'";
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
								<th>Easypay ID</th>
								<th>Balance</th>
								
								  
								</tr>
								<tr>
    <?php 
    //this is to display your data	 
    	
   
    ?>	
								<td><?php  echo $row['loginid']?></td>
								<td><?php  echo $row['netbalance']?></td>
								   
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
		 else{
			 echo "Hai";
		 }
		 ?>
	
	

					  