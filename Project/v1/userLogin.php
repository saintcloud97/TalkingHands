<?php

require_once '../include/db_operations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

	if (isset($_POST['username']) and isset($_POST['password'])){

		$db = new DbOperations();

		if ($db->userLogin($_POST['username'],$_POST['password'])) {
			//$student = $db->getUserByUserName($_POST['email']);
			$response['error'] = false;
			$response['message'] = "Successfully Login";
			
		}else{
			$response['error'] = true;
			$response['message'] = "Invalid Username or Password";

		}


	}
	else{
		$response['error'] = true;
	$response['message'] = "Fill all the feilds";
	}
}
echo json_encode($response);
