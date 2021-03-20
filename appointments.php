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

$hospitalname = $_SESSION["hospitalname"];
$sql = " select pat.*,hos.doctorname from fmd_patientdata as pat inner join fmd_hospitaldata as  hos on pat.doctorid = hos.doctorid where  pat.hospitalname = '$hospitalname' " ;
$result = $conn->query($sql);


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
      <a class="navbar-brand" href="#">Welcome  <?php echo $_SESSION["hospitalname"]; ?></a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="hosplogin.php"> Logout</a></li>
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
	<h3>Appointment Notifications</h3>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Doctor Name</th>
        <th>Patient Name</th>
        <th>Address</th>
        <th>Contact Number</th>
      </tr>
    </thead>
    <tbody>
	
	<?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['doctorname']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['contactnumber']; ?></td>

		</tr>
	<?php } ?> 
    </tbody>
  </table>
	
	
	
	</div>
  
  
  </div>
  
  
  
  
</div>

</body>
</html>
