<?php 
	//Om de gegevens weer door te geven via json (Publieke API)
	header("Access-Control-Allow-Origin: *");
 
    // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
    //$action = $_POST['action'];
    // Decode JSON object into readable PHP object
    //$formData = json_decode($_POST['formData']);
	
	$formData->{'username'} = 'tonk';
	$formData->{'password'} = 'omg123';
	$formData->{'email'} = 'test@test.nl';
		
 
	require('connection.php');
    // If the values are posted, insert them into the database.
    if (isset($formData->{'username'}) && isset($formData->{'password'})){
		
		$username = $formData->{'username'};
		$password = $formData->{'password'};
		$email = $formData->{'email'};
		
		$query = "INSERT INTO `reg_users` (email, username, password, active) VALUES ('$username', '$password', '$email', 1)";
		$result = mysql_query($query);
			if($result){
				$output = array('status' => true, 'massage' => 'Gebruiker aangemaakt!');
			}
    }else{
		$output = array('status' => false, 'massage' => 'Er is iets mis gegaan!');
	}
	
    echo json_encode($output);	
 
?>