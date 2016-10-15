<html>
<head></head>

<title>Complaints</title>

<link rel = "stylesheet" href="style_Login.css" text = "text\css">

<body class="main">
	<!-- Kameng icon -->
	<div id = "header">
		<a href="Home.html"><img id = "logo" src = "./images/kicon.jpg" ></img></a>
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
	<p class = "heading"><strong><i>COMPLAINTS FORUM!</i></strong></p>
	<p class = "heading2"><a href = "add.php">Click to register a complaint</a></p>
	
	<div>
		<h1 style="text-align: center">ALL COMPLAINTS</h1>
		<table class = "tabl">
			<tr>
				<th width = "10%"> Name </th>
				<th width = "20%"> Roll Number</th>
				<th width = "30%"> Complaint </th>
				<th width = "20%"> Area </th>
			</tr>
<?php
	require_once('connectdatabase.php');
	$query = "SELECT * from complaintstable";
	$res = $conn->query($query);
	foreach($res as $row)
	{
		echo '<tr><td>'.$row['Name'].'</td><td>'.$row['RollNumber'].'</td> <td>'.$row['Complaint'].'</td> <td>'.$row['Area'].'</td> </tr>';
	}
?>
		</table>
	<div class = "footer">
		<p id="cpy">© KAMENG HOSTEL, 2016
		<span id="crt">Created By:<a href = "https://www.facebook.com/ssinghal1968">SHUBHAM SINGHAL</a></span><p>
	</div>
	
</body>
</html>