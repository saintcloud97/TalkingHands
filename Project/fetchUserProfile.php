<?php
 $email = $_GET['name'];
 
 //connecting to database and getting the connection object

include 'connection.php';
$conn = OpenCon();
 


$stmt = $conn->prepare("SELECT alphabetscore, colorscore, numberscore, personscore, animalscore, greetingscore, questionscore FROM users WHERE Username='$email';");
 
 //executing the query  
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($alphabetscore, $colorscore, $numberscore, $personscore, $animalscore, $greetingscore, $questionscore);
 
 
while($stmt->fetch()){
 $userDetails['alphabetscore'] = $alphabetscore;
 $userDetails['colorscore'] = $colorscore;
 $userDetails['personscore'] = $personscore; 
 $userDetails['animalscore'] = $animalscore;
 $userDetails['numberscore'] = $numberscore;
 $userDetails['greetingscore'] = $greetingscore;
 $userDetails['questionscore'] = $questionscore;
}
 //displaying the result in json format 
 echo json_encode($userDetails);