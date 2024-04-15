<?php
    session_start();
    require "conn.php";

    if(isset($_POST['reg'])) {
        $FIO = $_POST['FIO'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (id_role, login, password, full_name, phone, email) VALUES (1, '$login', '$password', '$FIO', '$phone', '$email')";
        $conn -> exec($sql);
        header("Location: log.php");
    }


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
               <form method="post">
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">ФИО</label>
                       <input name="FIO" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Телефон</label>
                       <input name="phone" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Логин</label>
                       <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Почта</label>
                       <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Пароль</label>
                       <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <button type="submit" class="btn btn-primary" name="reg">Зарегестрироваться</button>
               </form>
           </div>
           <footer class="footer">
           </footer>
       </div>
</body>
</html>