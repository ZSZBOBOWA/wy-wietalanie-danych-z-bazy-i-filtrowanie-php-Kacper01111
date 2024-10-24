<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="index.php">
    Wpisz nazwisko: <input type="text" name="nazwisko">
    <input type="submit" value="Filtruj">
</form>

<form action="dodaj_ucznia.php" method="POST">
    <label for="imie">Imię:</label>
    <input type="text" id="imie" name="imie" required>
    <label for="nazwisko">Nazwisko:</label>
    <input type="text" id="nazwisko" name="nazwisko" required>
    <label for="wiek">Wiek:</label>
    <input type="number" id="wiek" name="wiek" required>
    <label for="klasa">Klasa:</label>
    <input type="text" id="klasa" name="klasa" required>
    <button type="submit">Dodaj</button>
</form>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola3";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){die("Błąd Połączenia: " . mysqli_connect_error());
}
if(isset($_POST['nazwisko']) && $_POST['nazwisko'] != '') {
    $nazwisko = $_POST['nazwisko'];
    $nazwisko = mysqli_real_escape_string($conn, $nazwisko);
    $sql = "SELECT * FROM uczniowie WHERE nazwisko='$nazwisko'";
    
    
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'<tr><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Klasa</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["imie"]."</td><td>".$row["nazwisko"]."</td><td>".$row["wiek"]."</td><td>".$row["klasa"]."</td></tr>";
    }
    echo "</table>";
} else {echo "Brak wyników";
}
mysqli_close($conn);
}else {
    echo "Brak Nazwiska";
}


?>
</body>
</html>
