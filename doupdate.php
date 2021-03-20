<?php
if(isset($_POST['submit']))
{
	$docid = $_POST['doctorid'];
	$available = $_POST['available'];
	$sql="update fmd_hospitaldata set available='$available' where doctorid='$docid'  ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		echo "Update sucessful";
		//header ("Location:dashboard.php");
					
	}
				else{
					echo"invalid doctorid or password";
				}
		
}
?>
<form method="POST">
      DoctorId:
      <input type="int" class="form-control"  placeholder="Enter doctor id" name="doctorid">
		Available:
		<select name="available" class="form-control">
			<option value="YES">YES</option>
			<option value="NO">NO</option>
		</select>
		<br>
		<input type="submit" name="submit" value="Update"></form>