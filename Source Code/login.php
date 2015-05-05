
<?php     session_start();  
   // Connect to the database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test_database";
   $conn = mysqli_connect($servername, $username, $password,$dbname);
   

   // Check if the user has submitted their details.
   if ($_SERVER['REQUEST_METHOD'] == 'POST') 
   {
       $user = htmlspecialchars(($_POST['user']));
       $password = htmlspecialchars(($_POST['password']));
	   
	   
	   
		
	//$sql="SELECT * FROM tbl_name WHERE loginid='".$user."' and password='".$password."'";
	$sql="SELECT * FROM tbl_login WHERE loginid='".$user."' and password='".$password."'";
	$result = mysqli_query($conn, $sql)  or die(mysqli_error($conn));

    // Mysql_num_row is counting table row

    //if (!$result) {
    //  echo "Failed";
	//echo $sql;
    //}
    // If result matched $myusername and $mypassword, table row must be 1 row
	
	  $count=mysqli_num_rows($result);
         if($count==1)
		 {
             
             // Register $myusername, $mypassword and redirect to file "login_success.php"
			 $_SESSION['user']=$user;
			 $_SESSION['password']=$password;
			 
			 
             //session_register("user");
             //session_register("password"); 
             //echo "Success";
			  header("Location: userhome.php");
         }
         else 
		 //{
          //echo "Wrong Username or Password";
         //}
		 //{
         //echo '<script type="text/javascript">';
             //echo 'window.alert("Wrong Username Or Password")';
             //echo '</script>';
			 
         //}
		 {
			 ?>
		 <!DOCTYPE html>
<html>
<body>

<p>"Wrong UserName or Password"</p>

<a href="index.html">Login Again</a>





</body>
		 </html>
		 <?php 
		 }
		 
		 
		 

   }
?>