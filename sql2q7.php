<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<table border="5px" width="50%">

<?php
    include "nav.php";
    echo "<br>WAQ to list all employee id which has not been assigned employee code. <br><br> ";
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
echo "<tr><th>employee_id</th></tr>";

$tbl7 = " SELECT employee_id from employee_salary_table where employee_code  IS NULL ";
echo "query used : <br>". $tbl7. "<br><br>";


$res = $con->query($tbl7);
if ($res->num_rows > 0) {
// output data of each row
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>" . $row["employee_id"] . "</td></tr>";
}
} else {
echo "0 results";
}
    $con->close();
?>
</table>
</body>
</html>
