<?php 
	include('connection.php');
	
	//Om de gegevens weer door te geven via json (Publieke API)
	header("Access-Control-Allow-Origin: *");

	$logUsername	=	$_POST['logUsername'];
	$logPassword	=	$_POST['logPassword'];
		
	if (isset($logUsername) && isset($logPassword)){
		
		$resultCredential = mysqli_query($con, "SELECT * FROM reg_users WHERE username ='".$logUsername."' AND password ='".$logPassword."'");
		if($resultCredential->num_rows) {
				$output = array('status' => true, 'message' => 'Gelukt, login!');
				echo json_encode($output);
				exit();
		  }
		else{	
				$output = array('status' => 'error', 'message' => 'Gebruikersnaam en password komen helaas niet overeen!');
				echo json_encode($output);
				exit();			
		}
		
	}else{
		$output = array('status' => false, 'message' => 'Er is iets mis gegaan!');
		echo json_encode($output);		
	}
 
?>