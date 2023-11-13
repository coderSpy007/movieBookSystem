<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
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
    <title>adminpage</title>
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

                            <li><a class="dropdown-item" href="logout.php">LOG OUT</a></li>
                        </ul>
                    </li>
                    <ul class="menu">
                        <li><a href="index.php">HOME</a></li>
                        <li class="movie">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">MOVIE</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin.php">Add movie in Now Showing</a></li>
                                <li><a class="dropdown-item" href="admin2.php">Add movie in Coming Soon</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1 class="addMov">Add Movie (Now Showing)</h1>

    <form action="admin_db.php" method="post">

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>

        <div class="mb-3" id="first">
            <label for="firstname" class="form-label">Add movie name</label>
            <input type="text" class="form-control" name="moviename" aria-describedby="firstname" id="infirst">
        </div>
        <div class="mb-3" id="sec">
            <label for="firstname" class="form-label">Add movie lenght</label>
            <input type="text" class="form-control" name="mlength" aria-describedby="firstname" id="infirst">
        </div>
        <div class="mb-3" id="thrid">
            <label for="firstname" class="form-label">Add type of movie</label>
            <input type="text" class="form-control" name="mType" aria-describedby="firstname" id="type">
        </div>
        <div class="mb-3" id="four">
            <label for="firstname" class="form-label">Add date of movie show</label>
            <input type="text" class="form-control" name="release" aria-describedby="firstname" id="infirst">
        </div>
        <div class="mb-3" id="fif">
            <label for="firstname" class="form-label">Add detail of movie</label>
            <input type="text" class="form-control" name="detail" aria-describedby="firstname" id="detail">
        </div>
        <div class="mb-3" id="six">
            <label for="firstname" class="form-label">Add actor</label>
            <input type="text" class="form-control" name="actor" aria-describedby="firstname" id="actor">
        </div>
        <div class="mb-3" id="sev">
            <label for="firstname" class="form-label">Add image</label>
            <input type="text" class="form-control" name="movieimage" aria-describedby="firstname" id="infirst">
        </div>
        <div class="mb-3" id="eig">
            <label for="firstname" class="form-label">Add director</label>
            <input type="text" class="form-control" name="director" aria-describedby="firstname" id="infirst">
        </div>
        <div class="but">
            <button type="submit" class="btn" id="signup" name="add"><a>ADD MOVIE</a></button>
        </div>


    </form>




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

    .seatSelect,
    .theatre,
    .time {
        font-family: 'Open Sans';
        color: #130089;
        margin-bottom: 80px;
        margin-top: 50px;
        text-align: center;
    }

    .movName {
        text-align: center;
        margin-top: 50px;
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

    .addMov {
        font-family: 'Open Sans';
        color: #130089;
        margin-top: 60px;
        font-size: 40px;
        margin-left: 40px;
    }

    #first,
    #sec,
    #thrid,
    #four,
    #fif,
    #six,
    #sev,
    #eig {
        font-family: 'Open Sans';
    }

    .mb-3 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        justify-items: center;
        font-family: 'Kanit';
        margin-top: 60px;
        width: 900px;
    }

    .btn {
        font-family: 'Open Sans';
        background-color: #130089;
        color: white;
        width: 180px;
        text-align: center;
    }

    .but {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        margin-bottom: 100px;
        /* Adjust the height to match your desired container */
    }
</style>