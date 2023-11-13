<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing</title>
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
                                        href="<?php echo 'nowShowing.php?userID=' . $userID; ?>">NOW SHOWING</a></li>
                                <li><a class="dropdown-item"
                                        href="<?php echo 'comingSoon.php?userID=' . $userID; ?>">COMING SOON</a></li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <h1 class="nowShowing">Now Showing</h1>
    <main>
        <?php

        require_once 'config/connect.php';
        session_start();
        $_SESSION['movie_ID'] = $movID;
        $userID = $_SESSION['userID'];
        $sql = "SELECT * FROM movie";

        $all_movie = $conn->query($sql);

        while ($row = $all_movie->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["M_image"]; ?>" alt="">
                </div>
                <div class="title">
                    <h6>
                        <?php echo $row["movie_name"]; ?>
                    </h6>
                </div>
                <div class="release">
                    <p>
                        <?php echo $row["release_date"]; ?>
                    </p>

                    <button type="button" class="btn btn-primary"> <a
                            href="showtimes.php?movie_ID=<?php echo $row["movie_ID"]; ?>" class="booking">
                            Booking
                        </a> </button>

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


    .nowShowing {
        font-family: 'Open Sans';
        color: #130089;
        margin-top: 60px;
        font-size: 40px;
        margin-left: 40px;
    }



    main {
        max-width: 1500px;
        width: 95%;
        margin: 30px auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: auto;

    }

    main .card {
        max-width: 300px;
        flex: 1 1 210px;
        text-align: center;
        height: 550px;
        background: #FEFDFD;
        border: 1px solid lightgrey;
        margin: 20px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
    }

    main .card .image {
        height: 72%;
        margin-bottom: 20px;
    }

    main .card .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    main .card .title {
        text-align: center;
        line-height: 3em;
        height: 25%;
    }

    main .card .title h6 {
        font-family: 'Open Sans';
        color: #130089;
        font-size: 1.1em;
    }

    main .card .release {
        text-align: center;
        margin-bottom: 60px;
        height: 25%;
    }

    main .card .release p {
        color: #130089;
        font-size: 1.1em;
    }

    .btn.btn-primary {
        width: 50%;
        cursor: pointer;
        font-weight: bold;
        position: relative;
        color: white;
        background-color: #130089;

    }

    .booking {
        color: #F3F3F3;
    }
</style>

</html>