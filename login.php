<?php
// echo "THis is test";

$email=$_POST['email'];
$password=$_POST['password'];


//connection here
$con = new mysqli("localhost","root","","drugs");
if($con->connect_error)
{
    die("Failed to connect : ".$con->connect_error);
}
else{
    $stmt=$con->prepare("select * from district where Email = ?");
     $stmt2=$con->prepare("select * from hospitals where Email = ?");

    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    $stmt2->bind_param("s",$email);
    $stmt2->execute();
    $stmt2_result = $stmt2->get_result();
 
    $row = $stmt_result->fetch_assoc();
    $row2 = $stmt2_result->fetch_assoc();
   



    //HOSPITAL
    if($email===$row2['Email'] )
    {
    if($stmt2_result->num_rows>0)
    {
        $data = $row2;
    if($data['Password']===($password)){
        echo "<h2>Login Sucessfully</h2>";
        $URL="http://localhost/phplogin/ooat.html";    
        header ("Location: $URL"); 
        exit();
    }
    else{
        echo "<h2>Invalid Email or Password 1 </h2>";
    }}
    else{
        echo "<h2>Invalid Email or Password</h2>";
    }
    }



    //DISTRICT 
 else if($email===$row['Email'])
    {
        if($stmt_result->num_rows>0)
    {
        $data = $stmt_result->fetch_assoc();
        
    if($data['Password']===($password)){
        echo "<h2>Login Sucessfully</h2>";
        $URL="http://localhost/phplogin/admin.html";    
        header ("Location: $URL"); 
        exit();
    }
    else{
        echo "<h2>Invalid Email or Password 1 </h2>";
    }}
    else{
        echo "<h2>Invalid Email or Password</h2>";
    }
    }

    else{
        $URL="http://localhost/phplogin/login.html";    
        header ("Location: $URL"); 
        exit();
    }



    
}
?>



