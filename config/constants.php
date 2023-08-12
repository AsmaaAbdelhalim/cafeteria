<?php  
session_start();
//create constants to non repeating values
define('SITEURL' , 'http://localhost/cafeteria/');
//define('LOCALHOST' , 'localhost');
//define('DB_USERNAME' , 'root');
//define('DB_PASSWORD' ,'');
//define('DB_NAME' ,'cafeteria');

// Database credentials
$host = 'localhost';
$dbname = 'cafeteria';
$username = 'root';
$password = '';


//connect to database
// $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally, set PDO fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Optionally, set character set
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    // Handle PDO connection error
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>