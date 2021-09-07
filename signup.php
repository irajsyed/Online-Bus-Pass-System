<?php
$First_name = $_POST["firstname"];
$Last_name = $_POST["lastname"];
$Password = $_POST["password"];
$Email = $_POST["email"];
$Address = $_POST["address"];
$City = $_POST["city"];
$Phone_number = $_POST["phonenumber"];


if (isset($_POST['Submit'])) {
 	
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
     $SELECT = "SELECT Email From customer Where Email = ? Limit 1";
     $INSERT = "INSERT Into customer (First_Name, Last_Name, Password, Address, Phone_Number, Email, City) values(?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssi", $First_name, $Last_name, $Password, $Address, $Phone_number, $Email, $City);
      $stmt->execute();
      ;header('location: student.html');
     }
     else {
      echo "***********************Someone already register using this Email**********************";
     }
     $stmt->close();
     $conn->close();
    }
} 

else {
 echo "All field are required";
 die();
}
?>