<html>
   <head>
      <title>Add service</title>      
   </head>
   
   <body>
    <h1>Service type details</h1>
	<form action="insertServiceType.php" method="post">	
    <p>
        <label for="serviceName">Service Name:</label>
        <input type="serviceTypeName" name="serviceTypeName" id="serviceTypeNameTxt">
    </p>
    <p>
        <label for="serviceDescription">Description:</label>
        <input type="text" name="serviceTypeDescription" id="serviceTypeDescriptionTxt">
    </p>
    <input type="submit" value="Submit">
	</form>
       
    <?php
       $con = mysqli_connect("localhost", "root", "root", "crm");
 
        // Check connection
        if($con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

   
       $result = mysqli_query($con, "select * from service_type");      
       
       echo "<table border='3'>
                <tr>
                    <th>Service name</th>
                    <th>Description</th>
                </tr>
            ";
       
       while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "</tr>";
       }
       
    ?>   
   </body>
</html>