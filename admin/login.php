<?php include '../lib/Session.php';
//Session::init();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
	  $db=new Database();
	  $format=new Format();
?>
<?php 
Session::checkLogin();

 ?>




<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	
	<?php 
	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username=$format->validation($_POST['username']);
			$password=$format->validation(md5($_POST['password']));
			
			$username=mysqli_real_escape_string($db->link,$username);
			$password=mysqli_real_escape_string($db->link,$password);
		
		
		$query="SELECT * FROM tbl_user WHERE username='$username' AND password='$password';";
		$result=$db->select($query);
		
		if($result!=false){
		$result_array=mysqli_fetch_array($result);
		$value=mysqli_num_rows($result);
		if($value>0){
			
			Session::set("login",true);
			Session::set("userName",$result_array['username']);
			Session::set("userID",$result_array['id']);
			Session::set("userRole",$result_array['role']);
			
			header("Location:index.php");
		}else{
			echo "<span style='color:red;'>No Result Found!!</span>";
			
		}
		
		}else{
			echo "<span style='color:red;'>Usename And Password Not Matched</span>";
			
		}
	
	
	
	
	}
	
	?>
	
	
	
	
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forget Password!!!</a>
		</div>
		<div class="button">
			<a href="#">Developed By Taifur Ahmed</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>