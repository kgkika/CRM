<html>
   <head>
      <title>Insert Customer</title>      
   </head>    
   <body>
    <h1>Customer Details</h1>
	<form action="insertCustomer.php" method="post">       
    <p>
        <label for="firstName">First name:</label>
        <input type="firstName" name="firstName" id="firstNameTxt">
    </p>
    <p>
        <label for="lastName">Last name:</label>
        <input type="lastName" name="lastName" id="lastNameTxt">
    </p>
    <p>
        <label for="city">City:</label>
        <input type="city" name="city" id="cityTxt">
    </p>
    <p>
        <label for="country">Country:</label>
        <input type="country" name="country" id="countryTxt">
    </p>
    <p>
        <label for="street">Street:</label>
        <input type="street" name="street" id="streetTxt">
    </p>
    <p>
        <label for="zipcode">Zip Code:</label>
        <input type="zipcode" name="zipcode" id="zipcodeTxt">
    </p>
    <p>
        <label for="phone1">Phone:</label>
        <input type="phone1" name="phone1" id="phone1Txt">
    </p>
	<input type="submit">
	</form>
   
   </body>
</html>