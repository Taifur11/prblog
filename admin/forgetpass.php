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
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	
	<?php 
	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$email=$format->validation($_POST['email']);
			$email=mysqli_real_escape_string($db->link,$email);
		
		
		$query="SELECT * FROM tbl_user WHERE email='$email' LIMIT 1;";
		$result=$db->select($query);
		if($result){
			while($value=$result->fetch_assoc()){
				$userid=$value['id'];
				$username=$value['username'];
			}
			echo "Mail with passsword sent to ".$email;
		}
		else{
			echo "<span style='color:red;'>Email Does Not Exists!!</span>";
		}
	}
	
	?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			

			<div>
				<input type="text" placeholder="Email" required="" name="email"/>
			</div>
			<div>
				<input type="submit" value="Recover" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Log In</a>
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>