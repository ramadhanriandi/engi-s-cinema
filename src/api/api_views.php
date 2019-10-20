<?php
/**
 * Router
 *
 * API router for this project
 * 
 * php version 7.2.19
 *
 * @category   View
 * @package    API
 * @subpackage None
 * @author     Isa-Riandi-Ivan <13517xxx@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function register all routes for API
 * 
 * @param array $args request URI
 * 
 * @return void
 */
function apiList($args)
{
    $count = count($args);
    switch ($args[0]) {
    case ('movies'):
        if ($count == 1) {
            include 'movie/read.php';
            readAllMovies();
        } else if (is_numeric($args[1])) {
            include 'movie/read.php'; 
            readMovie($args[1]);
        } else if ($args[1] == "search") {
            include 'movie/search.php';
            searchMovie($args[2]);
        }
        break;
    case ('schedule'):
        include 'movie_detail/read.php';
        if ($count == 2) {
            getSchedule($args[1]);
        }
        if ($count == 3 && $args[1]=='show') {
            getDetail($args[2]);
        }
        break;
    case ('review'):
        if (is_numeric($args[1])) {
            include 'movie_detail/read.php';
            getReview($args[1]);
        }
        break;
    case('transaction'):
    include 'transaction/history.php';
        if($count==2){
            getTransaction($args[1]);
        }   
        else{
            render();
        }
        break;
    case("reviews"):
    include 'review/reviewControl.php';
   
        if($args[1]=="add"){
            addFilmReview();
            break;
        }
        else if($args[1]=="delete"){
            echo $args[2];
            deleteFilmReview($args[2]);
            break;
        }
        else if($args[1]=="edit"){
            updateFilmReview();
            break;
        }
        else{
            break;
        }
    
        
    case ('users'):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($args[1] == "create") {
                include 'user/create.php';
                createUser();
            } else if ($args[1] == "login") {
                include 'user/login.php';
                loginUser();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'user/read.php';
            readUser();
        }
        break;   
    case ('seats'):
        if (is_numeric($args[1])) {
            include 'seat/read.php';
            getSeats($args[1]);
        }
        break;
    case ('booking'):
        if ($count == 1) {
            include 'booking/booking.php';
            bookingMovie();
        }
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo '404 Not Found';
        break;
    }
}