<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="5px" width="50%">

<?php
      include "nav.php";
      echo "<br>WAQ to list all employee last name with graduation percentile greater than 70%. <br><br> ";
      $dbhost="localhost";  // hostname
      $dbuser="root"; // mysql username
      $dbpass="root"; // mysql password
      $db="ofc"; // database
// Create connection
    $con = new mysqli($dbhost, $dbuser, $dbpass, $db);
// Check connection
     if ($con->connect_error) 
     {
        die("Connection failed: " . $con->connect_error);
     }
    
        
echo "<tr><th>Last Name</th><th>Graduation Percentile</th></tr>";

    $tbl2 = "SELECT employee_last_name, graduation_percentile FROM employee_details_table WHERE graduation_percentile > 70";
    echo "query used : <br>". $tbl2. "<br><br>";

$res = $con->query($tbl2);
if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_last_name"] . "</td><td>" . $row["graduation_percentile"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
      $con->close();
?>
</table>
</body>
</html>
