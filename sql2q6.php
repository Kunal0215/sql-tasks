<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="5px" width="50%">

<?php
      include "nav.php";
      echo "<br>WAQ to list all employee_domain with sum of it's salary but dont include salaries which is less than 30k. <br><br> ";
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
    
        
echo "<tr><th>Domain</th><th>Salary</th></tr>";

    $tbl6 = "SELECT employee_code_table.employee_domain, sum(employee_salary_table.employee_salary) AS sum 
    FROM employee_salary_table INNER JOIN employee_code_table 
    ON employee_code_table.employee_code = employee_salary_table.employee_code 
    WHERE employee_salary_table.employee_salary > 30000
    GROUP BY employee_code_table.employee_domain"; 
    echo "query used : <br>". $tbl6. "<br><br>";

$res = $con->query($tbl6);
if ($res->num_rows > 0) {
    // output data of each row
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_domain"] . "</td><td>" . $row["sum"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
      $con->close();
?>
</table>
</body>
</html>
