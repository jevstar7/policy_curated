<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 10 2021
Purpose: create table in database
*/
// connection file
require 'db_connection.php';

try {


  // sql to create table
  $sql = "CREATE TABLE policies (
  policy_id INT(6) AUTO_INCREMENT PRIMARY KEY,
  policy_title VARCHAR(100) NOT NULL,
  policy_description TEXT NULL,
  policy_link LONGTEXT NULL,
  policy_icon LONGTEXT NULL,
  policy_filename TEXT NULL,
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // execute sql statement
  $x = runCreateTable($db,$sql);
 
  echo "<br>Table policies created successfully<br>";
} catch(Exception $e) {
  echo "<br>" . $e->getMessage();
}

// empty connection variable
$db = null;
?>
  