<?php
// Database configuration settings
$host = 'localhost';
$database = 'simple_cms';
$username = 'root';
$password = 'root';

// Establish the database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
  die('Database connection error: ' . mysqli_connect_error());
}
