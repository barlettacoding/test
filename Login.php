<?php

$servername = "localhost";//Nome del server per il database
$usernameDB = "barlettacoding";//Username del database
$passwordDB = "";//Password del database
$dbname = "my_barlettacoding";//Nome database
$username = $_POST["username"];//Username login
$password = $_POST["password"];//Password login

$sql = "SELECT nome, password FROM Utenti";

//CONNESSIONE CON MSQLI PROCEDURALE AL DATABASE
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

//ESEGUO LA QUERY E IL RISULTATO VA NELLA VARIABILE RESULT
$result = $conn->query($sql);

$controlloLogin = true;//VARIABILE PER IL CONTROLLO

if ($result->num_rows > 0) {
    //Controllo
    while($row = $result->fetch_assoc()) {
        //SE L'USERNAME è CORRETTO E SULLA STESSA RIGA TROVA LA PASSWORD CORRETTA
		//FA IL LOGIN
		if ($username1 == $row["nome"] && $password1 == $row["password"]){
			$controlloLogin = true;
			break;
		}
		else {
		$controlloLogin = false;
	}
}
}

//AGGIUNGERE QUI CONTROLLO AL LOGIN PER IL REINDERIZZAMENTO ALLA PAGINA DI LOGIN

$conn->close();
?>
