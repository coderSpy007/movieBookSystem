<?php
require_once 'config/connect.php';
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
              <a href="signin.php"><img id="user" src="iconUser.png" alt="user" height="20px">&nbsp&nbspSIGN IN/SIGN
                UP</a>
            </li>
          </ul>

          <ul class="menu">
            <li><a href="#">HOME</a></li>
            <li><a href="#">MOVIE</a></li>
            <li><a href="#">SHOWTIMES</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section>
    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="gd.jpeg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="cn.webp" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="fx.jpeg" style="width:100%">
      </div>
    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </section>
  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1 }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 3500);
    }
  </script>
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
    transition: .1s ease-in-out;
  }

  ul.menu li a:hover {
    color: orange;
  }

  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.2s ease;
  }

  .active {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 3.5s;
  }

  @keyframes fade {
    from {
      opacity: 0.6
    }

    to {
      opacity: 1
    }
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .text {
      font-size: 11px
    }
  }

  section {
    margin-top: 50px;
  }
</style>