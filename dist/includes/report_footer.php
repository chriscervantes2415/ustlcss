<div style="clear:both;"><br></div>  
<span>Prepared by:</span><br><br>
<?php 
			include('../dist/includes/dbcon.php');
			$id=$_SESSION['id'];
			$query=mysqli_query($con,"select * from signatories natural join member natural join designation where seq='1' and set_by='$id'")or die(mysqli_error($con));
				 $row=mysqli_fetch_array($query);
				 echo "<span>$row[member_first] $row[member_last]</span><br>";
				 echo "<span>$row[designation_name]</span>";
?>
