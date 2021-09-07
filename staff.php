<?php

$name = $_POST['name'];
$designation = $_POST['desig'];
$dept = $_POST['dept'];
$id_no = $_POST['id_no'];
$amount = $_POST['Amount'];
$date = $_POST['Date'];



if (isset($_POST['submit'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
     $INSERT = "INSERT Into staff(name,designation,dept,id_no,amount,date) values(?,?,?,?,?,?)";
     //Prepare statement

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss",$name,$designation,$dept,$id_no,$amount,$date);
      $stmt->execute();
      ;header('location: payment staff.html');
      ;echo("*************Your information is stored Successfully**********************");
     }
     $stmt->close();
     $conn->close();
    }


else {
 echo "All field are required";
 die();
}
?>