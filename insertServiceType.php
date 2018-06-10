<?php

$con = mysqli_connect("localhost", "root", "root", "crm");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$serviceTypeName = mysqli_real_escape_string($con, $_REQUEST['serviceTypeName']);
$serviceTypeDescription = mysqli_real_escape_string($con, $_REQUEST['serviceTypeDescription']);
 
// attempt insert query execution
$sql = "INSERT INTO service_type (name, description) VALUES ('$serviceTypeName', '$serviceTypeDescription')";


if (isset($_POST["serviceTypeName"]) && !empty($_POST["serviceTypeName"]) && isset($_POST["serviceTypeDescription"]) && !empty($_POST["serviceTypeDescription"]) ){
    if(mysqli_query($con, $sql)){
        header('location: serviceType.php');
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
} 

mysqli_close($con);
?>