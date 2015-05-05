
<?php      
	session_start();
   // Connect to the database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test_database";
   $conn = mysqli_connect($servername, $username, $password,$dbname);
   

   // Check if the user has submitted their details.
   if ($_SERVER['REQUEST_METHOD'] == 'POST') 
   {
       $tel_username = htmlspecialchars(($_POST['username']));
       $tel_password = htmlspecialchars(($_POST['password']));
		
	//$sql="SELECT * FROM tbl_name WHERE username='".$_POST['user']."' and password='".$_POST['password']."'";
	$sql="SELECT * FROM tel_login WHERE username='".$tel_username."' and password='".$tel_password."'";
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
			 while($row = mysqli_fetch_assoc($result)) 
			 {
				 
				$_SESSION['tel_user']=$row["username"];
				$_SESSION['tel_password']=$row["password"];
				$_SESSION['tel_billamount']=$row["telbill"];
				$billamnt=$row["telbill"];
				$_SESSION['tel_duedate']=$row["teldate"];
				$duedte=$row["teldate"];
			 }
			 $loginid=$_SESSION["user"];
			 $password=$_SESSION["password"];
			 $sql2="UPDATE tbl_login SET telbill='".$billamnt."' , teldate='".$duedte."' WHERE loginid='".$loginid."' AND password='".$password."'";
			 if (mysqli_query($conn, $sql2)) {
				//echo "Record updated successfully";
				header("Location: addservice.php");
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
               // session_start();
             // Register $myusername, $mypassword and redirect to file "login_success.php"
			 //$_SESSION['username']=$username;
			 //$_SESSION['password']=$password;
             //session_register("user");
             //session_register("password"); 
             
			 //header("Location: fetch.php");
			 //echo '<script type="text/javascript">';
            // echo 'alert("Account Linked Successfully")';
             //echo '</script>';
			 //echo '<script type="text/javascript">';
              //function popuponclick()
              //{
      
 
                 //alert('Account Linked Successfully');
             // }
 
   
            //echo '</script>';

         }
         else 
		 {
         echo '<script type="text/javascript">';
             echo 'alert("Wrong Username Or Password")';
             echo '</script>';
			 
         }
   }
?>