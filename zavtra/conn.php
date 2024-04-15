<?php
$log = '1';
    try {
        $conn = new PDO('mysql:host=localhost:3306;dbname=zavtra', 'root', '');
    }
    catch (PDOException $exception) {
        echo $exception;
    }

