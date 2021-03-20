<?php
$x=0;
include("header.php");
session_start();	
$servername = "localhost";
$username="root";
$password="";
$db='project1';
$conn =new mysqli($servername,$username,$password,$db);

if($conn->connect_error) {
	die("connection failed: " .$conn->connect_error);
}
else
	//echo "connected";
if(isset($_POST['submit']))
{
	$uname = $_POST['username'];
	$password = $_POST['password'];
	if($uname!="" && $password!="")
	{
	$sql="SELECT * FROM fmd_registrations WHERE  username = '$uname' and password = '$password' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	 {
		$row= $result->fetch_assoc();
		$_SESSION["HospitalId"]=$row["HospitalId"];
		$_SESSION["hospitalname"]=$row["hospitalname"];
		header ("Location:hospdashboard.php");
					
	 }
				else{
						$x=1;
					//echo"invalid username or password";
				}
	}
	else
	{
		$x=2;
	}
}

?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

 .container{
			margin-top: 30px;
			border:2px solid black;
			box-size: border-box;
			
	}
	input {
		padding:10px;
		font-size:20px;
	}
</style>
</head>
<body>
 <div class="container" style="width:35%; height:70%; background-color:white;" >
  
  <form align="center" method="POST" action="">
    <div class="form-group"><br><br>
		<h2 align="center"  >Login form</h2><br><br>
      Username:
	  <input type="text" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
     Password:
      <input type="password"  placeholder="Enter password" name="password">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit" value="submit">
  </form>
	<?php if($x==1){?>
		<div class="alert alert-success" style="color:white; background-color:black;">Invalid Details</div>
<?php } else if($x==2) { ?>
		<div class="alert alert-danger">Please enter username and password</div>
<?php } ?>
</div>

</body>
</html>
