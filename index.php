<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods in the store</title>
</head>
<body>
    <h2>Перелік виробників, з якими працює магазин</h2>
    <form action="getManufacturers.php" metod="post">
        
    <?php
    include("connect.php");
    require_once("connect.php");

            $collections = (new MongoDB\Client)->Lb6_Var5->goods;    
    ?>
        <input type="submit" value="Результат">
    </form> 

<h2>Товари, відсутні на складі (тобто взагалі вони є, але зараз кількість 0)</h2>
<form action="getnoItems.php" method="post">
        <?php
        include("connect.php");
        require_once("connect.php");

        $collections = (new MongoDB\Client)->Lb6_Var5->goods;
      
        ?>
    <input type="submit" value="Результат">
</form>


<h2>Товари в обраному ціновому діапазоні</h2>
<form action="getItemsbyPrice.php" method="post">
    
<div name="min_price" id="min_price">
        <input type='number' name='min_price' id='min_price'>
    </div>
    <div name="max_price" id="max_price">
        <input type='number' name='max_price' id='max_price'>
    </div>
    <input type="submit" value="Результат">
</form>


        

    
    <script>
        const data = localStorage.getItem("request");
        const result = JSON.parse(data);
        if (result.length > 0) {
            let output = "";
            result.forEach(function(element){
                output += " " + element;
            });
            document.write("Попередній запит:" + output);
        }
    </script>
</body>
</html>