<html>
<head></head>

<title> HOSTEL BOARDERS </title>

<link rel = "stylesheet" href="style_hostellers.css" text = "text\css">

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
	<div id = "heading">
		<p>HOSTEL BOARDERS</p>
	</div>
	<br>
	<div class = "find">
	<form method="get" autocomplete="off">
	Search:<input class="findbox" type = "text" name = "str" placeholder="Enter here">
	<input class="findbox" type = "submit" value = "Find" name = "go">	
	</form>
	</div>
		
<?php


if(isset($_GET['go']))
{
	$var = $_GET['str'];
	if($var)
	{
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "test";
	 
		$conn = new mysqli($server , $username , $password , $database);
	 
		if($conn != TRUE)
			die("No connection to database");
		
		if(is_numeric($var))
		{
			$query = "Select * from hostellers where RollNumber like '%".$var."%' OR Room like '%".$var."%' OR Year like '%".$var."%'";
		}
		else
		{
			$query = "Select * from hostellers where Name Like '%".$var."%'";
		}
		$res = $conn->query($query);
		$row_cnt = $res->num_rows;
		if($row_cnt > 0)
		{
			
			echo "<div>
			<h1 Style = \"text-align: center;\">SEARCH RESULTS</h1>
			<table class = \"tabl\">
				<tr>
					<th width = \"15%\"> Serial No. </th>
					<th width = \"25%\"> Roll Number</th>
					<th width = \"35%\"> Name </th>
					<th width = \"25%\"> Room Number </th>
				</tr>";
			while($row_cnt--)
			{
				$row = $res->fetch_array(MYSQLI_ASSOC);
				echo '<tr><td>'.$row['Id'].'</td><td>'.$row['RollNumber'].'</td><td>'.$row['Name'].'</td><td>'.$row['Room'].'</td></tr>';
			}
			echo '</table><br>';
		}
		else
			echo "<h1 Style = \"text-align: center;\">NO RESULTS FOUND!!</h1>";
	}
}
?>
	
	<div>
		<h1 style="text-align: center">ALL BOARDERS</h1>
		<table class = "tabl">
			<tr>
				<th width = "10%"> Serial No. </th>
				<th width = "20%"> Roll Number</th>
				<th width = "30%"> Name </th>
				<th width = "20%"> Room Number </th>
			</tr>
<?php
    $server = "localhost";
	$username = "root";
	$password = "";
	$database = "test";
	 
	$conn = new mysqli($server , $username , $password , $database);
	 
	if($conn != TRUE)
	    die("No connection to database");
	
	$query = "SELECT * FROM hostellers";
	
	$res = $conn->query($query);
	
	//echo $res->num_rows;
	
	if($res == TRUE)
	{
		foreach($res as $row)
		{
			echo '<tr><td>'.$row['Id'].'</td><td>'.$row['RollNumber'].'</td> <td>'.$row['Name'].'</td> <td>'.$row['Room'].'</td> </tr>';
		}
	} 
	$conn->close();
?>
	
		
		</table>	
	</div>

	
	<div class = "footer">
		<p id="cpy">© KAMENG HOSTEL, 2016
		<span id="crt">Created By:<a href = "https://www.facebook.com/ssinghal1968">SHUBHAM SINGHAL</a></span><p>
	</div>
	
	</body>

</html>

