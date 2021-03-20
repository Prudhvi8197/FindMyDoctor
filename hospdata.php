<?php
	session_start();
 include("dbconnect.php");
 if(isset($_POST['submit'])) {
	 
 $hname=$_POST['hospitalname'];
 $dname=$_POST['doctorname'];
 $specialization=$_POST['specialization'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $time=$_POST['time'];
 $available=$_POST['available'];
 $sql ="INSERT INTO fmd_hospitaldata(hospitalname, doctorname, specialization, address, city,time,available) 
		VALUES ('$hname','$dname','$specialization','$address','$city','$time','$available')";
	  if($conn->query($sql)===TRUE) {
		  echo "data entered successfully";
	  }
	  else
	  {
		  echo "Error:" . $sql . "<br>" . $conn->error;
	  }
 }
	  
 ?>
 
 
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
<!--<style>
	.sidebar
  {
	      background-color: black;
    height: 620px;
	  
  }-->
  <style>
  .navbar {
    margin-bottom: 0px !important;

  }

</style>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="hospdashboard.php">Welcome <?php echo $_SESSION["hospitalname"]; ?></a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="hosplogin.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>
<?php
include("sidebar.php");
?>

<!--<div class="container-fluid">
  <div class="row">
	<div class="col-sm-2 sidebar">
	<br>
		<a href= "dashboard.php" class="btn btn-default btn-block">Dashboard</a>
		<a href= "doctordetails.php.php" class="btn btn-default btn-block">Doctor Details</a>
		<a href= "reviews.php" class="btn btn-default btn-block">Patient Reviews</a>
		<a href= "register.php" class="btn btn-default btn-block">Registrations</a>
	</div>-->
	<div class="col-sm-8">	
	 <h2 align="center">Enter Data</h2>
  <form align="center" method="POST">
    <div class="form-group" align="center">
      HospitalName:
      <input type="text" class="form-control"  placeholder="Enter hospitalname" name="hospitalname">
    </div>
	
	<div class="form-group">
      Doctorname:
      <input type="text" class="form-control"  placeholder="Enter doctor" name="doctorname">
    </div>
    <div class="form-group">
	Specialization:
	<br>
      
		<select name="specialization" class="form-control">
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
  <br><br>
	
	<div class="form-group">
      Address:
      <input type="text" class="form-control"  placeholder="Hospital Address" name="address">
    </div>
	<div class="form-group">
      City:
      <input type="text" class="form-control"  placeholder="City" name="city">
    </div>
	<div class="form-group">
      Time:
      <input type="text" class="form-control"  placeholder="Time Available" name="time">
    </div>
	<div class="form-group">
      Available:
		<select name="available" class="form-control">
			<option value="YES">YES</option>
			<option value="NO">NO</option>
		</select>
      
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember">I Agree to all Terms&Conditions</label>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button><br>
  </form>
</div>
</div>

</body>
</html>
