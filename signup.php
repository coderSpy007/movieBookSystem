<?php
session_start();
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cs Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <header>
        <nav>
            <div class="container">
                <div class="nav-grid">
                    <div class="logo">
                        <h1>MOVIX</h1>
                    </div>
                    <ul class="sign">
                        <li>
                            <a href="signin.php"><img id="user" src="iconUser.png" alt="user"
                                    height="20px">&nbsp&nbspSIGNIN/SIGNUP</a>
                        </li>
                    </ul>

                    <ul class="menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="#">MOVIES</a></li>
                        <li><a href="#">SHOWTIMES</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="body">
        <h4 class="mt-5">SIGNUP</h4>
        <form action="signup_db.php" method="post">

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="infoFirst">
                <div class="mb-3" id="email">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="email" id="inemail">
                </div>
                <div class="mb-3" id="pass">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" id="inpass">
                </div>
                <div class="mb-3" id="veri">
                    <label for="verify password" class="form-label">verify password</label>
                    <input type="password" class="form-control" name="c_password" id="inveri">
                </div>
            </div>
            <div class="infoSec">
                <div class="mb-3" id="first">
                    <label for="firstname" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="firstname" aria-describedby="firstname" id="infirst">
                </div>
                <div class="mb-3" id="last">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" name="lastname" aria-describedby="lastname" id="inlast">
                </div>
                <div class="mb-3" id="ident">
                    <label for="ident" class="form-label">เลขบัตรประชาชน</label>
                    <input type="number" class="form-control" name="ident" id="inident">
                </div>
                <div class="mb-3" id="birth">
                    <label for="birth" class="form-label">วัน/เดือน/ปีเกิด</label>
                    <input type="text" class="form-control" name="birth" id="inbirth">
                </div>
            </div>


            <!--<label class="locate">ที่อยู่</label>-->

            <div class="firstThree">
                <div class="mb-3" id="home">
                    <label for="homenumber" class="form-label">บ้านเลขที่</label>
                    <input type="number" class="form-control" name="homenum" id="inhome">
                </div>
                <div class="mb-3" id="sub">
                    <label for="subdistrict" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" name="subdis" id="insub">
                </div>
                <div class="mb-3" id="dis">
                    <label for="district" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" name="dis" id="indis">
                </div>
            </div>

            <div class="secThree">
                <div class="mb-3" id="street">
                    <label for="street" class="form-label">ถนน</label>
                    <input type="text" class="form-control" name="street" id="instreet">
                </div>
                <div class="mb-3" id="pro">
                    <label for="province" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" name="province" id="inpro">
                </div>
                <div class="mb-3" id="post">
                    <label for="post" class="form-label">รหัสไปรษณีย์</label>
                    <input type="number" class="form-control" name="post" id="inpost">
                </div>
            </div>

            <div class="lastThree">
                <div class="mb-3" id="phone">
                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="number" class="form-control" name="phone" id="inphone">
                </div>

            </div>

            <div class="but">
                <button type="submit" class="btn" id="signup" name="signup"><a>SIGNUP</a></button>
            </div>


        </form>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Open+Sans:wght@700&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1275px;
        width: 100%;
        margin: 0 auto;
        justify-content: center;
    }

    header {
        width: 100%;
        height: 140px;
        background: #F3F3F3;
    }

    .nav-grid {
        display: grid;
        grid-template-columns: repeat(autofit, minimax(200px, 1fr));
    }

    .logo {
        margin-top: 20px;
        color: #130089;
    }

    .logo h1 {
        font-family: 'Luckiest Guy';
        font-size: 56px;
        margin-left: 30px;
        margin-top: 18px;
    }

    ul.sign {
        display: grid;
        justify-items: right;
        font-family: 'Open Sans';
        font-size: 14px;
        margin-top: -60px;
        margin-right: 30px;
    }

    ul.sign li {
        list-style: none;
    }

    ul.sign li a {
        text-decoration: none;
        color: #130089;
        transition: .1s ease-in-out;
    }

    ul.sign li a:hover {
        color: orange;
    }

    ul.menu {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        justify-items: center;
        margin-top: -10px;
        font-size: 20px;
        font-family: 'Open Sans';
    }

    ul.menu li {
        list-style: none;
    }

    ul.menu li a {
        text-decoration: none;
        color: #130089;
        transition: .0s ease-in-out;
    }

    ul.menu li a:hover {
        color: orange;
    }

    h4 {
        font-family: 'Open Sans';
        color: #130089;
        text-align: center;
    }

    .mb-3 {
        margin-top: 60px;
    }

    #email,
    #pass,
    #veri,
    #first,
    #last,
    #ident,
    #birth,
    #home,
    #sub,
    #dis,
    #street,
    #pro,
    #post,
    #phone {
        width: 200px;
    }

    .infoFirst,
    .infoSec {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        justify-items: center;
        font-family: 'Open Sans';
    }

    .firstThree,
    .secThree,
    .lastThree {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        justify-items: center;
        font-family: 'Open Sans';
    }

    .but {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        justify-items: center;
        margin-top: 50px;
        margin-bottom: 80px;
    }

    #cs {
        font-family: 'Kanit';
        background-color: #516091;
        color: white;
    }

    #signup a {
        text-decoration: none;
        color: white;
    }

    #cs a {
        text-decoration: none;
        color: white;
    }

    .btn {
        justify-content: center;
        font-family: 'Open Sans';
        background-color: #1B24FF;
        color: white;
        width: 180px;
        height: 40px;
    }
</style>