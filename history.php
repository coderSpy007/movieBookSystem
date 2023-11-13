<?php
require_once 'config/connect.php';
session_start();
$userID = $_SESSION['userID'];
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
                        <h1>MOVIX</h1>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false"><img id="user" src="user1.png" alt="user" height="30px"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="personal.php">PERSONAL INFORMATION</a></li>
                            <li><a class="dropdown-item" href="history.php">HISTORY TICKET</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">LOG OUT</a></li>
                        </ul>
                    </li>
                    <ul class="menu">
                        <li><a href="index.php">HOME</a></li>
                        <li class="movie">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">MOVIES</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="<?php echo 'nowShowing.php?userID=' . $userID; ?>">NOW
                                        SHOWING</a></li>
                                <li><a class="dropdown-item"
                                        href="<?php echo 'comingSoon.php?userID=' . $userID; ?>">COMING
                                        SOON</a></li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br><br>
    <main class="center">
        <?php
        $sql = "SELECT * FROM bookHistory WHERE user_ID = $userID";
        $all_movie = $conn->query($sql);

        while ($row = $all_movie->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="ticket">
                <div class="logo center">
                    <h1>MOVIX</h1>

                </div>
                <div class="image center">
                    <img src="art.webp"><br>

                </div>
                <br>
                <h2 class="movname">
                    <?php echo $row["movie_name"]; ?>
                </h2>

                <div class="branch center">
                    <img src="location.png">&nbsp&nbsp
                    <h5>
                        branch
                    </h5>&nbsp&nbsp
                    <h5>
                        date
                    </h5>&nbsp&nbsp
                    <h5>
                        time
                    </h5>

                </div>

                <div class="seat">
                    <p class="seatno">seat no</p>
                    <h5>
                        seat
                    </h5>
                </div>
            </div>


            <?php
        }
        ?>
    </main>


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

    li.nav-item {
        display: grid;
        justify-items: right;
        font-family: 'Open Sans';
        margin-top: -65px;
        list-style: none;
    }

    li.nav-item a {
        text-decoration: none;
        color: #130089;
        transition: .1s ease-in-out;
        margin-right: 15px;
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


    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .center {
        justify-content: center;
        align-items: center;
    }

    main .ticket {
        font-family: 'Open Sans';
        max-width: 400px;
        text-align: center;
        background-color: whitesmoke;
        width: 400px;
        height: 620px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        border-radius: 30px;
        margin-bottom: 100px;
    }

    .logo.center {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    main .ticket .branch {
        display: flex;
        flex-direction: row;

    }

    .branch img {

        align-items: center;
        height: 20px;
    }

    main .ticket .image {
        height: 220px;
    }

    main .ticket .image img {
        width: 50%;
        height: 100%;
        object-fit: cover;
    }

    main .ticket .seat .seatno {
        color: grey;
    }

    .code {
        font-family: 'Open Sans';
        text-align: center;
        margin-bottom: 300px;
    }

    .ran {
        color: red;
    }

    .thx {
        color: green;
    }
</style>