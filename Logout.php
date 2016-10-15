<?php

if(isset($_POST['logout']))
{
	session_destroy();
	Header('Location:Login.php');
}
?>
