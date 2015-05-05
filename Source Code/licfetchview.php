<?php session_start();
    $conn = mysqli_connect("localhost","root","","test_database");
	
	
    if (!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }

	   //$username = htmlspecialchars(($_SESSION["user"]));
       //$password = htmlspecialchars(($_SESSION["password"]));
	    //$username=$_SESSION['tnebuserid'];
	   //$sql="SELECT * FROM tneb_login WHERE username='".$_SESSION['tnebuserid']."' " or die(mysql_error());
	   //$sql="SELECT * FROM `tneb_login` WHERE `username` = '".$_SESSION['tnebuserid']."'";
    //$sql = "SELECT * FROM tneb_login WHERE billamount = 2222 ";
	$sql = "SELECT * FROM tbl_login WHERE loginid='".$_SESSION['user']."' AND password ='".$_SESSION['password']."'";
	//$sql = "SELECT * FROM tneb_login ";
    $query= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
	
	
	
	

?>

    <html>
	<head>
	<link href="css/fetchview.css" rel="stylesheet" type="text/css" /></head>
	<body><center>
	  Welcome Mr. <?php  echo  $_SESSION['user']; ?>
	              
    <br><table border="1">
    <tr>
    <th>Premium Amount</th>
    <th>Policy Holder</th>
    <th>Policy Number</th>
    <th>Total Insurance</th>
    <th>Duedate</th>
    
    
    
    </tr>

    <tr>
    <?php 
    //this is to display your data
	 
    while($row=mysqli_fetch_array($query))
		
    {
    ?> 
	
        <td><?php  echo $row['premium']?></td>
        <td><?php  echo $row['policyholder']?></td>
        <td><?php  echo $row['policyno']?></td>
        <td><?php  echo $row['totinsurance']?></td>
        <td><?php  echo $row['expiry']?></td>
        
        <br>
		
		
    <?php
    }
    ?>
    </tr>
    </table>
	<br>
	<br>
	<p><a href="viewbill.html">Back</a></p></center>
	</body>
	</html>
	
<?php
mysqli_close($conn);
?>