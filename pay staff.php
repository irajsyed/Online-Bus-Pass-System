<?php
$C_ID = $_POST["option"];
$C_Holder = $_POST["name"];
$option = $_POST["no"];
$cvc = $_POST["cvc"];



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
     
     $INSERT = "INSERT Into pay (C_ID,C_HOLDER,OPT,CVC) values('$C_ID','$C_Holder','$option','$cvc')";
     //Prepare statement
    
     $conn->query($INSERT);
     header('location: staffpass info.html'); //mahnoor wali file ka header yahan aega
} }

else {
 echo "All field are required";
 die();
}
?>