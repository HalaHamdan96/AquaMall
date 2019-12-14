<?php 

//include("config.php");

//open connection
$connect = mysqli_connect("localhost","root","","aquamall");

 		//check the connectionl
if(!$connect)
	{ 
		die("cannot connect to server");
	}

 ?>