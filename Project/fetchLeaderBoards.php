<?php



// must take input of either alphabet, animal, number, greeting, color, person
$category=$_GET['category'];
 
//connecting to database and getting the connection object

include 'connection.php';
$conn = OpenCon();
 

// concatenate score to category input to match db field
$categoryScore = $category . "score";

$stmt = $conn->prepare("SELECT $categoryScore, email FROM users ORDER BY $categoryScore DESC;");
 
//executing the query 
$stmt->execute();
 
//binding results to the query 
$stmt->bind_result($categoryScore, $email);
 
$products = array(); 
 
//traversing through all the result 
while($stmt->fetch()){
    $temp = array();
    $temp['categoryscore'] = $categoryScore;
    $temp['email'] = $email;
    array_push($products, $temp);
}
 
 //displaying the result in json format 
 echo json_encode($products);