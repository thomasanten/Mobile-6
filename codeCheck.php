<?php
	// Functie om ingevulde code in het formulier te checken!
	function codecheck($code){
		// echo 'Code Check wordt uitgevoerd!';
		
		$con=mysqli_connect("localhost","durftean","SSander123","durftean");
		$query = "SELECT * FROM codes WHERE code = $code";		
		$result = mysqli_query($con, $query);
		$data = mysqli_fetch_assoc($result);
		
		if($result->num_rows > 0) {
			$ja = true; // Wel iets gevonden
		}else{
			$nee = false; // Niks gevonden
		}
		return array($ja,$nee,$data);
	}
?>