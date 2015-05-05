<?php
    $conn = mysqli_connect("localhost","root","","tneb");
    if (!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }

	   //$tnebuserid = htmlspecialchars(($_POST["tnebuserid"]));
       //$tnebpassword = htmlspecialchars(($_POST["tnebpassword"]));
	    //$username=$_SESSION['tnebuserid'];
	   //$sql="SELECT * FROM tneb_login WHERE username='".$_SESSION['tnebuserid']."' " or die(mysql_error());
	   //$sql="SELECT * FROM `tneb_login` WHERE `username` = '".$_SESSION['tnebuserid']."'";
    $sql = "SELECT * FROM tneb_login WHERE billamount = 222 ";
    $query= mysqli_query($conn,$sql);
	
	

?>

    <html>
	<head>
	<title>EASYPAY</title>
	<link href="css/fetch.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/pure-min.css">
	</head>
	<body style="margin:0;">
<div id="container">
<div id="header">
   <center><img src="logo.png" alt="logo" style="width:200px;height:70px; "></center>
</div>
<div id="content">
<div id="table">
    <center><table>
    <tr>
    <th>Pending Bill Amount</th>
    <th> &nbsp &nbsp DueDAte</th>
    
    </tr>

    <tr>
    <?php
    //this is to display your data
	
    while($row=mysqli_fetch_array($query))
		
    {
    ?> <center><p id="bold">   Account Linked Successfully </p><br>
	
        <td style="text-align:center;"><?php echo $row['billamount']?></td>
        <td>&nbsp &nbsp <?php echo $row['duedate']?></td>
        <br></center>
    <?php
    }
    ?>
    </tr>
    </table>
	</center>
	
	</table></div>
	<div id="button"><center>
	<a  href="addservice.html"><button type="button" class="btn btn-info btn-lg">Add More Services</button></a>
<a  href="logout.php"><button type="button" class="btn btn-info btn-lg">Login to Easypay</button></a>
	</center></div>
	</div>
	</body>
	</html>
	
<?php
mysqli_close($conn);
?>