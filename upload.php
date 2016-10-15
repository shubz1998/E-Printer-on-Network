<?php

	session_start();
	echo "USER: ".$_SESSION['Roll'].'<br>';
	
	function getNumPagesInPDF($file)
	{	
		$cmd = "C:\\xampp\htdocs\uploads\PDFinfo.exe" . ' "' . $file . '"' . ' | findstr /B /C:"Pages:"';
		exec("$cmd", $output);
		foreach($output as $op)
		{
			if(preg_match("/Pages:\s*(\d+)/i", $op, $matches) !== false) {
				return $matches[1];
			}
			else
				return 0;
		}
	}
	function getIP()
{
	$ip;
	if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
	else
		$ip = "UNKNOWN";
	return $ip;
}

	if(isset($_POST['go']))
	{
		$filename = $_FILES['file']['name'];
		$filesize = $_FILES['file']['size'];
		$tempname = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		
		//echo $filename;
		//echo $filesize;
		//echo $tempname;
		//echo $type;
		if($type != "application/pdf")
			echo "File is not in PDF format<br>";
		else
		{
			$location = "C:\\xampp\htdocs\uploads\uploads\\";
			$temp_location = "C:\\xampp\htdocs\printer\\";
			move_uploaded_file($tempname , $temp_location.$filename);
			$path_of_file =  "C:\\xampp\htdocs\printer\\".$filename;
			$pages = getNumPagesInPDF($path_of_file);
			echo "No. of pages in File are :".$pages."<br>";
			
			require_once("connectdatabase.php");
			$user = $_SESSION['Roll'];
			$query = "select credits from details where RollNumber = $user";
			$res = $conn->query($query);
			$resn = $res->num_rows;
			if($resn == 1)
			{
				$res = $res->fetch_array(MYSQLI_ASSOC);
				$credits =  $res['credits'];
			}
			if($credits >= $pages)
			{	
				if(copy($temp_location.$filename ,$location.$filename))
				{
					echo "Print Success.<a href=\"portal.php\">Go Back</a><br>";
					$query2 = "UPDATE details SET Credits= (Credits - $pages) where RollNumber = $user;";
					if($conn->query($query2))
					{
						date_default_timezone_set("Asia/Calcutta"); // IST
						$logfile = date("Ym") . ".csv";
						$file_flag = file_exists(dirname(__FILE__)."\logs\\".$logfile);
						$address = dirname(__FILE__)."\logs\\".$logfile;
						echo "address is $address"; 
						$logfile_handle = fopen(dirname(__FILE__) . "\logs\\".$logfile,"a");
						if ($file_flag == FALSE)
						{
							fputcsv($address, array("Date", "Time", "IP", "User", "File", "Pages"));
						}
						fputcsv($logfile_handle, array(date("d-m-Y"), date("h:i:s"), getIP(), $username, $filename, $pages));
						fclose($logfile_handle);
					
					}
					else
					{
						die("Credits not updated properly<br><a href=\"portal.php\">Go Back</a><br>");
					}
					

				}
				else
				{
					echo "there was some error! :( <a href=\"portal.php\">Go Back</a><br>";
				}
			}
			else
			{
				echo "Credits are less. PLease buy from Tech Secy!";
				echo "<a href=\"portal.php\">Go Back</a>";
			}
			
		}
	}

?>
