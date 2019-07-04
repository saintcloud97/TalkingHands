<?php


 include 'connection.php';
 $conn = OpenCon();


$stmt = $conn->prepare("SELECT name FROM color");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt -> bind_result($word);

 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['name'] = $word;
 

 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode(array("server_response"=>$products));
                  
