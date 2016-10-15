<html>
<head></head>

<title>Login</title>

<link rel = "stylesheet" href="style_Login.css" text = "text\css">

<body class="main">
	<!-- Kameng icon -->
	<div id = "header">
		<a href="q.html"><img id = "logo" src = "./images/kicon.jpg" ></img></a>
		<p id = "caption">IIT Guwahati</p>
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
		<h1 style = "text-align: center; font-size:50px; color:#800080;" ><i>LOGIN (For E printer)</i></h1>
		<h3>IMPORTANT : Use your IITG Roll No. as Username To Register/Login</h3>
		<form method = "POST" autocomplete="off" >
		<p class = "boxcontent">Username: <input class = "inputbox" type="text" name = "username" placeholder = "Your Roll No." required></p>
		
		<p class = "boxcontent">Password: &nbsp;<input class = "inputbox" type="password" name = "password" placeholder = "Your Password" required></p>
		<p><input class = "inputbox" style="margin-left: 20%;"type = "submit" name = "Login" >
		&nbsp;&nbsp;
		<a style = "text-decoration: none; font-size: 20px;"href= "forgot.php">Forgot Password</a>
		<br><br>
		<span style = "font-size: 20px;">New User? </span><a style = "text-decoration: none; font-size: 20px;"href= "register.php"> Click Here To Create Account</a>
		</p>
		
		
		
		
		
	</div>
	
	<div class = "footer">
		<p id="cpy">© KAMENG HOSTEL, 2016
		<span id="crt">Created By:<a href = "https://www.facebook.com/ssinghal1968">SHUBHAM SINGHAL</a></span><p>
	</div>
	
	</body>
</html>

<?php
error_reporting(0);

if($_POST['Login'])
{
	$Username = $_POST['username'];
	$Password = $_POST['password'];
		
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "test";
	 
	$conn = new mysqli($server , $username , $password , $database);
	 
	if($conn != TRUE)
		die("ERROR: No connection to database. Contact Tech Secy");
	
	$query = "select Password from details where RollNumber = ".$Username;
	$res = $conn->query($query);
	if($res->num_rows == 1)
	{
		$temp = $res->fetch_array(MYSQLI_ASSOC);
		if($temp['Password'] == sha1($_POST['password']))
		{
			session_start();
			$_SESSION['Roll'] = $Username;
			echo $_SESSION['Roll'];
			header('Location:portal.php');
		}
		else
		{
			echo "<script type='text/javascript'>window.alert(\"WRONG PASSWORD\")</script>";
		}
	}
	else if($res->num_rows == 0)
	{
		echo "Username Does not exists";
	}
	

}
?>
