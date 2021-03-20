<?php
session_start();	
$servername = "localhost";
$username="root";
$password="";
$db='project1';
$conn =new mysqli($servername,$username,$password,$db);

if($conn->connect_error) {
	die("connection failed: " .$conn->connect_error);
}
?>
<?php
if(isset($_POST['update']))
{
	$docid = $_POST['doctorid'];
	$available = $_POST['available'];
	$sql="update fmd_hospitaldata set available='$available' where doctorid='$docid'  ";
	$result = $conn->query($sql);
	//if($result->num_rows > 0)
	
		
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.sidebar
  {
	      background-color: black;
    height: 620px;
	  
  }
  .navbar {
    margin-bottom: 0px !important;
}
</style>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Welcome</a> <?php echo $_SESSION["hospitalname"]; ?>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="hosplogin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid">
  <div class="row">
	<div class="col-sm-2 sidebar">
	<br>
		<a href= "hospdata.php" class="btn btn-default btn-block">Enter Doctor Details</a>
		<a href= "update.php" class="btn btn-default btn-block">Update Info</a>
		<a href= "appointments.php" class="btn btn-default btn-block">Appointment Notifications</a>
		
		
		
	</div>
	<div class="col-sm-8">
		<h1>Update Info</h1>
		<table class="table">
		 <tr>
			<th>DoctorId</th>
		  <th>Doctor Name</th>
		  <th>Specialization</th>
		  <th>Time</th>
		  <th>Available</th>
		  <th>Current Info</th>
		</tr>
		
		<?php 
			$hospitalname = $_SESSION["hospitalname"];
			$sql = "select * from fmd_hospitaldata where hospitalname = '$hospitalname' ";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
			{ ?>
				<tr>
					<td><?php echo $row['doctorid']; ?></td>
					<td><?php echo $row['doctorname']; ?></td>
					<td><?php echo $row['specialization']; ?></td>
					<td><?php echo $row['time']; ?></td>
					<?php if($row['available'] == 'YES'){ ?>
					<td><button class="btn btn-success btn-sm">Available</button></td>
					<?php } else { ?>
					<td><button class="btn btn-danger btn-sm ">Not Available</button></td>
					<?php }  ?>
					
			<?php } ?>
			
				

	
	  
			
		 </table>
	
      
<form method="POST">
      DoctorId:
      <input type="int" class="form-control"  placeholder="Enter doctor id" name="doctorid">
		Available:
		<select name="available" class="form-control">
			<option value="YES">YES</option>
			<option value="NO">NO</option>
		</select>
		<br>
		<input type="submit" name="update" value="Update"></form>
    
	
		</div>	
	
	
  
  
  </div>
  
  
  
  
</div>

</body>
</html>
