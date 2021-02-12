<?php
$mysqli = new mysqli("localhost", "root", "", "botica");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
mysqli_set_charset($mysqli, "utf8");
//echo $mysqli->host_info . "\n";
?>