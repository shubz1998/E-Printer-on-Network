<html>
<head></head>

<title>Register </title>

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
			<a href="Hmc.html">HMC</a>
		</li>
		<li>
			<a href="hostellers.php">Hostellers</a>
		</li>
		<li>
			<a href="Login.php">Login</a>
		</li>
		<li>
			<a href="http://intranet.iitg.ernet.in/hostels/kameng/index.html">Complaints</a>
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
	
	<div class = "box";>
		<h1 style = "text-align: center; font-size:40px; color:#800080;" ><i>New Account</i></h1>
		<h4>IMPORTANT : Use your IITG Roll No. as Username To Register</h4>
		<form method = "post">
		<p class = "boxcontent">Username: <input type = "text" name = "username" required></p>
		<p class = "boxcontent">Create Password: <input type = "password" name = "password" required></p>
		<p class = "boxcontent">Confirm Password: <input type = "password" name = "cpassword" required></p> 
		<p><input class = "inputbox" style="margin-left: 30%;" type="submit" name = "register" value = "Register"></p>
	</div>
	
	<div class = "footer">
		<p id="cpy">© KAMENG HOSTEL, 2016
		<span id="crt">Created By:<a href = "https://www.facebook.com/ssinghal1968">SHUBHAM SINGHAL</a></span><p>
	</div>
	
	

</body>
</html>
<?php

if(isset($_POST['register']))
{
	if($_POST['password'] != $_POST['cpassword'])
	{
		echo "Passwords do not match<br>";
	}
	else
	{
		$Username = $_POST['username'];
		$Password = $_POST['password'];
		
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "test";
	 
		$conn = new mysqli($server , $username , $password , $database);
	 
		if($conn != TRUE)
			die("No connection to database");
		
		$query = "select * from hostellers where RollNumber = '".$Username."'";
		$res = $conn->query($query);
		
		if($res == true)
		{
			$subquery = "select Name from hostellers where hostellers.RollNumber = $Username";
			$res3 = $conn->query($subquery);
			if($res3->num_rows == 1)
			{
				$fres = $res3->fetch_array(MYSQLI_ASSOC);
				$newvar = $fres['Name'];
			}
			else
			{
				die("<p style = \"font-size:20px; margin-left:40px;\">You are not a KAMENGIITE!!.<a href = \"register.php\">Try Again </a></p>");
			}
			$query2 = "INSERT into details(RollNumber , Name , Password) values ($Username , '$newvar' , sha1(\"$Password\"))";
			$query2;
			$res2 = $conn->query($query2);

			if($res2 == true)
				echo "<p style = \"font-size:20px; margin-left:40px;\">WELCOME ".$fres['Name'].".Your Account has been created.<a href = 'Login.php'>Go to Login Page</a><br>";
			else 
				echo "<p style = \"font-size:20px; margin-left:40px;\">Account can not be created. This Roll Number already exist.<a href = \"register.php\">Try Again </a></p>";
		}
		else
			echo "Error";
	}
}
?>




