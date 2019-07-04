<?php


$url_directory_base = "question/";

$array = array();
$Word=$_POST['name'];

include 'connection.php';
$conn=OpenCon();


/////////////////////
$stmt = $conn->prepare("SELECT name,Explanation, image_url,Description FROM question WHERE name='$Word'");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($name,$Explanation,$image_url,$description);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
  $temp = array(); 
  $temp['name'] = $name;
  $temp['Explanation'] = $Explanation;
  $temp['description'] = $description;
  $temp['image_url'] = $url_directory_base . $image_url;
//  $temp['roomid'] = $name; 
//  $temp['name'] = $url_directory_base . $image_url; 
// $temp['Explanation'] = $Explanation;

 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode(array("server_response"=>$products));

 mysqli_close($conn);
// echo json_encode($array);
?>
