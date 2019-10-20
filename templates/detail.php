<?php
/**
 * Login
 *
 * View of login
 * 
 * php version 7.2.19
 *
 * @category   View
 * @package    Home
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */
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
        <script type="text/javascript" src="../public/assets/js/movie_detail.js"></script>
        <script type="text/javascript" src="../public/assets/js/home.js"></script>
    </head>
    <body>
    <form action="" method="GET">
       <input type="hidden" value="" id="movie_name_field">
       <input type="hidden" value = "" id="movie_release_date">
     </form>
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
                    <div class="detail__image">
                        <img id="movie-image" class="detail__image--medium block--rounded" src="http://www.theedwardhotel.co.uk/wp-content/uploads/2017/05/image-lorem-ipsum.png">
                    </div>
                    <div class="detail__wrapper">
                        <div id="movie-name" class="text--extra-large text--bold detail--margin">
                            Avengers
                        </div>
                        <div class="text--small block--skyblue text--bold detail--margin">
                            <span id="movie-genre"> Drama, Fantasy, Adventure </span> | <span id="movie-duration">187 mins</span>
                        </div>
                        <div class="text--small block--grey text--bold detail--margin">
                            Released date: <span id="movie-date"> April 17, 2019 </span>
                        </div>
                        <div class="detail--margin">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span id="movie-rating" class="block--darkergrey text--large text--bold">8.75</span><span class="block--grey text--small text--bold"> /10</span>
                        </div>
                        <div id="movie-description" class="text--medium">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                </div>
                <div class="block--flex">
                    <div class="box-schedule box--shadow block--rounded">
                        <div class="box-wrapper__inner">
                            <div class="text--bold text--large">Schedule</div>
                            <table id="schedule" class="text--bold block--darkergrey text--medium schedule-table">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Available seats</th>
                                </tr>
                                <tr>
                                    <td>September 3, 2019</td>
                                    <td>06.30 PM</td>
                                    <td>
                                        <span class="block--align-left block--black">10 seats</span>
                                        <span class="block--right block--red">Not Available</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>September 5, 2019</td>
                                    <td>06.30 PM</td>
                                    <td>
                                        <span class="block--align-left block--black">25 seats</span>
                                        <span class="block--right block--skyblue">Book now</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>September 7, 2019</td>
                                    <td>08.20 PM</td>
                                    <td>
                                        <span class="block--align-left block--black">0 seats</span>
                                        <span class="block--right block--red">Not Available</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>September 7, 2019</td>
                                    <td>04.00 PM</td>
                                    <td>
                                        <span class="block--align-left block--black">25 seats</span>
                                        <span class="block--right block--skyblue">Available</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="box-reviews box--shadow block--rounded">
                        <div class="box-wrapper__inner">
                            <div class="text--bold text--large">Reviews</div>
                                <table id="reviews" class="block--darkergrey text--medium schedule-table">
                                    <tr>
                                        <td><img class="image--small block--circle" src="http://www.theedwardhotel.co.uk/wp-content/uploads/2017/05/image-lorem-ipsum.png"></td>
                                        <td class="review">
                                            <div class="text--bold">mgz.riandi</div>
                                            <div><span class="text--large text--bold">8</span> /10</div>
                                            <div>
                                            Filmnya cukup bagus, sayangnya artisnya jelek
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="image--small block--circle" src="http://www.theedwardhotel.co.uk/wp-content/uploads/2017/05/image-lorem-ipsum.png"></td>
                                        <td class="review">
                                            <div class="text--bold">isa.md</div>
                                            <div><span class="text--large text--bold">6</span> /10</div>
                                            <div>
                                            Dagunya thanos kayak lapis
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="image--small block--circle" src="http://www.theedwardhotel.co.uk/wp-content/uploads/2017/05/image-lorem-ipsum.png"></td>
                                        <td class="review">
                                            <div class="text--bold">ivan.69</div>
                                            <div><span class="text--large text--bold">2 </span>/10</div>
                                            <div>
                                            Waktu nonton ini tidur pulas
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="../public/assets/js/movie_detail.js"></script> -->
    </body>
</html>
