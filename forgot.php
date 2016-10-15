<html>
<head></head>

<title>Forget Password</title>

<link rel = "stylesheet" href="style_Login.css" text = "text\css">

<body class="main">
	<!-- Kameng icon -->
	<div id = "header">
		<a href="q.html"><img id = "logo" src = "./images/kicon.jpg" ></img></a>
	</div>

	<div id="hor">
	    <ul id="navigation">
		<li>
			<a href="Home.html">Home</a>
		</li>
		<li>
			<a href="hmc.html">HMC</a>
		</li>
		<li>
			<a href="hostellers.php">Hostellers</a>
		</li>
		<li>
			<a href="Login.php">Login</a>
		</li>
		<li>
			<a href="Complaints.php">Complaints</a>
		</li>
		
	    </ul>
		
		
	</div>
	<div id="hor2">
	    <ul id = "navigation2" >
		<li>Other Useful Links : </li>
				<li> <a href="https://webmail.iitg.ernet.in/">Campus webmail</a> </li>
				<li> <a href="http://intranet.iitg.ernet.in/gethostel/ip/">Hostel ip calculator</a> </li>
				<li> <a href="https://iitg.ernet.in/">Intranet</a> </li>
		
		</ul>
	</div>
	<br>
	
	<div class = "box";>
		<h1 style = "text-align: center; font-size:40px; color:#800080;" ><i>Forget Password</i></h1>
		<form method = "post">
		<p class = "boxcontent">Username:<input type = "text" name = "username" required></p>
		<p class = "boxcontent">Enter new Password: <input type = "password" name = "npassword" required></p>
		<p class = "boxcontent">Confirm new Password: <input type = "password" name = "cnpassword" required></p> 
		<p><input class = "inputbox" style="margin-left: 30%;" type="submit" name = "changepassword" value = "Change Password"></p>
	</div>
	
	
	</body>
</html>
<?php
if(isset($_POST['changepassword']))
{
	if($_POST['cnpassword']!= $_POST['npassword'])
	{
		echo "<h1>Passwords do not match</h1>";
		echo "<script type = 'text/javascript'>window.alert(\"hello\");</script>";
	}
	else
	{
		$Username = $_POST['username'];
		$Newpassword = sha1($_POST['npassword']);
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "test";
	 
		$conn = new mysqli($server , $username , $password , $database);
	 
		if($conn != TRUE)
			die("No connection to database");
		
		$query = "SELECT * from details where RollNumber = $Username";
		$res = $conn->query($query);
		
		$resrow = $res->num_rows;
		if($resrow != 1)
		{
			echo "Username does not have a account or username is incorrect";
		}
		else
		{
			$query2 = "Update details set Password = \"$Newpassword\" where RollNumber = $Username";
			if($conn->query($query2))
			{
				echo "<script type = 'text/javascript'>window.alert(\"Password Changed Succesfully\");</script>";
			}
		}
	}
	
}

?>