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
	//$sql = "SELECT * FROM tbl_login WHERE loginid='".$_SESSION['user']."' AND password ='".$_SESSION['password']."'";
	
	   
	   $sql1 = "SELECT * FROM tbl_login WHERE loginid='".$_SESSION['user']."' AND password ='".$_SESSION['password']."'";
    $query= mysqli_query($conn,$sql1) or die(mysqli_error($conn)) ;
if (mysqli_num_rows($query) == 1)
	 {
while($row=mysqli_fetch_array($query))
{
	
	$brent = $row['rent'];
	
	if($brent>0)
				{
	$bano = $row['ano'];
	$baname = $row['accountname'];
?>
    <html>
	<body>
	<center>
	 <b> Welcome Mr.</b> <?php  echo  $_SESSION['user']; ?>
	              
    <table border="1"><br>
    <tr>
        <th>Owner's Account No</th>
        <th>Owner's Name</th>
        <th>Billamount</th>
    
    </tr>

    <tr>
    <?php 
    //this is to display your data
	 
    
		
    {
    ?> 
	
        <td><?php  echo $bano?></td>
        <td><?php  echo $baname?></td>
        <td><?php  echo $brent?></td>
        
        <br>
    
    </tr>
	<?php
    }
    ?>
    </table><br> <br>
	<a href="bankrentpayment.php"><button>Confirm</button></a>
	<a href="userhome.php"><button>Cancel</button></a>
	
	</center>
	</body>
	</html>
	
<?php
				}
				else{
					echo '<script type="text/javascript">';
             echo 'alert("Why do U Worry if U have Already Paid Rent..?? Relax")';
             echo '</script>';
			 ?>
			 <html>
			 <head>
			 <title>EASYPAY</title>
			 <body>
			 <center>
			 <p>
			 <a href="userhome.php">Go to HomePage</a>
			 </p>
			 </center>
			 </body>
			 </html><?php
				}
}
	 }
?>