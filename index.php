<html>
   <head>
        <title>Welcome to CRM</title>       
   </head>    
   <body>
    <h1>CRM - Customer Resource Management</h1>
	<table>
        <tr>
            <td><a href="serviceType.php">Services</a></td>
        </tr>
        <tr>
            <td><a href="customer.php">Insert Customer</a></td>
        </tr>
        <tr>
            <td><a href="serviceType.php">Insert Service Type</a></td>
        </tr>
    </table>
    <h2>Customers</h2>
       <form action="updateCustomerDetails.php" method="post">       
       <?php
           $con = mysqli_connect("localhost","root","root","crm");
            
           if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "select * from customer");
            
            echo "<table border='3'>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>ZIP code</th>
                    <th>Country</th>
                    <th>Phone (primary)</th>
                    <th>Actions</th>
                </tr>";
           
            
            while ($row = mysqli_fetch_array($result)) {
                $currentID = $row['id'];
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['street'] . "</td>";
                echo "<td>" . $row['zipcode'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>" . $row['phone1'] . "</td>";            
                echo "<td><button type=\"submit\" name=\"rowId\" value=\"$currentID\">Edit</button></td>";
                echo "</tr>";
            }
            echo "</table>";
            
           mysqli_close($con);
        ?>
       </form>
   </body>
</html>