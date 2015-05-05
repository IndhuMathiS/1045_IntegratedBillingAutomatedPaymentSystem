<?php session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EASYPAY</title>
<link href="css/addservice.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/pure-min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $("#test").click(function(){
        $("#eb").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#test1").click(function(){
        $("#tele").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#test2").click(function(){
        $("#water").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#test3").click(function(){
        $("#gas").hide();
    });
});
</script>
</head>
<body>

<body style="margin:0;">
<div id="container">
<div id="header">
   <center><img src="logo.png" alt="logo" style="width:200px;height:70px; "></center>
   
</div>
<div id="content">
<a href="userhome.php"  class="btn btn-primary" style="margin-left:87%;">Home</a>
<a href="logout.php"  class="btn btn-primary" style="margin-left:93%;margin-top:-2.2%;">Logout</a>
<?php 
    $loginid=$_SESSION['user'];
	$password=$_SESSION['password'];
	$conn = mysqli_connect("localhost","root","","test_database");
	$sql = "SELECT * FROM tbl_login WHERE loginid='".$loginid."' AND password='".$password."'";
    $query= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
	if (mysqli_num_rows($query) == 1)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$tnebbill=$row["billamount"];
			$tnebdate=$row["duedate"];
			$telbil=$row["telbill"];
			$premiumm=$row["premium"];
			$houserent=$row["accountno"];
			$ano=$row["ano"];
			$pno=$row["policyno"];
			
			
			if(!empty($tnebbill ))
			{
    
?>	        <div id="eb">
			<p><img src="eb.gif" alt="eb bill" style="width:60px;height:60px">Tamil Nadu Electricity Board Bill:<a href="tnebdeleteservice.php"><button type="button" class="btn btn-primary btn-lg"> Delete Service</button></a></p>
			 
			 </div>      
				<?php 
			}
			else
			{
			   
			    ?> <div id="eb">
			<p><img src="eb.gif" alt="eb bill" style="width:60px;height:60px">Tamil Nadu Electricity Board Bill:<a href="#" data-toggle="modal" data-target="#ebLoginModal"><button type="button" class="btn btn-primary btn-lg">
				  ADD</button></a>
				  
				  
				  
				  </p>
			</div>
			<?php
				   
			}
			if(!empty($telbil))
			{
			?> <div id="tele">
               <p><img src="phone.png" alt="phone bill" style="width:60px;height:60px">Telephone Bill:<a href="teldelete.php"><button type="button" class="btn btn-primary btn-lg ">Delete Service</button></a>
			   </p>
      
               </div>
			<?php
			}
			else{
              ?>     <div id="tele">
					<p><img src="phone.png" alt="phone bill" style="width:60px;height:60px">Telephone Bill:<a href="#" data-toggle="modal" data-target="#teleLoginModal"><button type="button" class="btn btn-primary btn-lg ">
					ADD</button></a></p>
					</div>	
			<?php		
				}
			if(!empty($premiumm OR $pno))
            {
			?> <div id="water">
				<p><img src="lic.png" alt="water bill" style="width:60px;height:60px">Insurance Premium:
				<a href="licdelete.php"><button type="button" class="btn btn-primary btn-lg">Delete Service</button></a></p>
                </div>
			<?php
			}
			else{
              ?>  <div id="water">
				<p><img src="lic.png" alt="water bill" style="width:60px;height:60px">Insurance Premium:<a href="#" data-toggle="modal" data-target="#waterLoginModal"><button type="button" class="btn btn-primary btn-lg ">
					  ADD</button></a></p>
				</div>	
			<?php		
				}
			if(!empty($houserent OR $ano))
            {
			?> <div id="gas">
				<p><img src="rent.jpg" alt="gas bill" style="width:60px;height:60px">House Rent:<a href="deleteservice.php"><button type="button" class="btn btn-primary btn-lg ">Delete Service</button></a>
				</p>
                </div>
			<?php
			}
			else{
              ?> <div id="gas">
				<p><img src="rent.jpg" alt="gas bill" style="width:60px;height:60px">House Rent:<a href="#" data-toggle="modal" data-target="#gasLoginModal"><button type="button" class="btn btn-primary btn-lg ">
					  ADD</button></a></p>
				</div>
            <?php		
				}
			?>
			<div class="modal fade" id="ebLoginModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;
                            </span><span class="sr-only">
                                     Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            LOGIN USING TNEB ACCOUNT </h4>
                    </div>
					<form action="tnebaddservice.php" method="POST">
                    <div class="modal-body">
                       <div class="input-group">
            
            <input type="text"  required name="username" class="form-control" placeholder="UserID" />
        </div>
        <p>
        </p>
        <div class="input-group">
            
            <input type="password" required name="password" class="form-control" placeholder="Password" />
        </div>
		
        <p>
        </p>  
    <button type="submit" class="btn-primary" id="test">
            SignIn</button>
            
                    </div></form>
					
                    
                </div>
            </div>
        </div>
		

