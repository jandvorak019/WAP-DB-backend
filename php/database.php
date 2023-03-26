<?php
// My own database connection details
$server = "localhost";
$username = "myusername";
$password = "mypassword";
$database = "mydatabase";

// Creating a connection to the database
$connection = new mysqli($server, $username, $password, $database);
?>