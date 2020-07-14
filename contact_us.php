<?php include 'inc/header.php';?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
					
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$firstname= $format->validation($_POST['firstname']);
							$lastname = $format->validation($_POST['lastname']);
							$email=$format->validation($_POST['email']);
							$body=$format->validation($_POST['body']);
							
							$firstname=mysqli_real_escape_string($db->link,$firstname);
							$lastname=mysqli_real_escape_string($db->link,$lastname);
							$email=mysqli_real_escape_string($db->link,$email);
							$body=mysqli_real_escape_string($db->link,$body);
							
								$errorfirstname="";
								$errorlastname="";
								$erroremail="";
								$errorbody="";
					if(empty($firstname)){
					$errorfirstname="First name must not be empty !";
					//}elseif(!filter_var($fname,FILTER_SANITIZE_SPECIAL_CHARS)){
						//$error="Invalid Name !";
					}if(empty($lastname)){
						$errorlastname="Last name must not be empty !";
					}if(empty($email)){
						$erroremail="Email name must not be empty !";
					}if(empty($body)){
						$errorbody="Message field must not be empty !";
					}else{
				     $query = "INSERT INTO tbl_contact(firstname,lastname,email,body)  VALUES('$firstname','$lastname','$email','$body')";
				    $inserted_rows = $db->insert($query);
				    if ($inserted_rows) {
				    	echo "<span style='color:green; float:left;'>Message sent successfully!!!</span><br>";
				    }else {
				     echo "<span style='color:red; float:left;'>Message not sent!</span><br>";
				    }
				 }
							
				}
				?>
		<form action="" method="post">
				<table>
				<tr>
				
					<td>Your First Name:</td>
					<td>
					<?php if(isset($errorfirstname)){
					echo "<span style='color:red; float:left;'>$errorfirstname</span>";
					} ?>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<?php if(isset($errorlastname)){
					echo "<span style='color:red; float:left;'>$errorlastname</span>";
					} ?>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<?php if(isset($erroremail)){
					echo "<span style='color:red; float:left;'>$erroremail</span>";
					} ?>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<?php if(isset($errorbody)){
					echo "<span style='color:red; float:left;'>$errorbody</span>";
					} ?>
					<textarea name="body"></textarea>
					</td>
		</tr> 
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
	
		<?php include 'inc/sidebar.php';?>
		
	    <?php include 'inc/footer.php';?>