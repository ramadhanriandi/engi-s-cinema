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

<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/assets/css/layout.css">
</head>
<body>
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
            <div class="layout__wrapper-inner container home__wrapper">
                <div class="home__greeting">
                    Hello, <span><?php echo $_SESSION['username']?></span>!
                </div>
                <div class="home__playlist-title">
                    Now Playing
                </div>
                <div class="home__playlist-wrapper" id="home__playlist-wrapper">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../public/assets/js/home.js"></script>
</body>
</html>