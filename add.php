<?php
	if(isset($_POST['submit']))
	{
		require_once('connectdatabase.php');
		$Name = $_POST['name'];
		$RollNumber = $_POST['roll'];
		$Complaint = $_POST['complaint'];
		$Area = $_POST['room'];
		$quer = "select RollNumber from hostellers where RollNumber = $RollNumber";
		$res = $conn->query($quer);
		$resrow = $res->num_rows;
		if($resrow == 1)
		{
			$query = "Insert into ComplaintsTable Values ('$Name' , $RollNumber , '$Complaint' , '$Area');";
			if($conn->query($query))
			{
				echo "<script type = 'text/javascript'>window.alert(\"Complaint registered. Thank You!\");</script>";
				Header('Location:Complaints.php');
			}
		}
		else
		{
			echo "Not a kamengiite!";
		}
	}
?>
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
	<p class = "heading"><strong><i>REGISTER YOUR COMPLAINTS!</i></strong></p>
	<div>
		<form action="add.php" method="POST">
			<p class="input3">Name: <input class="input2" type="text" name="name" placeholder="Name" size="30" required></p>
			<p class="input3">Roll No.: <input class="input2" type="text" name="roll" placeholder="Roll No" size="30" required></p>
			<p class="input3" style="float:left;">Complaint :</p> 
			<textarea class="input2" name="complaint" placeholder="Enter complaints here" rows="5" cols="25" required></textarea>
			<p class="input3">Room No./Lobby No./Area :<input class="input2" type="text" name="room" placeholder="Room/Lobby/Area" size="30"</p>
			<br><br>
			<input class="input2" type="submit" name="submit" Value="Submit">
		</form>
	</div>
	
	<div class = "footer">
		<p id="cpy">© KAMENG HOSTEL, 2016
		<span id="crt">Created By:<a href = "https://www.facebook.com/ssinghal1968">SHUBHAM SINGHAL</a></span><p>
	</div>
	
</body>
</html>