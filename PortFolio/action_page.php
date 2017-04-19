<!DOCTYPE html>
<html>
    <title>Andréa Meinhardt | Portfolio 2017</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        /* Create a Parallax Effect */
        .bgimg-1, .bgimg-2, .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Première image (Logo. Full height) */
        .bgimg-1 {
            background-image: url('/w3images/parallax1.jpg');
            min-height: 100%;
        }

        /* Seconde image (Portfolio) */
        .bgimg-2 {
            background-image: url("/w3images/parallax2.jpg");
            min-height: 400px;
        }

        /* Troisième image (Contact) */
        .bgimg-3 {
            background-image: url("/w3images/parallax3.jpg");
            min-height: 400px;
        }

        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1, .bgimg-2, .bgimg-3 {
                background-attachment: scroll;
            }
        }
    </style>
    <body>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <div class="w3-bar" id="myNavbar">
                <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="pfolio.php" class="w3-bar-item w3-button">À PROPOS</a>
                <a href="cv.html" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> CURSUS</a>
                <a href="pfolio.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> COMPÉTENCES</a>
                <a href="pfolio.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PROJETS</a>
                <a href="pfolio.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> VEILLE</a>
                <a href="pfolio.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
                    <i class="fa fa-search"></i>
                </a>
            </div>

            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
                <a href="pfolio.php" class="w3-bar-item w3-button" onclick="toggleFunction()">À PROPOS</a>
                <a href="#cursus" class="w3-bar-item w3-button" onclick="toggleFunction()">CURSUS</a>
                <a href="pfolio.php" class="w3-bar-item w3-button" onclick="toggleFunction()">COMPÉTENCES</a>
                <a href="pfolio.php" class="w3-bar-item w3-button" onclick="toggleFunction()">PROJETS</a>
                <a href="pfolio.php" class="w3-bar-item w3-button" onclick="toggleFunction()">VEILLE</a>
                <a href="pfolio.php" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
                <a href="#" class="w3-bar-item w3-button">SEARCH</a>
            </div>
        </div>
    </body>
</html>