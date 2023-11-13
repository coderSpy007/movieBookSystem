<?php
require_once 'config/connect.php';
session_start();
$movID = $_GET['movie_ID'];
$userID = $_SESSION['userID'];
?>
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

    <?php
    $sql3 = "SELECT movie_name FROM movie WHERE movie_ID = $movID";
    $all_info3 = $conn->query($sql3);
    $row3 = $all_info3->fetch(PDO::FETCH_ASSOC) ?>
    <h3 class="movName">
        <?php echo $row3['movie_name'] ?>
    </h3>

    <?php
    $sql2 = "SELECT theatre FROM showtimes WHERE movID= $movID";
    $theatre = $conn->query($sql2);

    $sql4 = "SELECT time FROM showtimes WHERE movID= $movID";
    $time = $conn->query($sql4);
    ?>
    <div class="theatre">

        <select name="tNo" class="form-select" aria-label="Default select example">
            <option selected>Select Theatre</option>
            <?php
            $selectT = "";
            while ($row2 = $theatre->fetch(PDO::FETCH_ASSOC)) {
                $selectT = $row2["theatre"];
                ?>
                <option value="<?php echo $row2["theatre"]; ?>">
                    <?php echo $row2["theatre"]; ?>
                </option>
                <?php
            }
            ?>
        </select>


    </div>
    <h5 class="seat2"></h5>
    <div class="time">

        <select name="timeNo" class="form-select" aria-label="Default select example">
            <option selected>Select Time</option>
            <?php
            $selectedTime = "";
            while ($row4 = $time->fetch(PDO::FETCH_ASSOC)) {
                $selectedTime = $row4["time"];
                ?>
                <option value="<?php echo $row2["time"]; ?>">
                    <?php echo $row4["time"]; ?>
                </option>
                <?php
            }
            ?>
        </select>


    </div>
    <div class="container">
        <div class="screen"></div>
        <div class="seatB">
            <h4>B</h4>
            <div class="seatB1"></div>
            <div class="seatB2"></div>
            <div class="seatB3"></div>
            <div class="seatB4"></div>
        </div>
        <div class="numB">
            <h4></h4>
            <h4>B1</h4>
            <h4>B2</h4>
            <h4>B3</h4>
            <h4>B4</h4>
        </div>
        <div class="statusB">
            <h4></h4>
            <?php
            // Loop through each seat in 'B' category and display the seat status
            for ($i = 1; $i <= 4; $i++) {
                $seatNum = "B" . $i;
                $sqlSeatStatus = "SELECT seatStatus FROM theatre1 WHERE seatNum = :seatNum AND tTime = :selectedTime AND tNum = :selectT";
                $stmtSeatStatus = $conn->prepare($sqlSeatStatus);
                $stmtSeatStatus->bindParam(':seatNum', $seatNum);
                $stmtSeatStatus->bindParam(':selectedTime', $selectedTime);
                $stmtSeatStatus->bindParam(':selectT', $selectT);
                $stmtSeatStatus->execute();
                $rowSeatStatus = $stmtSeatStatus->fetch(PDO::FETCH_ASSOC);
                echo '<h4>' . $rowSeatStatus['seatStatus'] . '</h4>';
            }
            ?>
        </div>

        <div class="seatA">
            <h4>A</h4>
            <div class="seatA1"></div>
            <div class="seatA2"></div>
            <div class="seatA3"></div>
            <div class="seatA4"></div>
        </div>

        <div class="numA">
            <h4></h4>
            <h4>A1</h4>
            <h4>A2</h4>
            <h4>A3</h4>
            <h4>A4</h4>
        </div><br><br>

        <div class="statusA">
            <h4></h4>
            <?php
            for ($i = 1; $i <= 4; $i++) {
                $seatNum = "A" . $i;
                $sqlSeatStatus = "SELECT seatStatus FROM theatre1 WHERE seatNum = :seatNum AND tTime = :selectedTime AND tNum = :selectT";
                $stmtSeatStatus = $conn->prepare($sqlSeatStatus);
                $stmtSeatStatus->bindParam(':seatNum', $seatNum);
                $stmtSeatStatus->bindParam(':selectedTime', $selectedTime);
                $stmtSeatStatus->bindParam(':selectT', $selectT);
                $stmtSeatStatus->execute();
                $rowSeatStatus = $stmtSeatStatus->fetch(PDO::FETCH_ASSOC);
                echo '<h4>' . $rowSeatStatus['seatStatus'] . '</h4>';
            }
            ?>
        </div>

        <div class="seatAA">
            <h4>AA</h4>
            <div class="seatAA1"></div>
            <div class="seatAA2"></div>
            <div class="seatAA3"></div>
            <div class="seatAA4"></div>
        </div>
        <div class="numAA">
            <h4></h4>
            <h4>AA1</h4>
            <h4>AA2</h4>
            <h4>AA3</h4>
            <h4>AA4</h4>
        </div><br><br>
        <div class="statusA">
            <h4></h4>
            <?php
            // Loop through each seat in 'B' category and display the seat status
            for ($i = 1; $i <= 4; $i++) {
                $seatNum = "AA" . $i;
                $sqlSeatStatus = "SELECT seatStatus FROM theatre1 WHERE seatNum = :seatNum AND tTime = :selectedTime AND tNum = :selectT";
                $stmtSeatStatus = $conn->prepare($sqlSeatStatus);
                $stmtSeatStatus->bindParam(':seatNum', $seatNum);
                $stmtSeatStatus->bindParam(':selectedTime', $selectedTime);
                $stmtSeatStatus->bindParam(':selectT', $selectT);
                $stmtSeatStatus->execute();
                $rowSeatStatus = $stmtSeatStatus->fetch(PDO::FETCH_ASSOC);
                echo '<h4>' . $rowSeatStatus['seatStatus'] . '</h4>';
            }
            ?>
        </div>
    </div>

    <div class="seatSelect">
        <form action="showtimes_db.php" method="POST">

            <select name="sNo" class="form-select" aria-label="Default select example"
                onchange="calculateAmount(this.value)" required>
                <option selected>Select Seat</option>
                <?php
                $sql = "SELECT * FROM theatre1 WHERE seatStatus = 'available' AND tNum=$selectT AND tTime = $selectedTime";
                $all_info = $conn->query($sql);
                while ($row = $all_info->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo $row["seatNum"]; ?>">
                        <?php echo $row["seatNum"]; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <br>
            <label><b>Total Price</b></label>
            <input class="w3-input w3-border" name="tot_amount" id="tot_amount" type="text" readonly>
            <label><b>THB</b></label>
            <script>

                function calculateAmount(val) {
                    var tot_price;
                    if (val == 'B1' || val == 'B2' || val == 'B3' || val == 'B4') {
                        tot_price = 250;
                    }
                    else if (val == 'A1' || val == 'A2' || val == 'A3' || val == 'A4') {
                        tot_price = 350;
                    }
                    else if (val == 'AA1' || val == 'AA2' || val == 'AA3' || val == 'AA4') {
                        tot_price = 500;
                    }
                    else tot_price = 0;
                    /*display the result*/
                    var divobj = document.getElementById('tot_amount');
                    divobj.value = tot_price;
                }
            </script>
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

    .container {
        position: relative;
        z-index: 1;
        max-width: 1000px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    .container .screen {
        margin: 50px auto;
        background-color: #F3F3F3;
        height: 100px;
        width: 800px;
        margin-top: 50px;
    }

    .container .seatB,
    .container .seatB .h4 {
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 750px;

    }

    .container .numB {
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 730px;
        margin-top: -40px;
    }

    .container .statusB,
    .container .statusA,
    .container .statusAA {
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 780px;
        margin-top: -40px;
    }




    .container .seatB1,
    .container .seatB2,
    .container .seatB3,
    .container .seatB4 {
        background-color: #4886FF;
        height: 50px;
        width: 50px;
        border-radius: 8px;
    }

    .container .seatA,
    .container .seatA .h4 {
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 770px;

    }

    .container .numA {
        margin: auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 730px;
        margin-top: -40px;
    }



    .container .seatA1,
    .container .seatA2,
    .container .seatA3,
    .container .seatA4 {
        background-color: #0500FF;
        height: 50px;
        width: 70px;
        border-radius: 8px;
    }

    .container .seatAA,
    .container .seatAA .h4 {
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 790px;

    }

    .container .numAA {
        margin: auto;
        display: grid;
        grid-template-columns: repeat(5, 140px);
        max-width: 740px;
        margin-top: -40px;
    }


    .container .seatAA1,
    .container .seatAA2,
    .container .seatAA3,
    .container .seatAA4 {
        background-color: #8000FF;
        height: 50px;
        width: 90px;
        border-radius: 8px;
    }

    .price {
        margin-bottom: 10%;
    }

    #tot_amount {
        width: 8%;
    }
</style>

</html>