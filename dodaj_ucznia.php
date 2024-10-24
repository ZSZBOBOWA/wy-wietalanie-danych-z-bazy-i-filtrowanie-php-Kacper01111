<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola3";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$imie = mysqli_real_escape_string($conn, $_POST['imie']);
$nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
$wiek = mysqli_real_escape_string($conn, $_POST['wiek']);
$klasa = mysqli_real_escape_string($conn, $_POST['klasa']);

$sql = "INSERT INTO uczniowie (imie, nazwisko, wiek, klasa) VALUES ('$imie', '$nazwisko', '$wiek', $klasa')";
if (mysqli_query($conn, $sql)) {
    echo "Nowy uczeń został dodany pomyślnie.<br>";
    echo "<a href='wyswietl_uczniow.php'>Wyświetl liste uczniów</a>";
} else { echo "Błąd: ". $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>