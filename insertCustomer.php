<?php

$con = mysqli_connect("localhost", "root", "root", "crm");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$firstName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
$city = mysqli_real_escape_string($con, $_REQUEST['city']);
$country = mysqli_real_escape_string($con, $_REQUEST['country']);
$street = mysqli_real_escape_string($con, $_REQUEST['street']);
$zipcode = mysqli_real_escape_string($con, $_REQUEST['zipcode']);
$phone1 = mysqli_real_escape_string($con, $_REQUEST['phone1']);
$datetime = date_create()->format('Y-m-d H:i:s');
 
// attempt insert query execution
$sql = "INSERT INTO customer (first_name, last_name, dt_created, city, country, street, zipcode, phone1) VALUES ('$firstName', '$lastName', '$datetime', '$city', '$country', '$street', '$zipcode', '$phone1')";

// if variables are set and not empty
try {
    if (isset($_POST["firstName"]) && !empty($_POST["firstName"]) && 
        isset($_POST["lastName"]) && !empty($_POST["lastName"]) && 
        isset($_POST["city"]) && !empty($_POST["city"]) && 
        isset($_POST["country"]) && !empty($_POST["country"]) && 
        isset($_POST["street"]) && !empty($_POST["street"]) && 
        isset($_POST["zipcode"]) && !empty($_POST["zipcode"]) &&
        isset($_POST["phone1"]) && !empty($_POST["phone1"])){
        if (mysqli_query($con, $sql)){
            header('location: index.php');
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

mysqli_close($con);
?>