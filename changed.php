<?php

$name = $_POST['name'];
$father_name = $_POST['fname'];
$dept = $_POST['dept'];
$roll_no = $_POST['roll_no'];
$year = $_POST['year'];
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
     $INSERT = "INSERT Into information(name,father_name,dept,roll_no,year,amount,date) values($name,$father_name,$dept,$roll_no,$year,$amount,$date)";
     
     $conn->query($INSERT);

     $conn->close();
    }
}

else {
 echo "All field are required";
 die();
}
?>