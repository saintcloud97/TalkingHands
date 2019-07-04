<?php
$url_directory_base = "badges/";

$array = array();
$name=$_GET['name'];

include 'connection.php';
$conn = OpenCon();
 

$stmt = $conn->prepare("SELECT Badge_Description, Badge_Image_URL from users a JOIN achievements c ON a.id=c.UserID JOIN badges b ON c.BadgeID=b.BadgeID where a.id=(SELECT id from users where Username='$name');");
$stmt->execute(); 
$stmt->bind_result($badgeDesc, $badgeURL);
 
$products = array(); 
 
//traversing through all the result 
while($stmt->fetch()){
    $temp = array(); 
    $temp['badge'] = $badgeDesc;
    $temp['badge_url'] = $url_directory_base . $badgeURL;
    array_push($products, $temp);
}
 
 //displaying the result in json format 
 echo json_encode(array("server_response"=>$products));

 mysqli_close($con);
// echo json_encode($array);
?>
