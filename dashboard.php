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
		<a href= "dashbord.php" class="btn btn-default btn-block">Dashboard</a>
		<a href= "#" class="btn btn-default btn-block">Doctors</a>
		<a href= "reviews.php" class="btn btn-default btn-block">Patient Reviews</a>
		<a href= "register.php" class="btn btn-default btn-block">Registrations</a>
		
		
		
	</div>
	
  
  
  </div>
  
  
  
  
</div>

</body>
</html>
