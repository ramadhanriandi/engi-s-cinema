<?php
session_start();
if ($_SESSION['id'] == null) {
    header("Location: login");
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Detail Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../public/assets/css/layout.css">
        <script type="text/javascript" src="../public/assets/js/booking_detail.js"></script>
        <script type="text/javascript" src="../public/assets/js/seats_detail.js"></script>
        <script type="text/javascript" src="../public/assets/js/submit_booking.js"></script>
    </head>
    <body>
        <div id="overlay">
            <div id="movie-showing-id">
            </div>
        </div>
        <div class="navbar__wrapper">
            <nav class="navbar layout__wrapper">
                <div class="navbar__group">
                    <div class="navbar__logo">
                        <span>Engi</span>ma
                    </div>
                    <div class="navbar__search">
                        <img 
                            src="../public/assets/img/search.png" 
                            class="navbar__search-img" 
                            aria-hidden="true"
                        >
                        <input 
                            class="navbar__search-bar" 
                            id="navbar__search-bar" 
                            type="text" 
                            name="movie_name" 
                            placeholder="Search movie"
                        >
                    </div>
                </div>
                <div class="navbar__group">
                    <div class="navbar__item" onclick="location.href = '/history'">
                        Transactions
                    </div>
                    <div class="navbar__item" onclick="location.href = '/logout'">
                        Logout
                    </div>
                </div>
            </nav>
        </div>
        <div class="container__outer">
            <div class="container__inner layout__wrapper"> 
                <div class="heading-wrapper">
                    <div id="movie-name" class="text--bold text--extra-large">Avengers</div>
                    <div class="text--standard text--bold block--grey"><span id="movie-date">September 3, 2019</span> - <span id="movie-time">19.40</span></div>
                    <hr class="line"/>
                </div>
                <div class="booking__wrapper">
                    <div class="seats_wrapper">
                        <div class="flexbox block--skyblue">
                            <div><input onclick="radioClick(this);" id="radio1" type="radio" name="radio"><label for="radio1">1</label></div>
                            <div><input onclick="radioClick(this);" id="radio2" type="radio" name="radio"><label for="radio2">2</label></div>
                            <div><input onclick="radioClick(this);" id="radio3" type="radio" name="radio"><label for="radio3">3</label></div>
                            <div><input onclick="radioClick(this);" id="radio4" type="radio" name="radio"><label for="radio4">4</label></div>
                            <div><input onclick="radioClick(this);" id="radio5" type="radio" name="radio"><label for="radio5">5</label></div>
                            <div><input onclick="radioClick(this);" id="radio6" type="radio" name="radio"><label for="radio6">6</label></div>
                            <div><input onclick="radioClick(this);" id="radio7" type="radio" name="radio"><label for="radio7">7</label></div>
                            <div><input onclick="radioClick(this);" id="radio8" type="radio" name="radio"><label for="radio8">8</label></div>
                            <div><input onclick="radioClick(this);" id="radio9" type="radio" name="radio"><label for="radio9">9</label></div>
                            <div><input onclick="radioClick(this);" id="radio10" type="radio" name="radio"><label for="radio10">10</label></div>
                        </div>
                        <div class="flexbox block--skyblue">
                            <div><input onclick="radioClick(this);" id="radio11" type="radio" name="radio"><label for="radio11">11</label></div>
                            <div><input onclick="radioClick(this);" id="radio12" type="radio" name="radio"><label for="radio12">12</label></div>
                            <div><input onclick="radioClick(this);" id="radio13" type="radio" name="radio"><label for="radio13">13</label></div>
                            <div><input onclick="radioClick(this);" id="radio14" type="radio" name="radio"><label for="radio14">14</label></div>
                            <div><input onclick="radioClick(this);" id="radio15" type="radio" name="radio"><label for="radio15">15</label></div>
                            <div><input onclick="radioClick(this);" id="radio16" type="radio" name="radio"><label for="radio16">16</label></div>
                            <div><input onclick="radioClick(this);" id="radio17" type="radio" name="radio"><label for="radio17">17</label></div>
                            <div><input onclick="radioClick(this);" id="radio18" type="radio" name="radio"><label for="radio18">18</label></div>
                            <div><input onclick="radioClick(this);" id="radio19" type="radio" name="radio"><label for="radio19">19</label></div>
                            <div><input onclick="radioClick(this);" id="radio20" type="radio" name="radio"><label for="radio20">20</label></div>
                        </div>
                        <div class="flexbox block--skyblue">
                            <div><input onclick="radioClick(this);" id="radio21" type="radio" name="radio"><label for="radio21">21</label></div>
                            <div><input onclick="radioClick(this);" id="radio22" type="radio" name="radio"><label for="radio22">22</label></div>
                            <div><input onclick="radioClick(this);" id="radio23" type="radio" name="radio"><label for="radio23">23</label></div>
                            <div><input onclick="radioClick(this);" id="radio24" type="radio" name="radio"><label for="radio24">24</label></div>
                            <div><input onclick="radioClick(this);" id="radio25" type="radio" name="radio"><label for="radio25">25</label></div>
                            <div><input onclick="radioClick(this);" id="radio26" type="radio" name="radio"><label for="radio26">26</label></div>
                            <div><input onclick="radioClick(this);" id="radio27" type="radio" name="radio"><label for="radio27">27</label></div>
                            <div><input onclick="radioClick(this);" id="radio28" type="radio" name="radio"><label for="radio28">28</label></div>
                            <div><input onclick="radioClick(this);" id="radio29" type="radio" name="radio"><label for="radio29">29</label></div>
                            <div><input onclick="radioClick(this);" id="radio30" type="radio" name="radio"><label for="radio30">30</label></div>
                        </div>
                        <div class='box-screen'>Screen</div>
                    </div>
                    <div class= "vertical-divider"></div> 
                    <div id="booking-summary" class= "bsummary-wrapper">
                        <div class="detail--margin text--standard text--bold block--darkergrey">Booking Summary</div>
                        <div class="detail--margin block--grey text--bold text--small">You haven't selected any seat yet. Please click on one of the seat provided</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>