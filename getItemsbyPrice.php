<?php
include("connect.php");

if (isset($_POST['min_price']) && isset($_POST['max_price'])) {
    $minPrice = intval($_POST['min_price']);
    $maxPrice = intval($_POST['max_price']);

    $collections = (new MongoDB\Client)->Lb6_Var5->goods;
    $filter = [
        'price' => ['$gte' => $minPrice, '$lte' => $maxPrice]
    ];
    $options = ['projection' => ['_id' => 0]];
    $cursor = $collections->find($filter, $options);

    $results = array();
    foreach ($cursor as $document) {
        $results[] = $document;
        echo 'Name: ' . $document['name'] . '<br>';
        echo 'Category: ' . $document['category'] . '<br>';
        echo 'Manufacturer: ' . $document['manufacturer'] . '<br>';
        echo 'Price: ' . $document['price'] . '<br>';
        echo '------------------------<br>';
    }

    echo "<script>var results = " . json_encode($results) . ";</script>";
}
?>
