<!-- For Local -->
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>


<!-- For Hosting -->
<?php

//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'angampor_kolakan');
//define('DB_PASSWORD', '1212kolakanda');
//define('DB_NAME', 'angampor_kolakenda');

/* Attempt to connect to MySQL database */
//$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
//if ($con === false) {
   // die("ERROR: Could not connect. " . mysqli_connect_error());
//}