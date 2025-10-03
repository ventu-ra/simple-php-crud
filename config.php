<?php
/*
  Database credentials.Assuming you are running MySQL server with default setting
  (user 'root')
*/
define('DB_SERVER', '172.17.0.2');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '12345678');
define('DB_NAME', 'crud_db');

/**
 * Attempt to connect to MySQL database
 */

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if ($conn === false) {
  die("Error: Could not connect. " . mysqli_connect_error());
}
// ...fim do arquivo, sem fechamento PHP e sem linhas em branco...

