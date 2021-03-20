<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style>
#f2{
			margin-top:30px;
			background-color:white;
			color: #79d2a6;
			width:320px;
			box-sizing:border-box;
			border:2px solid  #40bf80;
			border-radius:9px;
			}
			input,textarea{
				padding:10px;
				font-size:20px;
			}
	</style>
<?php
include("header.php");
?>
<div class="row" style="margin-top=90px">
			   <div class="col-sm-12" id="sigin" align="center">
				<form id="f2" method="post" action="" align="center">
					<div align="center"><br><img src="contactimage.png" height="90px" width="100px"><h1>Contact us</h1></div><br>
					<input type="text" name="Username" placeholder="Enter Username or Email"><br><br>
					<textarea rows="4" cols="20" placeholder="Enter your problem"></textarea><br><br>
					<input type="submit" value="Submit" name="submit" ><br><br>
					<p style="color:red;">Reach us at 9652445555 or maill us at contact@findmydoctor.com</p>
				</form>
				</div>
			</div>
	</body>
	</html>
        