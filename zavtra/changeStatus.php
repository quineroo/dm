<?php
$id_product = $_GET['id_product'];
$newStatus = $_GET['newStatus'];
$conn = new PDO('mysql:host=localhost:3306;dbname=zavtra', 'root', '');

    $sql = "UPDATE zavtra.order SET order.id_status = $newStatus WHERE order.id = $id_product";
    $conn -> exec($sql);
    header("Location: admin.php");
