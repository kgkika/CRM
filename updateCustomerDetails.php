<html>
   <head>
      <title>Welcome to CRM</title>      
   </head>
   <body>
    <h1>Customer Details</h1>
    <form method="post">
    <?php
        $con = mysqli_connect("localhost","root","root","crm");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if (isset($_POST["rowId"]) && !empty($_POST["rowId"])) {
            $custId = $_POST["rowId"];
            $sql = mysqli_query($con, "select * from customer where id = $custId"); 

            while($row = mysqli_fetch_array($sql)) {

                echo "<h2>" . $row['first_name'] . " " . $row['last_name'] . "</h2>";
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $city = $row['city'];
                $street = $row['street'];
                $country = $row['country'];
                $zipcode = $row['zipcode'];
                $phone1 = $row['phone1'];
                $phone2 = $row['phone2'];

                echo "<input type=\"text\" name=\"firstName\" value=\"$firstname\"/><br>";
                echo "<input type=\"text\" name=\"lastName\" value=\"$lastname\"/><br>";
                echo "<input type=\"text\" name=\"city\" value=\"$city\"/><br>";
                echo "<input type=\"text\" name=\"street\" value=\"$street\"/><br>";
                echo "<input type=\"text\" name=\"country\" value=\"$country\"/><br>";
                echo "<input type=\"text\" name=\"zipcode\" value=\"$zipcode\"/><br>";
                echo "<input type=\"text\" name=\"phone1\" value=\"$phone1\"/><br>";
                echo "<input type=\"text\" name=\"phone2\" value=\"$phone2\"/><br>";
                echo "<input type=\"hidden\" name=\"custId\" value=\"$custId\"/><br>";
            }
        }
      
        if (isset($_POST['update'])) {

            $firstName = mysqli_real_escape_string($con, $_REQUEST['firstName']);
            $lastName = mysqli_real_escape_string($con, $_REQUEST['lastName']);
            $city = mysqli_real_escape_string($con, $_REQUEST['city']);
            $country = mysqli_real_escape_string($con, $_REQUEST['country']);
            $street = mysqli_real_escape_string($con, $_REQUEST['street']);
            $zipcode = mysqli_real_escape_string($con, $_REQUEST['zipcode']);
            $phone1 = mysqli_real_escape_string($con, $_REQUEST['phone1']);
            $phone2 = mysqli_real_escape_string($con, $_REQUEST['phone2']);
            $custId = mysqli_real_escape_string($con, $_REQUEST['custId']);
            
            $updateSql = "UPDATE customer SET first_name = '$firstName', last_name = '$lastName', city = '$city', street = '$street',
                          country = '$country', zipcode = '$zipcode', phone1 = '$phone1', phone2 = '$phone2' WHERE id = '$custId'";
            
            if (mysqli_query($con, $updateSql)) {
                header('location: index.php');
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }
        }
        
    mysqli_close($con);

    ?>
    <input type="Submit" name="update" value="Update"/>
    </form>
    </body>
<html>