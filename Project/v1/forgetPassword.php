<?php

require_once '../include/db_operations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

	if (isset($_POST['email']) and isset($_POST['password'])){

		$db = new DbOperations();

		if ($db->changePassword($_POST['email'],$_POST['password'])) {
			//$student = $db->getUserByUserName($_POST['email']);
			$response['error'] = false;
			$response['message'] = "Successfully Changed Password";
		} else {
			$response['error'] = true;
			$response['message'] = "Error in changing password!";

		}
	} else {
		$response['error'] = true;
		$response['message'] = "Fill in required fields!";
	}
}
echo json_encode($response);
