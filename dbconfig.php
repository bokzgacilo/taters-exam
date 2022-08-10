<?php 
  
  $db = new SQLite3('users.db');
 
  //Create a new table to our database 
  $query = "CREATE TABLE IF NOT EXISTS user (
    id INTEGER PRIMARY KEY, 
    username STRING, 
    password STRING, 
    lastname STRING,
    firstname STRING,
    street STRING,
    barangay STRING,
    municipality STRING,
    contact STRING,
    age STRING,
    gender STRING,
    email STRING
  )";
?>