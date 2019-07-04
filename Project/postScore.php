<?php



include 'connection.php';
$conn = OpenCon();
 


// Get request details {email of user, category of quiz, score of quiz}
$username = $_POST['name'];
$category = $_POST['category'];
$score1 = $_POST['score'];
$score = (int)$score1;

$categorySQL = $category . "score";

$sql = "UPDATE users SET $categorySQL = $score WHERE Username='$username'";

if($conn->query($sql) === true){
    $response['status_code'] = 200;
    $response['message'] = "Successfully updated Score!";
} else {
    $response['status_code'] = 500;
    $response['message'] = "ERROR: Failed to update record";
}

echo json_encode($response);