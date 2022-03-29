<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 10 2021
Purpose: connect to database using PDO
*/

class DatabaseUtils 
{
  // Database connection object
  private $pdo;
  // Create a PDO object and connect to the database
  public function __construct() {
    try {

			$dbHost = "localhost";
      $dbUser = "moodle_dev";
      $dbPass = "RouylMfLvKNP";
      $dbName = "moodle";
		
      // Instantiate the PDO object
      $this->pdo = new PDO(
        // Use MySQL database driver
        "mysql:dbname=$dbName;host=$dbHost", 
        $dbUser, 
        $dbPass, 
        // Set some options
        array(
          // Return rows found, not changed, during inserts/updates
          PDO::MYSQL_ATTR_FOUND_ROWS => true, 
          // Emulate prepares, in case the database doesn't support it
          PDO::ATTR_EMULATE_PREPARES => true,
          // Have errors get reported as exceptions, easier to catch
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          // Return associative arrays, good for JSON encoding
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        )
      );
    }//end try 
    catch (PDOException $e) {
        die('Database Connection Failed: ' . $e->getMessage());
    }
  }//end function_construct
  // Perform a SELECT query
  //takes sql statement and values in an array called data[]
  public function select($sql, $data = array()) {
    try {
      // Prepare the SQL statement
      $stmt = $this->pdo->prepare($sql);
      // Execute the statement
      if ($stmt->execute($data)) {
        // Return the selected data as an assoc array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      else {
        return $e->getMessage();
      }
    }//end try
    catch (Exception $e) {
      return $e->getMessage();
    }
  }//end fuction select
  
  // Perform an INSERT query
  //takes sql statement and values in an array called data[]
  public function insert($sql, $data = array()) {
    try {
      // Prepare the SQL statement
      $stmt = $this->pdo->prepare($sql);
      // Execute the statement
      if ($stmt->execute($data)) {
        // Return the number of rows affected
        return $stmt->rowCount();
      }
      else {
        return $e->getMessage();
      }
    }//end try
    catch (Exception $e) {
      return $e->getMessage();
    }
  }//end function insert
  
  // Perform a DELETE query
  public function delete($sql, $data = array()) {
    return $this->insert($sql, $data);
  }
  // create table
  public function createTable($sql) {
    return $this->pdo->exec($sql);
  }
}//end class DatabaseUtils

function runCreateTable($db,$sql) {
	$x=$db->createTable($sql);
	return $x;
}

function runSQL($db,$sql,$data) {
	$x=$db->select($sql,$data);
	return $x;
}

function runCreateSQL($db,$sql,$data) {
	$x=$db->insert($sql,$data); 
	return $x;
}

function runDeleteSQL($db,$sql,$data){
	$x=$db->delete($sql,$data);
	return $x;
}


$db = new DatabaseUtils();
?>