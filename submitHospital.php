<?php
	// $H_id = $_POST[''];

	$H_name = $_POST['name'];
	$H_type = $_POST['location'];
	//$R_U = $_POST['number'];
	$H_nodal = $_POST['N_name'];//Nodal name is given as city by Jahsanpreet Singh
	$H_email = $_POST['email'];
	$H_password = $_POST['password'];
	$H_number = $_POST['mobile'];

	// Database connection
	$conn = new mysqli('localhost','root','','drugs');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into hospitals(Hospital_name,Type,Name_nodal , Email,Mobile ,Password ) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssis", $H_name, $H_type, $H_nodal, $H_email, $H_number,$H_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>