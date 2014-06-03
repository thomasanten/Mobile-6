<?php 
	include('connection.php');
	
	//Om de gegevens weer door te geven via json (Publieke API)
	header("Access-Control-Allow-Origin: *");

	//$regUsername	=	mysqli_real_escape_string($_POST['regUsername']);
	//$regPassword	=	mysqli_real_escape_string($_POST['regPassword']);
	//$regEmail		=	mysqli_real_escape_string($_POST['regEmail']);
		
	if (isset($_POST['regUsername']) && isset($_POST['regPassword']) && isset($_POST['regEmail'])){
		
		$regUsername	=	$_POST['regUsername'];
		$regPassword	=	$_POST['regPassword'];
		$regEmail		=	$_POST['regEmail'];
		
		$resultUsername = mysqli_query($con, "SELECT * FROM reg_users WHERE username ='".$regUsername."'");
		if($resultUsername->num_rows) {
				$output = array('status' => 'bestaat', 'message' => 'Gebruikersnaam is al in gebruik!');
				echo json_encode($output);
				exit();
		  }
		else{	
			if(mysqli_query($con, "INSERT INTO reg_users (email,username,password,active) VALUES ('".$regEmail."','".$regUsername."','".$regPassword."',1)")){
				$output = array('status' => true, 'aangemaakt' => 'Gebruiker aangemaakt!');
				echo json_encode($output);
				exit();	
			}
		}
		
	}else{
		$output = array('status' => false, 'message' => 'Er is iets mis gegaan!');
		echo json_encode($output);		
	}

	
?>