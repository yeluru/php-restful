<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/batch.php';
 
// instantiate database and class object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$class = new batch($db);
 
// query classs
$stmt = $class->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // students array
    $batches_arr=array();
    $batches_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $class_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description)
        );
 
        array_push($batches_arr["records"], $class_item);
    }
 
    echo json_encode($batches_arr);
}
 
else{
    echo json_encode(
        array("message" => "No students found.")
    );
}
?>
