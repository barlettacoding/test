<?php
$servername = "localhost";
$username = "barlettacoding";
$password = "";
$dbname = "my_barlettacoding";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nome, password FROM Utenti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["nome"]. " - Name: " . $row["password"]. " " ."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>