<?php
 include("sidebar.php");
 include("dbconnect.php");
 if(isset($_POST['submit'])) {
	 
 $hname=$_POST['hospitalname'];
 $uname=$_POST['username'];
 $password=$_POST['password'];
 $email=$_POST['email'];
 $mobnumber=$_POST['mobilenumber'];
 $sql ="INSERT INTO fmd_registrations(hospitalname, username, password, email, mobilenumber) 
      VALUES ('$hname','$uname','$password','$email','$mobnumber')";
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
      <a class="navbar-brand" href="#">Admin</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
	<div class="col-sm-2 sidebar">
	<br>
		<a href= "dashboard.php" class="btn btn-default btn-block">Dashboard</a>
		<a href= "doctordetails.php.php" class="btn btn-default btn-block">Doctor Details</a>
		<a href= "reviews.php" class="btn btn-default btn-block">Patient Reviews</a>
		<a href= "register.php" class="btn btn-default btn-block">Registrations</a>
	</div>
	<div class="col-sm-8">	
	 <h2 align="center">Registration form</h2>
  <form align="center" method="POST">
    <div class="form-group">
      HospitalName:
      <input type="text" class="form-control"  placeholder="Enter hospitalname" name="hospitalname">
    </div>
	<div class="form-group">
      Username:
      <input type="text" class="form-control"  placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      Password:
      <input type="password" class="form-control"  placeholder="Enter password" name="password">
    </div>
	
	<div class="form-group">
      Email:
      <input type="email" class="form-control"  placeholder="Enter email" name="email">
    </div>
	<div class="form-group">
      Mobile:
      <input type="number" class="form-control"  placeholder="Mobile Number" name="mobilenumber">
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
