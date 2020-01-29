<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body> 
	<table border="5px" width="50%">

<?php
      include "nav.php";
      echo "<br>WAQ to list all employee first name with salary greater than 50k.br><br> ";
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
    
        
echo "<tr><th>First Name</th><th>Salary</th></tr>";

    $tbl1 = "SELECT employee_salary_table.employee_salary, employee_details_table.employee_first_name 
    FROM employee_salary_table INNER JOIN employee_details_table 
    ON employee_salary_table.employee_id = employee_details_table.employee_id WHERE employee_salary > 50000";
     echo "query used : <br>". $tbl1. "<br><br>";
$res = $con->query($tbl1);
if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_first_name"] . "</td><td>" . $row["employee_salary"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
      $con->close();
?>
</table>
</body>
</html>
