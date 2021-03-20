<?php
	include("dbconnect.php");
	
	$doctorid=$_GET['doctorid'];			
	$sql="SELECT * FROM `fmd_hospitaldata` WHERE  `doctorid` = '$doctorid' ";
	$res = $conn->query($sql);	
	$row = $res->fetch_assoc();
?>
<?php
 $app=0;
 if(isset($_POST['submit'])) {
	 $docid=$_POST['doctorid'];
 $hospname=$_POST['hospitalname'];
 $fname=$_POST['fullname'];
 $address=$_POST['address'];
 $connumber=$_POST['contactnumber'];
 if($hospname !="" && $fname !="" && $address!="" && $connumber!="")
 {
 $sql ="INSERT INTO `fmd_patientdata`(`doctorid`,`hospitalname`, `fullname`, `address`, `contactnumber`) 
		VALUES ('$docid','$hospname','$fname','$address','$connumber')";
	  if($conn->query($sql)===TRUE) 
	  {
		 //echo "data entered successfully";
			$app=1;
	  
	  }
 
	  else
	  {
		  //echo "Error:" . $sql . "<br>" . $conn->error;
		  $app=2;
	  }
 }
 else {
		$app=3;
 }
 }
	  
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
      <a class="navbar-brand" href="home.php">FindMyDoctor</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="hosplogin.php"><span class="glyphicon glyphicon-log-in"></span> Hospital_Login</a></li>
      <li><a href="contact.php"><span class="glyphicon glyphicon-user"></span>ContactUs</a></li>
    </ul>
  </div>
</nav>

<div class="well">
<table class="table table-hover">
    <thead>
      <tr>
        <th>Doctorname</th>
        <th>Hospital Name</th>
        <th>Specialization</th>
		<th>Timings</th>
        <th>Address</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row['doctorname']; ?></td>
        <td><?php echo $row['hospitalname']; ?></td>
        <td><?php echo $row['specialization']; ?></td>
		<td><?php echo $row['time']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['city']; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="container">
  <h2>Fill the below form to book an appointment</h2>
  <form method="POST">
   <div class="form-group">
      <input type="hidden" class="form-control" value="<?php echo $row['doctorid']; ?>" name="doctorid"></a>
    </div>
	<div class="form-group">
      <label for="hospitalname">Hospital Name</label>
      <input type="hospitalname" class="form-control" value="<?php echo $row['hospitalname']; ?>"  name="hospitalname" readonly>
    </div>
    <div class="form-group">
      <label for="email">Full Name</label>
      <input type="fullname" class="form-control"  placeholder="Enter fullname" name="fullname">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="address" class="form-control" placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
	 <label for="contactnumber">Contact Number</label>
      <input type="number" class="form-control" placeholder="Enter Contact Number" name="contactnumber">
    </div>
    <button type="submit" class="btn btn-default" name="submit">Book Appointment</button>
	<br>
	
  </form>
	<?php if($app==1){?>
		<div class="alert alert-success" style="color:white; background-color:black;">Appointment fixed. You will get your time slot via SMS by hospital management</div>
<?php } else if($app==2) { ?>
		<div class="alert alert-danger">Check Your Details Again</div>
	
	<?php } else if($app==3) { ?>
		<div class="alert alert-danger">Please Fill all the above details</div>
	<?php } ?>
</div>

</body>
</html>

  
  

		