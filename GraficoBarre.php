<?php
$username = $_POST["username"];
$username1 = $_POST["username1"];
$valore = $_POST["valore"];
$valore1 = $_POST["valore1"];

//Inclusione libreria dei grafici
include("phpgraphlib.php");
//Creo una griglia con larghezza ed altezza
$graph=new PHPGraphLib(500,400);
//Inseriamo i dati relativi alle colonne del grafico, i valori che voliamo visualizzare
$data=array($username=>$valore, $username1=>$valore1);
//Aggiungo i valori di cui sopra
$graph->addData($data);

//Imposto il titolo
$graph->setTitle("Prova");

//Imposto il colore del testo
$graph->setTextColor("red");

//Creo il grafico
$graph->createGraph();

?>