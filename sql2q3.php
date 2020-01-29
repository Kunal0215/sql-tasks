<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="5px" width="50%">
<?php
      include "nav.php";
      echo "<br>WAQ to list all employee code name with graduation percentile less than 70%. <br><br> ";
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
echo "<tr><th>Code Name</th><th>Graduation Percentile</th></tr>";

    $tbl3 = "SELECT employee_code_table.employee_code_name, employee_details_table.graduation_percentile 
             FROM employee_salary_table, employee_details_table, employee_code_table 
             WHERE employee_salary_table.employee_id = employee_details_table.employee_id 
             AND employee_salary_table.employee_code = employee_code_table.employee_code 
             AND employee_details_table.graduation_percentile < 70";
    echo "query used : <br>". $tbl3. "<br><br>";


$res = $con->query($tbl3);
if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_code_name"] . "</td><td>" . $row["graduation_percentile"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
      $con->close();
?>
</table>
</body>
</html>
