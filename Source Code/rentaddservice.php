
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
       $owneranumber = htmlspecialchars(($_POST['acno']));
       $rent = htmlspecialchars(($_POST['rent']));
       $holdersnme = htmlspecialchars(($_POST['aname']));
       $bankname = htmlspecialchars(($_POST['bank']));
       $branchname = htmlspecialchars(($_POST['branch']));
       $acntnum = htmlspecialchars(($_POST['noa']));
	   $loginid=$_SESSION["user"];
	   $password=$_SESSION["password"];
       
		
	//$sql="SELECT * FROM tbl_name WHERE username='".$_POST['user']."' and password='".$_POST['password']."'";
	$sql="UPDATE tbl_login SET accountno='".$owneranumber."' , rent='".$rent."' ,accountname='".$holdersnme."' , bank='".$bankname."' , branch='".$branchname."' ,ano='".$acntnum."' WHERE loginid='".$loginid."' AND password='".$password."'";;
	//$result = mysqli_query($conn, $sql)  or die(mysqli_error($conn));

    // Mysql_num_row is counting table row

    //if (!$result) {
    //  echo "Failed";
	//echo $sql;
    //}
    // If result matched $myusername and $mypassword, table row must be 1 row
	
	  
			 if (mysqli_query($conn, $sql)) {
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
             //echo 'alert("Account Linked Successfully")';
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
             echo 'alert("Try Again..!!")';
             echo '</script>';
			 
         }
   
?>