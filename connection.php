<?php

// Connectie gegevens - server26.firstfind.nl
$con = mysqli_connect("localhost","durftean","SSander123","durftean");

// Check connectie
if (mysqli_connect_errno()) {
	printf("Het is niet gelukt om verbinding op te zetten: ", mysqli_connect_error());
	exit();
}

?>