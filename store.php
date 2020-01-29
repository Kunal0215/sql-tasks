<?php

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
    
    $id = $_POST['id'];
    $code = $_POST['code'];
    $codename = $_POST['codename'];  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $domain = $_POST['domain'];
    $grad = $_POST['grad'];
    $salary = $_POST['salary'];

    $tbl1 = "INSERT INTO employee_code_table (employee_code, employee_code_name, employee_domain) 
    VALUES ('$code', '$codename', '$domain')";
    $tbl2 = "INSERT INTO employee_details_table (employee_id, employee_first_name, employee_last_name, graduation_percentile) 
    VALUES ('$id', '$fname', '$lname', '$grad')";
    $tbl3 = "INSERT INTO employee_salary_table (employee_id, employee_salary, employee_code) 
    VALUES ('$id', '$salary', '$code')";

      if ($con->query($tbl1) === TRUE && $con->query($tbl2) === TRUE && $con->query($tbl3) === TRUE) 
      {
          echo "<br><br><br>Successfully Updated in DataBase<br>";
      } else {

          echo "Error: " . $tbl1 . "<br>" . $con->error;

          echo "Error: " . $tbl2 . "<br>" . $con->error;

          echo "Error: " . $tbl3 . "<br>" . $con->error;
      }

      $con->close();
?>
