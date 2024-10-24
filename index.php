<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){die("Błąd Połączenia: " . mysqli_connect_error());
}

$sql = "SELECT * FROM uczniowie";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'<tr><th>Imię</th><th>Nazwsiko</th><th>Wiek</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["imie"]."</td><td>".$row["nazwisko"]."</td><td>".$row["wiek"]."</td></tr>";
    }
    echo "</table>";
} else {echo "Brak wyników";
}
mysqli_close($conn);
?>