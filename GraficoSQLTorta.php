<?php
 
// Inclusione delle librerie
include("pData.class");
include("pChart.class");
 
 
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
 
// Definizione del Dataset
$DataSet = new pData;
 
// array dei valori
$DataSet->AddPoint($ID,"Serie1");
 
// array con le etichette dei valori
$DataSet->AddPoint($Valori,"Serie2");
 
$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");
 
// Inizializzazione del grafico
$Test = new pChart(340,250);
$Test->setFontProperties("tahoma.ttf",10);
$Test->drawFilledRoundedRectangle(7,7,333,243,5,240,240,240);
$Test->drawRoundedRectangle(5,5,335,245,5,230,230,230);
 
// Disegna il grafico a torta
$Test->AntialiasQuality = 0;
$Test->setShadowProperties(2,2,200,200,200);
$Test->drawFlatPieGraphWithShadow($DataSet->GetData(),$DataSet->GetDataDescription(),130,130,80,PIE_PERCENTAGE,8);
$Test->clearShadow();
 
// Inserisce il titolo
$Test->drawTitle(100,20,"Test Pie Graph",0,0,0);
 
// Inserisce la legenda
$Test->drawPieLegend(270,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);
 
// salva il file con l'immagine
//$Test->Render("piechart.png");
 
// se invece si vuole mostrare direttamente l'immagine senza salvarla su disco, commentare la riga precedente e scommentare quella seguente
$Test->Stroke();
 
?>