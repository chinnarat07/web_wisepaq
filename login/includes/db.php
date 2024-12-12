<?php
date_default_timezone_set('Asia/Bangkok');

$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "wisepaq_db";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 mysqli_set_charset($connection,"utf8mb4");
// if (!$connection) {
//     echo "We are inconnect";
// } else {
//     echo "Connected Successfully";
// }
