<?php
session_start();
if(isset($_SESSION["status"]) == "login")
{
	header("Location: dashboard.php");
}
else{
	header("Location: login.php");
}
