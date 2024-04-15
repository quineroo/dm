<?php
session_start();
require "conn.php";


$count = $_GET['count'];
$id_user = $_SESSION['user']['id'];
$id_product = $_GET['id_product'];
$address = $_GET['address'];

$sql = "INSERT INTO zavtra.order (id_user, id_product, id_status, count, address) VALUES ($id_user, $id_product, 1, $count, '$address')";
$conn -> exec($sql);

header("Location: orders.php");

