<?php
$name = $_POST['name'];
$father_name = $_POST['fname'];
$dept = $_POST['dept'];
$roll_no = $_POST['roll_no'];
$year = $_POST['year'];
$amount = $_POST['amount'];
$date = $_POST['date'];


if (isset($_POST['submit'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "login";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
     
     $INSERT = "INSERT Into data(Name,fname,dept,rno,yr,amt,ddate) values(?, ?, ? ,?, ? , ?, ?)";
    
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssiis",$name,$father_name,$dept,$roll_no,$year,$amount,$date);
      $stmt->execute();
      header('location: payment std.html');
     }
     $stmt->close();
     $conn->close();
    }
 

else {
 echo "All field are required";
 die();
}
?>