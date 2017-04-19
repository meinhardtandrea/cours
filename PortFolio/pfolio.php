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

        /* Créer un effet Parallax */
        .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Première image (Accueil) */
        .bgimg-1 {
            background-image: url('assets/pf_pc.jpg');
            min-height: 100%;
        }

        /* Seconde image (Projets) */
        .bgimg-2 {
            background-image: url('assets/pf_projets.jpg');
            min-height: 400px;
        }

        /* Troisième image (Veille) */
        .bgimg-3 {
            background-image: url('assets/pf_veille.png');
            min-height: 400px;
        }

        /* Quatrième image (Contact) */
        .bgimg-4 {
            background-image: url('assets/pf_contact.jpg');
            min-height: 400px;
        }

        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4 {
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
                <a href="#a_propos" class="w3-bar-item w3-button">À PROPOS</a>
                <a href="#cursus" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> CURSUS</a>
                <a href="#competences" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> COMPÉTENCES</a>
                <a href="#projets" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PROJETS</a>
                <a href="#veille" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> VEILLE</a>
                <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
                <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
                    <i class="fa fa-search"></i>
                </a>
            </div>

            <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
                <a href="#a_propos" class="w3-bar-item w3-button" onclick="toggleFunction()">À PROPOS</a>
                <a href="#cursus" class="w3-bar-item w3-button" onclick="toggleFunction()">CURSUS</a>
                <a href="#competences" class="w3-bar-item w3-button" onclick="toggleFunction()">COMPÉTENCES</a>
                <a href="#projets" class="w3-bar-item w3-button" onclick="toggleFunction()">PROJETS</a>
                <a href="#veille" class="w3-bar-item w3-button" onclick="toggleFunction()">VEILLE</a>
                <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
                <a href="#" class="w3-bar-item w3-button">SEARCH</a>
            </div>
        </div>

        <!-- Première image Parallax avec le titre "MON PORTFOLIO 2017" -->
        <div class="bgimg-1 w3-display-container w3-opacity-min" id="a_propos">
            <div class="w3-display-middle" style="white-space:nowrap;">
                <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">ANDRÉA MEINHARDT <span class="w3-hide-small">|</span> PORTFOLIO 2017</span>
            </div>
        </div>

        <!-- Container (Section CURSUS) -->
        <div class="w3-content w3-container w3-padding-64" id="cursus">
            <h3 class="w3-center">CURSUS</h3>
            <p>Précédemment responsable marketing d’une start-up spécialisée dans les biocomposites à destination du bâtiment et de l’éco-construction, je suis actuellement en reconversion professionnelle. J’ai en effet le projet de devenir développeuse informatique.</p>
            <p class="w3-center"><em>Les raisons de ma reconversion professionnelle</em></p>
            <ul class="w3-center">
                <li></li>
                <li>Le manque d'offres adaptées à mon profil</li>
            </ul>
            <p></p>
            <div class="w3-row">
                <div class="w3-col m6 w3-center w3-padding-large">
                    <p><b><i class="fa fa-user w3-margin-right"></i>Andréa MEINHARDT</b></p><br>
                    <img src="andrea.jpg" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me" width="500" height="333">
                </div>

                <!-- 2eme partie : le projet professionnel -->
                <div class="w3-col m6 w3-hide-small w3-padding-large">
                    <p class="w3-center"><em>Mon projet professionnel</em></p>
                    <p>Je souhaite exercer ce métier durant 3 à 5 années, le temps de rassembler les fonds nécessaires à la création de ma propre web agency, de développer mon réseau et surtout d’acquérir suffisamment d’expérience terrain.</p>
                    <p>Pour réaliser ce projet ambitieux, j’ai intégré une formation qualifiante – à savoir un BTS Services informatiques aux organisations option B solutions logicielles et applications métiers (SLAM) – qui me permet d’acquérir toutes les connaissances nécessaires dans le domaine de la conception et du développement informatique.</p>
                    <p class="w3-center"><a href="cv.html" target="_blank"><button class="w3-button w3-padding-large" style="margin-top:64px">CONSULTER MON CV</button></a></p>
                </div>
            </div>


            <!-- Container (Section Compétences) -->
            <div class="w3-content w3-container w3-padding-64" id="competences">
                <h3 class="w3-center">COMPÉTENCES</h3>
                <p class="w3-large w3-center w3-padding-16">Mes domaines de compétences:</p>
                <p class="w3-wide"><i class="fa fa-laptop"></i>Programmation</p>
                <div class="w3-light-grey">
                    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:65%">65%</div>
                </div>
                <p class="w3-wide"><i class="fa fa-photo"></i>Web Design</p>
                <div class="w3-light-grey">
                    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:75%">75%</div>
                </div>
                <p class="w3-wide"><i class="fa fa-laptop"></i>Marketing</p>
                <div class="w3-light-grey">
                    <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:90%">90%</div>
                </div>
                <div class="w3-center">
                <a href="assets/grille.xls" target="_blank"><button class="w3-button w3-padding-large" style="margin-top:64px">CONSULTER MA GRILLE DE COMPÉTENCES</button></a>
                </div>
                </div>
        </div>
        <div class="w3-row w3-center w3-dark-grey w3-padding-16">
            <div class="w3-quarter w3-section">
                <span class="w3-xlarge">14+</span><br>
                Partners
            </div>
            <div class="w3-quarter w3-section">
                <span class="w3-xlarge">55+</span><br>
                Projets réalisés
            </div>
            <div class="w3-quarter w3-section">
                <span class="w3-xlarge">89+</span><br>
                Happy Clients
            </div>
            <div class="w3-quarter w3-section">
                <span class="w3-xlarge">150+</span><br>
                Rencontres
            </div>
        </div>

        <!-- Seconde Image Parallax avec le texte "PROJETS" -->
        <div class="bgimg-2 w3-display-container w3-opacity-min">
            <div class="w3-display-middle">
                <span class="w3-xxlarge w3-text-black w3-wide">PROJETS</span>
            </div>
        </div>

        <!-- Container (Section Projets) -->
        <div class="w3-content w3-container w3-padding-64" id="projets">
            <h3 class="w3-center">MY WORK</h3>
            <p class="w3-center"><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

            <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
            <div class="w3-row-padding w3-center">
                <div class="w3-col m3">
                    <img src="/w3images/p1.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Coffee beans">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p3.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Bear closeup">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p4.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Quiet ocean">
                </div>
            </div>

            <div class="w3-row-padding w3-center w3-section">
                <div class="w3-col m3">
                    <img src="/w3images/p5.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p6.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="My beloved typewriter">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p7.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Empty ghost train">
                </div>

                <div class="w3-col m3">
                    <img src="/w3images/p8.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Sailing">
                </div>
                <button class="w3-button w3-padding-large" style="margin-top:64px">LOAD MORE</button>
            </div>
        </div>

        <!-- Modal for full size images on click-->
        <div id="modal01" class="w3-modal w3-black" onclick="this.style.display = 'none'">
            <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
            <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                <img id="img01" class="w3-image">
                <p id="caption" class="w3-opacity w3-large"></p>
            </div>
        </div>

        <!-- Troisième Image Parallax avec le texte "Veille" -->
        <div class="bgimg-3 w3-display-container w3-opacity-min">
            <div class="w3-display-middle">
                <span class="w3-xxlarge w3-text-black w3-wide"></span>
            </div>
        </div>

        <!-- Container (Section Veille) -->
        <div class="w3-content w3-container w3-padding-64" id="veille">
            <h3 class="w3-center">LES ÉCRANS TACTILES TRANSPARENTS</h3>
            <p class="w3-center"><em>Pour ma veille technologique, j'ai choisi d'étudier les écrans tactiles transparents.</em></p><br>
            <!-- Présentation du thème de veille -->
            <div class="w3-row">
                <!-- 1ere partie : Vidéo -->
                <div class="w3-col m6 w3-center w3-padding-large">
                    <p><b><i class="fa fa-laptop w3-margin-right"></i>L'avenir des écrans tactiles 2025</b></p><br>
                    <iframe width="430" height="315" src="https://www.youtube.com/embed/U-8NRaL5WzE" frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- 2eme partie : Présentation du thème de veille -->
                <div class="w3-col m6 w3-hide-small w3-padding-large">
                    <p class="w3-center"><em>Outils et méthodologie </em></p>
                    <p></p>
                </div>
            </div>
            <div class="w3-row-padding w3-center w3-section">
                <a href="http://www.scoop.it/u/andrea-107" target="_blank"><button class="w3-button w3-padding-large" style="margin-top:64px">CONSULTER MA VEILLE TECHNOLOGIQUE</button></a>
            </div>
        </div>

        <!-- Modal for full size images on click-->
        <div id="modal01" class="w3-modal w3-black" onclick="this.style.display = 'none'">
            <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
            <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                <img id="img01" class="w3-image">
                <p id="caption" class="w3-opacity w3-large"></p>
            </div>
        </div>

        <!-- Quatrième Image Parallax Image avec le texte "CONTACT" -->
        <div class="bgimg-4 w3-display-container w3-opacity-min">
            <div class="w3-display-middle">
                <span class="w3-xxlarge w3-text-black w3-wide">CONTACT</span>
            </div>
        </div>

        <!-- Container (Section Contact) -->
        <div class="w3-content w3-container w3-padding-64" id="contact">
            <h3 class="w3-center">MON LIEU DE TRAVAIL</h3>
            <p class="w3-center"><em>Partagez vos impressions !</em></p>

            <div class="w3-row w3-padding-32 w3-section">
                <div class="w3-col m4 w3-container">
                    <!-- Google Maps -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.857082174803!2d3.8707707513198195!3d43.609517263169344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6afa833380445%3A0xf1f5002fd8048739!2s19+Rue+Terral%2C+34000+Montpellier!5e0!3m2!1sfr!2sfr!4v1491839245403" width="300" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="w3-col m8 w3-panel">
                    <div class="w3-large w3-margin-bottom">
                        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> 19 rue Terral, 34 000 Montpellier<br>
                        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> 06.08.22.10.94<br>
                        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> meinhardt.andrea@gmail.com<br>
                    </div>
                    <p>Passez prendre un <i class="fa fa-coffee"></i>, ou laissez une note :</p>
                    <form method="POST" action="action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Nom">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                        <button class="w3-button w3-black w3-right w3-section" type="submit">
                            <i class="fa fa-paper-plane"></i> ENVOYER
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
            <a href="#a_propos" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Haut de page</a>
            <div class="w3-xlarge w3-section">
                <a href="https://www.linkedin.com/in/andreameinhardt/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
                <a href="https://twitter.com/AndreaMeinh" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i></a>
            </div>
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
        </footer>

        <!-- Google Maps -->
        <script>
            function myMap()
            {
                myCenter = new google.maps.LatLng(41.878114, -87.629798);
                var mapOptions = {
                    center: myCenter,
                    zoom: 12, scrollwheel: false, draggable: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

                var marker = new google.maps.Marker({
                    position: myCenter,
                });
                marker.setMap(map);
            }

            // Modal Image Gallery
            function onClick(element) {
                document.getElementById("img01").src = element.src;
                document.getElementById("modal01").style.display = "block";
                var captionText = document.getElementById("caption");
                captionText.innerHTML = element.alt;
            }

            // Change style of navbar on scroll
            window.onscroll = function () {
                myFunction()
            };
            function myFunction() {
                var navbar = document.getElementById("myNavbar");
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-white";
                } else {
                    navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
                }
            }

            // Used to toggle the menu on small screens when clicking on the menu button
            function toggleFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
        <!--
        To use this code on your website, get a free API key from Google.
        Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
        -->

    </body>
</html>
