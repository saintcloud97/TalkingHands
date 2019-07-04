<?php

require_once '../include/db_operations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

	if (
		isset($_POST['email']) and
	    isset($_POST['password']) and
    	isset($_POST['Username']) and
        isset($_POST['Firstname']) and
        isset($_POST['Lastname'])
    ) {
 
        

		$db = new DbOperations();
		if ($db->createUser($_POST['email'],$_POST['password'],$_POST['Username'],$_POST['Firstname'],$_POST['Lastname'])) {
			$response['error'] = false;
		$response['message'] = "User register Successfully";

		}else{
		$response['error'] = true;
	$response['message'] = "Failed register";
	}
}

	else{
		$response['error'] = true;
	$response['message'] = "Fill all the fields";
	}
	
}
else{
	$response['error'] = true;
	$response['message'] = "Invalid Request";

}

echo json_encode($response);