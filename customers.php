<html>
    <head>
    <title>Welcome to CRM</title>       
    </head>
    <body>
        <form method="post" action="">
       <?php
           $con = mysqli_connect("localhost","root","root","crm");
            
           if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con, "select * from customer");
            
            echo "<div id=\"customerTbl\"><table border='3'>
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
                echo "<td>
                        <form method=\"post\" action=\"\">
                            <input id=\"editCustomer\" formaction=\"updateCustomerDetails.php\" type=\"submit\" name=\"action\" value=\"Edit\" />
                            <input id=\"addServiceInputBtn\" formaction=\"addServiceToCustomer.php\" type=\"submit\" name=\"action\" value=\"AddService\" />
                            <input type=\"hidden\" name=\"id\" value=\"$currentID\"/>
                        </form>
                    </td>";
                echo "</tr>";
            }
            echo "</table></div>";
            
           mysqli_close($con);
        ?>
        </form>
    </body>
</html>