<?php
require "conn.php";
    if(isset($_GET['abort_session'])) {
        unset($_SESSION['user']);
        header('Location: log.php');
    }
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-items-center">
                <?php
                    if(isset($_SESSION['user'])) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="products.php">Товары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="orders.php">Заказы</a>
                        </li>
                        ';
                        if($_SESSION['user']['id_role'] === 2) {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Админ Панель</a>
                            </li>
                        ';
                        }
                    } else {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="reg.php">Зарегестрироваться</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="log.php">Войти</a>
                        </li>
                        ';
                    }

                ?>
            </ul>
            <?php
                if(isset($_SESSION['user'])) {
                    echo '
                    <form method="get">
                        <button class="btn btn-danger border" type="submit" name="abort_session">
                            Выйти
                        </button>
                    </form>
                    ';
                }
            ?>
        </div>
    </div>
</nav>