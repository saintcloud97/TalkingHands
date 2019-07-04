<?php



include 'connection.php';
$conn = OpenCon();
 


$url_base_directory = "questionquiz/";

$stmt = $conn->prepare("SELECT Q1, O1, O2, O3, O4, answer, video FROM questionquiz order by RAND() limit 10");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($Q1, $O1, $O2, $O3, $O4, $answer, $video);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['Q1'] = $Q1;
 $temp['O1'] = $O1;
 $temp['O2'] = $O2; 
 $temp['O3'] = $O3;
 $temp['O4'] = $O4;
 $temp['answer'] = $answer;
 $temp['video'] = $url_base_directory . $video;     


 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);