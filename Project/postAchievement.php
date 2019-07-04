<?php



include 'connection.php';
$conn = OpenCon();
 


// Get request details {email of user, category of quiz, score of quiz}
$username = $_POST['name'];
$category = $_POST['category'];
if ($category == "alphabet"){
    $bID = 1;
}
if ($category == "animal"){
    $bID = 2;
}
if ($category == "color"){
    $bID = 3;
}
if ($category == "greeting"){
    $bID = 4;
}
if ($category == "person"){
    $bID = 6;
}
if ($category == "number"){
    $bID = 5;
}
if ($category == "question"){
    $bID = 7;
}

$sql = "INSERT into achievements(UserID, BadgeID) values((SELECT id FROM users WHERE Username='$username'), $bID)";

$stmt = $conn->prepare($sql);
$stmt->execute();

?>
