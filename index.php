<html>
   <head>
        <title>Welcome to CRM</title>       
   </head>    
   <body>
    <h1>CRM - Customer Resource Management</h1>
	<table>
        <tr>
            <td><a href="customers.php">Customers</a></td>
        </tr>
        <tr>
            <td><a href="insertCustomerForm.php">Insert Customer</a></td>
        </tr>
        <tr>
            <td><a href="serviceType.php">Insert Service Type</a></td>
        </tr>
    </table>
    <h2>Upcoming services</h2>
       <form action="updateCustomerDetails.php" method="post">       
       <?php
           $con = mysqli_connect("localhost","root","root","crm");
            
           if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "select * from customer c
                                                join service s on s.customer_id = c.id
                                                join service_type st on st.id = s.service_type_id
                                                where s.service_repeat_date <= curdate()+10
                                            order by service_repeat_date asc");
            
            echo "<table border='3'>
                <tr>
                    <th>Repeat date of service</th>
                    <th>Service name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Phone (1)</th>
                    <th>Phone (2)</th>
                </tr>";
           
            
            while ($row = mysqli_fetch_array($result)) {
                $currentID = $row['id'];
                echo "<tr>";
                echo "<td>" . $row['service_repeat_date'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['street'] . "</td>";
                echo "<td>" . $row['phone1'] . "</td>";
                echo "<td>" . $row['phone2'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            
           mysqli_close($con);
        ?>
       </form>
   </body>
</html>