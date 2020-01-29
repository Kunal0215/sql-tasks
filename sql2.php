<!DOCTYPE html>
<html>
<head> 
    <title>Table with database</title>
    <script src="jquery.js"> </script>
</head>

<body>
    <?PHP 
        include "nav.php";
    ?>
    <h3>employee_code_table</h3>
    <table border="5px" width="50%">
        <?php
            echo "<tr><th>employee_code</th><th>employee_code_name</th><th>employee_domain</th></tr>";
            $conn = mysqli_connect("localhost", "root", "root", "ofc");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT employee_code, employee_code_name, employee_domain FROM employee_code_table";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["employee_code"] . "</td><td>" . $row["employee_code_name"] . "</td><td>" . $row["employee_domain"] . "</td></tr>";
            }
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>
    </table>
    <h3>employee_salary_table</h3>
    <table border="5px" width="50%">
        <?php
            echo "<tr><th>employee_id</th><th>employee_salary</th><th>employee_code</th></tr>";
            $conn = mysqli_connect("localhost", "root", "root", "ofc");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT employee_id, employee_salary, employee_code FROM employee_salary_table";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["employee_id"] . "</td><td>" . $row["employee_salary"] . "</td><td>" . $row["employee_code"] . "</td></tr>";
            }
            } else {
            echo "0 results";
            }
            $conn->close();
         ?>
    </table>
    <h3>employee_details_table</h3>
    <table border="5px" width="50%">
        <?php
            echo "<tr><th>employee_id</th><th>employee_first_name</th><th>employee_last_name</th><th>graduation_percentile</th></tr>";
            $conn = mysqli_connect("localhost", "root", "root", "ofc");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT employee_id, employee_first_name, employee_last_name, graduation_percentile FROM employee_details_table";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["employee_id"] . "</td><td>" . $row["employee_first_name"] . "</td><td>" . $row["employee_last_name"] . "</td><td>" . $row["graduation_percentile"] . "</td></tr>";
            }
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>
    </table>
</body>

</html>