<div class="modal fade" id="teleLoginModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;
                            </span><span class="sr-only">
                                     Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            LOGIN USING TELEPHONE ACCOUNT </h4>
                    </div>
					<form action="teladdservice.php" method="POST">
                    <div class="modal-body">
                       <div class="input-group">
            
            <input type="text" name="username" class="form-control" placeholder="UserID" />
        </div>
        <p>
        </p>
        <div class="input-group">
            
            <input type="text" name="password" class="form-control" placeholder="Password" />
        </div>
        <p>
        </p>  
    <button type="submit" class="btn-primary" id="test1">
            SignIn</button>

                    </div></form>
                    
                </div>
            </div>
        </div>

<div class="modal fade" id="waterLoginModal" tabindex="-1" 
role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;
                            </span><span class="sr-only">
                                     Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Enter Your Premium & Insurance Details </h4>
                    </div>
					<form action="licaddservice.php" method="POST">
                    <div class="modal-body">
                       <div class="input-group">
            
            <input type="text" name="policyno" class="form-control" placeholder="Policy Number" />
        </div>
        <p>
        </p>
        
    <button type="submit" class="btn-primary" id="test2">
            Link Policy</button>

                    </div></form>
                    
                </div>
            </div>
        </div>

<div class="modal fade" id="gasLoginModal" tabindex="-1" 
role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;
                            </span><span class="sr-only">
                                     Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            ENTER HOUSE OWNER'S ACCOUNT NUMBER </h4>
                    </div>
					<form action="rentaddservice.php" method="POST">
					
                    <div class="modal-body">
                       
					
                       <div class="input-group">
            
            <input type="text" class="form-control" name="acno" placeholder="EasyPayId" /><center>
        </div><div style="margin-left:40%; margin-top:-6%;" class="input-group">
            
            <input type="text" required name="aname" class="form-control" placeholder="Holder's Name" />
        </div><br>
		
		<div style="margin-left:5%; margin-top:1%;" class="pure-control-group">
					                <select name="bank"  >
					    <option value="" disabled selected >Select Bank 
                        </option>
                        
                        <option value="KVB"  >KVB
                        </option>
						<option value="SBI"  >SBI
                        </option>
                    </select>
				</div>
				<div style="margin-left:40%; margin-top:-2%;" class="pure-control-group">
				
	                <select name="branch"  >
					    <option value="" disabled selected >Select Branch 
                        </option>
                        
                        <option value="chennai"  >Chennai
                        </option>
						<option value="namakkal"  >Namakkal
                        </option>
                    </select>
				</div><br>
				
				
				
        
		
		<div class="input-group">
            
            <input type="text" class="form-control" name="rent" placeholder="Rent Amount" />
        </div><br>
		<div style="margin-left:40%; margin-top:-10%;" class="input-group">
            
            <input type="text" required name="noa" class="form-control" placeholder="Account Number" />
        </div><br>
		
    <button type="submit" class="btn-primary" id="test3">
           Link Owner Details</button>

                    </div></form>
                    
                </div>
            </div>
        </div>


		
		
		

		
		
		
		
		
</div>
</div>
</body>
</html>
<?php
					
				
				
		}
	}
	
	 
	
	 

    

?>
 