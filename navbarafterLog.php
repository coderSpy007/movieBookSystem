<?php
session_start();
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <header>
        <nav>
            <div class="container">
                <div class="nav-grid">
                    <div class="logo">
                        <h1>CS</h1>
                        <p class="cinema">cinema</p>
                    </div>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false"><img id="user" src="user1.png" alt="user" height="30px"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">ข้อมูลส่วนตัว</a></li>
                            <li><a class="dropdown-item" href="#">ประวัติการซื้อ</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Log out</a></li>
                        </ul>
                    </li>


                    <ul class="menu">
                        <li><a href="#">หน้าหลัก</a></li>
                        <li><a href="#">ภาพยนตร์</a></li>
                        <li><a href="#">โปรโมชั่น</a></li>
                        <li><a href="#">CS+</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1275px;
        width: 100%;
        margin: 0 auto;
    }

    header {
        width: 100%;
        height: 140px;
        background: #A1B7C4;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), inset 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .nav-grid {
        display: grid;
        grid-template-columns: repeat(autofit, minimax(200px, 1fr));
    }

    .logo {
        margin-top: 20px;
        color: #0F4C81;
    }

    .logo h1 {
        font-family: 'Audiowide';
        font-size: 56px;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .logo p {
        font-family: 'Kanit';
        font-size: 22px;
        margin-top: -18px;
        margin-left: 6px;
    }

    li.nav-item {
        display: grid;
        justify-items: right;
        font-family: 'Kanit';
        margin-top: -85px;
        list-style: none;
    }

    li.nav-item a {
        text-decoration: none;
        color: #0F4C81;
        transition: .1s ease-in-out;
        margin-right: 15px;
    }

    ul.sign li a:hover {
        color: aliceblue;
    }

    ul.menu {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        justify-items: center;
        margin-top: -20px;
        font-family: 'Kanit';
    }

    ul.menu li {
        list-style: none;
    }

    ul.menu li a {
        text-decoration: none;
        color: #0F4C81;
        transition: .1s ease-in-out;
    }

    ul.menu li a:hover {
        color: aliceblue;
    }
</style>