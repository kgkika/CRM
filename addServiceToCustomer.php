<html>
   <head>
      <title>Add service</title>      
   </head>
   <body>
       
       <h1>Add service</h1>
    <div id="addServiceDiv">
        
    <form method="post">
   <?php

   $con = mysqli_connect("localhost","root","root","crm");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    session_start();    
    $_SESSION["id"] = $_POST["id"];
    $custId = $_SESSION["id"];

    if (isset($_POST["action"]) && isset($_SESSION["id"])) {
        if ($_POST["action"] == "AddService") {

            $sql = mysqli_query($con, "select * from customer where id = $custId"); 

            while($row = mysqli_fetch_array($sql)) {

                echo "<h4>" . $row['first_name'] . " " . $row['last_name'] . "</h4>";
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $city = $row['city'];
                $street = $row['street'];
                $country = $row['country'];
                $zipcode = $row['zipcode'];
                $phone1 = $row['phone1'];
                $phone2 = $row['phone2'];

                echo "<input type=\"text\" name=\"city\" value=\"$city\" readonly /><br>";
                echo "<input type=\"text\" name=\"street\" value=\"$street\" readonly /><br>";
                echo "<input type=\"text\" name=\"country\" value=\"$country\" readonly /><br>";
                echo "<input type=\"text\" name=\"zipcode\" value=\"$zipcode\" readonly /><br>";
                echo "<input type=\"text\" name=\"phone1\" value=\"$phone1\" readonly /><br>";
                echo "<input type=\"text\" name=\"phone2\" value=\"$phone2\" readonly /><br>";
                echo "<input type=\"hidden\" name=\"custId\" value=\"$custId\" readonly /><br>";
                //echo "value of custId is: " . $custId;
            }
        }
    }


    echo "<h3>Service Details</h3>";
    echo "<div>";
    echo "<label>Service Type: </label>";
    echo "<select name=\"selectServiceType\">";

    $con = mysqli_connect("localhost","root","root","crm");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = mysqli_query($con, "SELECT * FROM service_type");

    while ($row = $sql->fetch_assoc()) {
        echo "<option name=\"serviceTypeId\" value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }

    echo "</select>";

    echo "</div>";
    echo "<div><label>Date of service provided: </label><input type=\"date\" name=\"dateService\"/></div>";
    echo "<div><label>Date of repeat: </label><input type=\"date\" name=\"dateRepeat\"/></div>";
    echo "<div><label>Chemicals used: </label><input type=\"text\" name=\"chemicalsUsed\"/></div>";
    echo "<div><label>Time consumed: </label><input type=\"text\" name=\"timeConsumed\"/></div>";
    echo "<div><label>Cost: </label><input type=\"text\" name=\"cost\"/></div>";
    echo "<div><input type=\"hidden\" name=\"custId\" value=\"$custId\"/></div>";
    echo "<input id=\"addServiceBtn\" type=\"submit\" name=\"addService\" value=\"Add\"/>";
    echo "<button id=\"cancelServiceBtn\" type=\"button\" name=\"cancelService\">Cancel</button>";
        
     //code for add service
    if (isset($_POST["addService"]) && !empty($_POST["addService"])) {

        $dateServiceProvided = mysqli_real_escape_string($con, $_REQUEST['dateService']);
        $repeatDate = mysqli_real_escape_string($con, $_REQUEST['dateRepeat']);
        $chemicals = mysqli_real_escape_string($con, $_REQUEST['chemicalsUsed']);
        $timeConsumed = mysqli_real_escape_string($con, $_REQUEST['timeConsumed']);
        $cost = mysqli_real_escape_string($con, $_REQUEST['cost']);                
        $serviceTypeId = mysqli_real_escape_string($con, $_POST['selectServiceType']);
        $custId = mysqli_real_escape_string($con, $_REQUEST['custId']);
        $datetime = date_create()->format('Y-m-d H:i:s');

        $addServiceSql = "INSERT INTO service (date_of_service_provided, service_type_id, customer_id, cost, dt_created, service_repeat_date, chemicals, time_consumed) VALUES ('$dateServiceProvided', '$serviceTypeId', '$custId', '$cost', '$datetime', '$repeatDate', '$chemicals', '$timeConsumed')";
        
        if (mysqli_query($con, $addServiceSql)) {
            header('location: index.php');
        } else{
            echo "ERROR: Could not able to execute $addServiceSql. " . mysqli_error($con);
        }
    }
        
    ?>
         
        </form>
    </div>    
    </body>
<html>