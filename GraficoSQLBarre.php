<?php
//PARTE PER CONNESSIONE AL DATABASE
$DBname = "my_barlettacoding";
$DBUsername = "barlettacoding";
$DBpassword = "";
$servername = "localhost";

$ID = array(); //Array contenente gli id
$Valori = array();//Array contenente i valori

$Acompleto = array();//ARRAY associativo per il grafico

//Apertura connessione msqli procedurale
$conn = new mysqli($servername,$DBUsername,$DBpassword,$DBname);
//CONTROLLO CONNESSIONE
if ($conn->connect_error){


}



//STRINGA PER MYSQL PER REPERIRE I DATI
$sql = "Select ID, Valore from testgrafo";
//QUI SI CONTERRANNO I RISULTATI DELLA STRINGA
$result = $conn->query($sql);
//INSERIMENTO VALORI NELL'ARRAY PER IL GRAFICO

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
	
	$valore;
	$ID[$valore] = $row["ID"];
	$Valori[$valore] = $row["Valore"];
	//echo "Da input " . $row["ID"]. " Valore " . $row["Valore"]. " " ."<br>";
	//echo "Da array ". $ID[$valore]." ".$Valori[$valore]."<br>";
	$valore ++;
    //echo $valore;
}
}
else {
	

}
$lungArray = count($ID);
//echo $lungArray;
//CICLO PER RIEMPIRE L'ARRAY ASSOCIATIVO

for ($i;$i<$lungArray;$i++){

	$Acompleto[$ID[$i]]=$Valori[$i];

}

//print_r($Acompleto);


//Inclusione libreria dei grafici
include("phpgraphlib.php");
//Creo una griglia con larghezza ed altezza
$graph=new PHPGraphLib(500,400);
//Inseriamo i dati relativi alle colonne del grafico, i valori che voliamo visualizzare

//AGGIUNGI I VALORI AL GRAFICO CON L'ARRAY CHE HO CREATO
$graph->addData($Acompleto);

//Imposto il titolo
$graph->setTitle("ID CON VALORI DA MYSQL");

//Imposto il colore del testo
$graph->setTextColor("red");

//Creo il grafico
$graph->createGraph();

?>