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

    <html><head>
	<link href="css/fetchview.css" rel="stylesheet" type="text/css" /></head>
	<body>
	<center>
	 <b> Welcome Mr.</b> <?php  echo  $_SESSION['user']; ?>
	              
    <table border="1"><br>
    <tr>
        <th>Owner's Easypay Id</th>
        <th>Owner's Account No</th>
        <th>Owner's Name</th>
        <th>Billamount</th>
    
    </tr>

    <tr >
    <?php 
    //this is to display your data
	 
    while($row=mysqli_fetch_array($query))
		
    {
    ?> 
	
        <td><?php  echo $row['accountno']?></td>
        <td><?php  echo $row['ano']?></td>
        <td><?php  echo $row['accountname']?></td>
        <td><?php  echo $row['rent']?></td>
        
        <br>
		
    <?php
    }
    ?>
    </tr>
	
    </table><br>

<p><a href="viewbill.html">Back</a></p>	<br>
	
	
	</center>
	</body>
	</html>
	
<?php
mysqli_close($conn);
?>