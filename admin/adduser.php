<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
<?php if(Session::get("userRole")!=2){

 echo "<script> window.location='index.php'; </script>";

}
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New USER</h2>
				
				
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$username=mysqli_real_escape_string($db->link,$_POST['username']);

    $email=mysqli_real_escape_string($db->link,$_POST['email']);
	
	$password=mysqli_real_escape_string($db->link,$_POST['password']);
	$password=md5($password);
	
	$role=mysqli_real_escape_string($db->link,$_POST['role']);
    $value="";
    $query1="SELECT * FROM tbl_user WHERE email='$email';";
    $result=$db->select($query1);
    if($result){
        echo "<span style='color:red;'>Email Already Exists!!</span>";
    }
    else{
        if($username=="" || $password=="" || $role=="" || $email==""){
            echo "<span style='color:red;'>Field Must Not Empty!!</span>";
        }

        else{
        $query = "INSERT INTO tbl_user(username,password,role,email) 
        VALUES('$username','$password','$role','$email')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span style='color:green;'>User Created Successfully.
         </span>";
        }else {
         echo "<span style='color:red;'>User Not Created !</span>";
        }
        }
    }

   }

?>
			
                <div class="block">               
                 <form action="adduser.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Username..." class="medium" name="username" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" placeholder="Enter Email..." class="medium" name="email" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Password..." class="medium" name="password" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
								
								<option>Select Role </option>
								<option value="1">Author</option>
								<option value="2">Admin</option>
								<option value="3">Editor</option>                                 
                                </select>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
		
		
		
		<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
		
		
		
		
		
		
		
		
		
<?php include 'inc/footer.php'?>

