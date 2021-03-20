<?php	
$servername = "localhost";
$username="root";
$password="";
$db='project1';
$conn =new mysqli($servername,$username,$password,$db);

if($conn->connect_error) {
	die("connection failed: " .$conn->connect_error);
}
else
	echo "connected";
if(isset($_POST['submit']))
{
	$emailid = $_POST['emailid'];
	$password = $_POST['password'];
	$sql="SELECT * FROM `fmd_admin` WHERE  email = '$emailid' and password = '$password' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		echo "login sucessful";
		header ("Location:dashboard.php");
					
	}
				else{
					echo"invalid username or password";
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
	}
</style>
</head>
<body>
 <div class="container" style="width:50%;">
  <h2 align="center">Login form</h2>
  <form align="center" method="POST" action="">
    <div class="form-group">
      Emailid:
	  <input type="text" placeholder="Enter email" name="emailid">
    </div>
    <div class="form-group">
     Password:
      <input type="password"  placeholder="Enter password" name="password">
    </div>
    
    <input type="submit" name="submit" value="submit">
  </form>
</div>

</body>
</html>
