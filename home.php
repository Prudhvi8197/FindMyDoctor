<?php
 include("dbconnect.php");
				

?>
		      
		




<!DOCTYPE html>
<html lang="en">
<head>
  <title>FindMyDoctor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.navbar {
	margin-bottom:0px !important;
	
}
	</style>
<body style="background-color: #008080;
    color: black;
    font-family: cursive;">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">FindMyDoctor</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="hosplogin.php"><span class="glyphicon glyphicon-log-in"></span> Hospital_Login</a></li>
      <li><a href="contact.php"><span class="glyphicon glyphicon-user"></span>ContactUs</a></li>
    </ul>
  </div>
</nav>
<div class="jumbotron text-center" style="background-color:white;">
	<img src="symbol.jpg" width="140px" height="150px" align="left">
	<img src="title.png"  width="180px" height="140px" align="right">
  <h1>Find My Doctor</h1>
  <p>Book an Appointment Easily </p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-5">
	<form method="POST">
      <select name="specialization" class="form-control">
    <option value="">Select Specialization</option>
    <option value="Orthopaedics">Orthopaedics</option>
    <option value="Cardiology">Cardiology</option>
    <option value="Kidney Specialist">Kidney Specialist</option>
    <option value="Pediatrician">Pediatrician</option>
    <option value="Anesthesiology">Anesthesiology</option>
    <option value="Dermatology">Dermatology</option>
    <option value="Neurology">Neurology</option>
    <option value="General Surgeon">General Surgeon</option>
	<option value="Eye Specialist">Eye Specialist</option>

  </select>
    </div>
    <div class="col-sm-4">
      <select name="city" class="form-control">
	   <option value="">Select Location</option>
    <option value="Vijayawada">Vijayawada</option>
    <option value="Guntur">Guntur</option>
    <option value="Tenali">Tenali</option>
    <option value="Gudivada">Gudivada</option>
    </select>
    </div>
	<div class="col-sm-3">
	 <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</div>
<br>

<div class="well">
<table class="table table-hover">
    <thead>
      <tr>
        <th>Doctorname</th>
        <th>Hospital Name</th>
        <th>Specialization</th>
        <th>Address</th>
        <th>City</th>
        <th>Available</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$sql = '';
		if(isset($_POST['submit']))
		{
			$dept = $_POST['specialization'];
			$cname = $_POST['city'];
			if($dept != '' && $cname != '')
				$sql="SELECT * FROM `fmd_hospitaldata` WHERE  `specialization` = '$dept' and `city` = '$cname' ";
			else
				$sql="SELECT * FROM `fmd_hospitaldata`  ";
		}	
		else
			$sql="SELECT * FROM `fmd_hospitaldata`  ";
		$res = $conn->query($sql);	
		
		while($row = $res->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['doctorname']; ?></td>
        <td><?php echo $row['hospitalname']; ?></td>
        <td><?php echo $row['specialization']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php if($row['available'] == 'YES'){ ?>
			<a href="apply.php?doctorid=<?php echo $row['doctorid']; ?>" class="btn btn-success">Available</a>
		<?php } else{ ?>
			<button class="btn btn-danger">Not Available</button>
		
		<?php } ?></td>
		
      </tr>
	<?php  } ?>
    </tbody>
  </table>














</div>
</div>

</body>
</html>
