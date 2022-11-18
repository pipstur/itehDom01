<?php

$hostname = "localhost";
$username = "root";
$password = "";
$baza = "zoovrt";
$connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);
$id = $_GET['id'];

$query = "delete from zivotinja where id=" . $id;

if ($connection->query($query)) {
    $script = "<script> window.location = 'zivotinje.php';</script>";
    echo $script;
}
