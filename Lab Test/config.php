<?php
const DBHOST = 'localhost';        // Database Hostname
const DBUSER = 'root';             // MySQL Username
const DBPASS = '';                 // MySQL Password
const DBNAME = 'swastik';  // MySQL Database name

// Data Source Network
$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . '';

// Connection Variable
$connection = null;

// Connect Using PDO (PHP Data Output)
try {
    $connection = new PDO($dsn, DBUSER, DBPASS);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
}
