<?php
    session_start();
    require "conn.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Zavtra</title>
</head>
<body>
<div class="wrapper">
    <div class="body container">
        <?php require "header.php"?>
        <div class="row justify-content-center my-5 rounded gap-3">
            <?php
                $sql = "SELECT * FROM product";
                $result = $conn -> query($sql);
                while($row = $result -> fetch()) {
                    echo "
                        <div class='col-4 border'>
                            <div class='product_title text-center my-2'>
                                $row[name]
                            </div>
                            <div class='product_price text-center my-2'>
                                $row[price] руб.
                            </div>
                            <form class='d-flex justify-content-center flex-column my-2 gap-2' action='makeOrder.php'>
                                <input type='number' class='input' required placeholder='Количество' name='count'>
                                <input type='text' class='input' placeholder='Адресс' required name='address'>
                                <input type='text' value='{$row['id']}' hidden name='id_product'>
                                <button type='submit' class='btn btn-danger'>
                                    Заказать
                                </button>
                            </form>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
    <footer class="footer">
    </footer>
</div>
</body>
</html>