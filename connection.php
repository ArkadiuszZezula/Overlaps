<?php

$serverName = "";
$userName = "";
$password = "";
$baseName = "";

$conn = new mysqli($serverName, $userName, $password, $baseName);

if ($conn->connect_error) {
    die("Błąd" . $conn->connect_error);
}
