<?php

// 1. Pull in the credentials dynamically created by our AWS EC2 boot script

include 'db_config.php';
 
// 2. Create connection using the variables from db_config.php

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 
// 3. Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>
 
