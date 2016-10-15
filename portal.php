<html>
<head></head>

<title>Login</title>

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
	
	


<?php
	
	session_start();
	$user = $_SESSION['Roll'];
	echo "<h1 style=\"text-align:center;\">Welcome to E-printer portal, $user</h1>";
	
	require_once("connectdatabase.php");
	
	$query = "select credits from details where RollNumber = $user";
	$res = $conn->query($query);
	$resn = $res->num_rows;
	if($resn == 1)
	{
		$res = $res->fetch_array(MYSQLI_ASSOC);
		$credits =  $res['credits'];
	}
	$string = "<h2 style=\"margin-left: 20px;\">Your current credits are $credits.<br> To buy credits contact Tech Secy (Karthikey , B1-327)</h2>";
	echo $string;
	
?>

	<div>
		<form action = "Logout.php" method = "POST">
		<input style="margin-left:90%; font-size: 15px;"type = "submit" name = "logout" value = "Logout">
		</form>
		<form action = "upload.php" method= "POST" enctype = "multipart/form-data">
		<h1 style="margin-left: 20px;">Choose a PDF file: <input type = "file" name = "file"></h1>
		<br>
		<input style="font-size:25px;margin-left: 20px;"type = "submit" value = "Submit" name = "go">
	</div>
	
	
	
	
</body>
</html>	
	