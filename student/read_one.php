<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/student.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare student object
$student = new Student($db);
 
// set ID property of student to be edited
$student->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of student to be edited
$student->readOne();
 
// create array
$student_arr = array(
    "id" =>  $student->id,
    "name" => $student->name,
    "description" => $student->description,
    "price" => $student->price,
    "course_id" => $student->course_id
);
 
// make it json format
print_r(json_encode($student_arr));
?>
