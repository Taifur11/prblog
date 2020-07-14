<?php include 'inc/header.php'?>
<?php include 'inc/sidebar.php'?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Select New Theme</h2>
               <div class="block copyblock">
			   
			   
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['theme'];
	$name=$format->validation($name);
	$name=mysqli_real_escape_string($db->link,$name);
	$query="UPDATE tbl_theme
			SET
			name='$name'
			WHERE id='1';";
	$result_update=$db->update($query);
	if($result_update){
		echo "<span style='color:green;'>Theme Updated Successfully!!</span>";
	}
	else {
		echo "<span style='color:red;'>Theme Not Updated!!</span>";
	}
}  ?>
<?php 
$query="SELECT * FROM  tbl_theme WHERE id='1';";
$result=$db->select($query);
while($row=$result->fetch_assoc()){

?>
			
			   
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input <?php if($row['name']=='default'){ echo "checked";} ?> type="radio" name="theme"  value="default" class="medium" />Default
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input <?php if($row['name']=='green'){ echo "checked";} ?> type="radio" name="theme"  value="green" class="medium" />Green
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input <?php if($row['name']=='red'){ echo "checked";} ?> type="radio" name="theme"  value="red" class="medium" />Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
					
<?php  }  ?>
					
                </div>
            </div>
        </div>
		
<?php include 'inc/footer.php'?>