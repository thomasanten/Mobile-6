<?php 
	//Om de gegevens weer door te geven via json (Publieke API)
	header("Access-Control-Allow-Origin: *");
 
    // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
    $action = $_POST['action'];
    // Decode JSON object into readable PHP object
    $formData = json_decode($_POST['formData']);
 
	require('connection.php');
    // If the values are posted, insert them into the database.
    if (isset($formData->{'username'}) && isset($formData->{'password'})){
		//$username = $_POST['username'];
		//$email = $_POST['email'];
		//$password = $_POST['password'];
		
		$username = $formData->{'username'};
		$password = $formData->{'password'};
		
		$query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
		$result = mysql_query($query);
			if($result){
				$output = array('status' => true, 'massage' => 'User Created Successfully.!');
			}
    }else{
		$output = array('status' => false, 'massage' => 'Geen gebruiker bekend!');
	}
	
    echo json_encode($output);	
 
?>