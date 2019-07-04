<?php

$array = array();
$email=$_POST['email'];
$activity=$_POST['activity'];


include 'connection.php';
$conn = OpenCon();
 

$time = date("Y/m/d") . "-" . date("h:i:sa");

$stmt = $con->prepare("INSERT INTO logs(User_ID, TimeLog, Activity) values ((SELECT id FROM users WHERE Username='$email'), '$time', '$activity')");
$stmt->execute();


?>