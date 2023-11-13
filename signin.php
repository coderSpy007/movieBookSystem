<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movix</title>
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container">
            <div class="grid">
                <form class="formsign" action="signin_db.php" method="post">

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

                    <label class="title">SIGN IN</label>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                            placeholder="email" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="inputPass" placeholder="password"
                            name="password">
                    </div>
                    <button type="submit" class="btn" name="login" id="signin">LOG IN</button>
                </form>
                <button type="submit" class="btn" id="signup" onclick="window.location.href = 'signup.php';">SIGN
                    UP</button>
            </div>
        </div>
    </section>
</body>

</html>
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
        grid-template-columns: repeat(2, 1fr);
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

    .title {
        display: grid;
        font-family: 'Open Sans';
        color: white;
        font-size: 24px;
        margin-left: 170px;
        margin-top: 30px;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(autofit, minimax(200px, 1fr));
        background-color: #FF9736;
        border-radius: 20px;
        width: 410px;
        height: 420px;
        margin-left: 400px;
        margin-top: 30px;
    }

    .mb-3 {
        grid-template-columns: repeat(autofit, minimax(400px, 1fr));
        margin-top: 30px;
        margin-left: 80px;
        width: 250px
    }

    .btn {
        margin-top: 20px;
        margin-left: 115px;
        font-family: 'Open Sans';
        background-color: #1B24FF;
        color: white;
        width: 180px;
        height: 40px;
    }

    #signup {
        margin-top: -30px;
    }
</style>