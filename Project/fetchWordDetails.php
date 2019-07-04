<?php

$array = array();

// animals, dictionary, greeting, numbers, persons, questions, color
$category=$_GET['category'];

switch ($category){
    case "alphabet":
        $url_directory_base = "alphabet/";
        break;
    case "color":
        $url_directory_base = "color/";
        break;
    case "animals":
        $url_directory_base = "animal/";
        break;
    case "greeting":
        $url_directory_base = "greeting/";
        break;
    case "numbers":
        $url_directory_base = "number/";
        break;
    case "persons":
        $url_directory_base = "person/";
        break;
    case "questions":
        $url_directory_base = "question/";
        break;
}


include 'connection.php';
$conn = OpenCon();
 


$stmt = $conn->prepare("SELECT name, Explanation, image_url, description  FROM $category");
 
 //executing the query 
$stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($name, $Explanation,$image_url, $description);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
    $temp = array();     
    $temp['name'] = $name;
    $temp['image_url'] = $url_directory_base . $image_url; 
    $temp['Explanation'] = $Explanation;
    $temp['description'] = $description;


 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);

 mysqli_close($con);
?>
