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
//Grafico a linee

include("phpgraphlib.php"); 

//Impostiamo la dimensione della griglia del grafico (Larghezza, Altezza)
$graph=new PHPGraphLib(500,400);

//Aggiungo i valori di cui sopra
$graph->addData($Acompleto);

//Imposto il titolo
$graph->setTitle("Grafico Lineare");

//Indichiamo alla libreria di non mostrare le barre
$graph->setBars(false);

//Di conseguenza segnaliamo che si tratta di un grafico a linee
$graph->setLine(true);

//Visualizza un bollino nel punto del valore indicato
$graph->setDataPoints(true);

//Indichiamo il colore del bollino
$graph->setDataPointColor("yellow");

//Visualizza il valore del punto
$graph->setDataValues(true);

//Indichiamo il colore
$graph->setDataValueColor("blue");

//Creo il grafico
$graph->createGraph();

?>