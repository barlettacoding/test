<?php

$servername = "localhost";
$usernameDB = "barlettacoding";
$passwordDB = "";
$dbname = "my_barlettacoding";

$username = $_POST["username"];
$password = $_POST["password"];

// Create connection
$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Utenti (nome, password) VALUES ('$username', '$password')";
echo $sql;

if (mysqli_query($conn, $sql)) {
    echo "INSERITI";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>