<?php
include("connect.php");

$collections = (new MongoDB\Client)->Lb6_Var5->goods;
$filter = ['manufacturer' => ['$ne' => 'Samsung']]; // Изменили фильтр на '$ne' (не равно)
$projection = ['manufacturer' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $document) {
    $result[] = $document['manufacturer'];
}

$unique_manufacturers = array_unique($result);
foreach ($unique_manufacturers as $manufacturer) {
    echo $manufacturer . "<br>";
}

echo "<script>localStorage.setItem('request', '" . json_encode($result) . "');</script>";

?>
