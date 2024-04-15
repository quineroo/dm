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
        <div class="row p-3">
            <?php
            $sqlGetOrders = "SELECT order.id, user.full_name as FIO, product.name as productName, product.price as price, status.name as status, order.count  
                        FROM zavtra.order 
                        INNER JOIN product ON order.id_product = product.id
                        INNER JOIN status ON order.id_status = status.id
                        INNER JOIN user ON order.id_user = user.id
                    ";
            $result = $conn -> query($sqlGetOrders);
            while($row = $result -> fetch()) {
                $finalPrice = $row['count'] * $row['price'];
                echo "
                        <div class='col-4 border p-3'>
                            <div class='product_title text-center my-2'>
                                Заказа №$row[id]
                            </div>
                            <div class='product_title text-center my-2'>
                                Пользователь: $row[FIO]
                            </div>
                            <div class='product_price text-center my-2'>
                                Название товара: $row[productName]
                            </div>
                            <div class='product_price text-center my-2'>
                                $finalPrice руб.
                            </div>
                            <div class='product_price text-center my-2'>
                                Статус: $row[status]
                            </div>
                            <form class='d-flex gap-3 justify-content-center' method='post''>
                                <a href='changeStatus.php?id_product=$row[id]&newStatus=2' class='btn btn-primary' type='submit' name='confirm'>
                                    Подтвердить
                                </a>
                                <a href='changeStatus.php?id_product=$row[id]&newStatus=3' class='btn btn-danger'>
                                    Отклонить
                                </a>
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