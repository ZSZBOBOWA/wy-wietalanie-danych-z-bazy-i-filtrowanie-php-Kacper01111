<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){die("Błąd Połączenia: " . mysqli_connect_error());
}
?>