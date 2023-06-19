<?php
include("connect.php");


$collections = (new MongoDB\Client)->Lb6_Var5->goods;
$filter = ['quantity' => 0]; // Фильтр по количеству равному 0
$projection = ['name' => 1];
$cursor = $collections->find($filter);

$results = array();
foreach ($cursor as $document) {
    $results[] = $document['name'];
}


$unique_names = array_unique($results);
foreach ($unique_names as $name) {
    echo $name . "<br>";
}





echo "<script>var results = " . json_encode($results) . ";</script>";
?>
