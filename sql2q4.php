<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="5px" width="50%">

<?php
      include "nav.php";
      echo "<br>WAQ to list all employee’s full name that are not of domain Java. <br><br> ";
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
echo "<tr><th>First Name</th><th>Last Name</th></tr>";

    $tbl4 = " SELECT employee_details_table.employee_first_name, employee_details_table.employee_last_name 
              FROM employee_salary_table, employee_details_table, employee_code_table 
              WHERE employee_code_table.employee_domain != 'Java' 
              AND employee_salary_table.employee_code = employee_code_table.employee_code 
              AND employee_salary_table.employee_id = employee_details_table.employee_id ";
    echo "query used : <br>". $tbl4. "<br><br>";


$res = $con->query($tbl4);
if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_first_name"] . "</td><td>" . $row["employee_last_name"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
      $con->close();
?>
</table>
</body>
</html>
