<?php session_start();
	$loginid=$_SESSION['user'];
	$password=$_SESSION['password'];
    $conn = mysqli_connect("localhost","root","","test_database");
	$sql = "SELECT * FROM tbl_login WHERE loginid='".$loginid."' AND password='".$password."'";
    $query= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
	
	if (mysqli_num_rows($query) == 1)
	{
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
        //echo "id: " . $row["loginid"]. " - Name: " . $row["Name"]. " " . $row["password"]. "<br>";
		$welname=$row["Name"];
		$balance=$row["walletbalance"];
		$netbalance1=$row["netbalance"];
		
		
		
		
    }
	
}

?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EASYPAY</title>
<link href="css/userhome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/pure-min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>




<body style="margin:0;">
<div id="container">
<div id="header">
   <center><img src="logo.png" alt="logo" style="width:200px;height:70px; "></center>
</div>

<div id="content">

<div id="cont_head">
<center><h2>Welcome Mr.<?php  echo  $welname; ?></h2></center>
<a href="logout.php"  class="btn btn-primary" style="margin-left:93%;">Logout</a>
<a href="changepassword.html"  class="btn btn-primary" style="margin-left:83%;margin-top:-2.2%;"  >Change Password</a>
<p class="wallet">Wallet Balance:<?php echo 'INR   '; echo $netbalance1;  ?><p>
</div>
<center>
<a href="addservice.php" class="btn btn-primary">Add/Remove bill</a><br/><br/>
<a href="viewbill.html" class="btn btn-primary">View Bill Details</a><br/><br/>
<a href="instapay.html" class="btn btn-primary">Insta-Pay</a><br/><br/>
<a href="#" class="btn btn-primary" data-placement="right" data-toggle="popover" data-title="Select Mode" data-container="body" type="button" data-html="true"  id="login">Add Cash to Wallet</a><br/><br/>

</div></center>
<div id="popover-content" class="hide">
      <form class="form-inline" role="form">
        <div class="form-group">
          <input type="radio" name="male" id="male" onclick="window.open('personal.html','_self')"/>Pay to EASYPAY Representative <br />
<input type="radio" name="female" id="female" onclick="window.open('bank_details.html','_self')"/>Online Payment <br>
         
        </div>
      </form>
    </div>
</div>

<script>
$("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          return $('#popover-content').html();
        }
});
</script>
</body>
</html>