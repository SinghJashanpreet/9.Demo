<?php if(isset($_GET['name'])): ?>
        Your name is <?php echo $_GET["name"]; ?>
<?php endif; ?>


<?php
	$Name = $_POST['Name'];
	$YOB=$_POST['YOB'];
	$District = $_POST['District'];
	$Depend = $_POST['Depend'];
	//$Patient_id = $_POST['lastName'];
	//$Hospital_id = $_POST['gender'];
	//$Date = $_POST['email'];
	//$R_U = $_POST['number'];
	//$Status = $_POST['number'];
	if($District==='1')
	{
	$Sub_division = $_POST['Sub_division'];
	$Block= $_POST['block1'];
	$Village=$_POST['village'];
	$City = $_POST['city'];
	$Gali = $_POST['Gali'];
	}



	
	// Database connection
	$conn = new mysqli('localhost','root','','drugs');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
	else{
	if($District==='1')
	{
		echo "if";
		$stmt = $conn->prepare("insert into patients(Name,District,Sub_division , City,Gali ,Depend,Village,Block,YOB ) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssi", $Name, $District, $Sub_division, $City, $Gali, $Depend,$Village,$Block,$YOB);
		$execval = $stmt->execute();
		// echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

else{
	echo "else";
	$stmt = $conn->prepare("insert into patients(Name,District,Depend,YOB ) values(?, ?, ?, ?)");
		$stmt->bind_param("sisi", $Name, $District, $Depend,$YOB);
		$execval = $stmt->execute();
		// echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
}
	}
?>