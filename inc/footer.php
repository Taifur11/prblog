</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
<?php
$query="SELECT * FROM tbl_footer WHERE id=1;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){
?>	

	  <p>&copy; <?php
	  date_default_timezone_set("Asia/Dhaka");
	   echo $row['copyright']." "; echo date('F j, Y, g:i a'); ?> </p>
<?php } } ?>
	</div>
	<div class="fixedicon clear">

<?php 
$query="SELECT * FROM tbl_social WHERE id=1;";
$result=$db->select($query);
if($result){
	while($row=$result->fetch_assoc()){

?>
	
		<a href="<?php echo $row['fb'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['tw'];?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['ln'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['gg'];?>" target="_blank""><img src="images/gl.png" alt="GooglePlus"/></a>
		
<?php } } ?>
		
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>