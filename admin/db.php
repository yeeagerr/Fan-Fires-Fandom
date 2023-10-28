<?php
$server = "localhost";
$user = "root";
$pass = "";
$name = "fandom_db";

try {
    $conn = mysqli_connect($server, $user, $pass, $name);
} catch (mysqli_sql_exception) {
    echo "something went wrong";
}
