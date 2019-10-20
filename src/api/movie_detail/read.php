<?php
/**
 * Movie Detail
 *
 * API needed for Movie Detail
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    None
 * @subpackage None
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will return schedule for a specific movie
 * 
 * @param int $m_id id for a movie
 * 
 * @return void 
 */
function getSchedule($m_id)
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/movie_showing.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $movieShowing = new MovieShowing($connection);
    $statement = $movieShowing->readSchedule($m_id);

    $count = $statement->rowCount();

    if ($count > 0) {
        $reviews = array();
        $reviews["body"] = array();
        $reviews["count"] = $count;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $m_temp  = array(
                "movie_showing_id" => $movie_showing_id,
                "show_date" => $show_date,
                "show_time" => $show_time,
                "seats_count" => $seats_count
            );
            array_push($reviews["body"], $m_temp);
        }
        echo json_encode($reviews);
    } else {
        echo json_encode(
            array("body" => array(), "count" => 0)
        );
    }
}

/** 
 * This function will return response list of reviews for a specific movie
 * 
 * @param int $m_id id for a movie
 * 
 * @return void 
 */
function getReview($m_id)
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/review.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $review = new Review($connection);
    $statement = $review->readSpecificMovieReview($m_id);

    $m_temp = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $m_temp  = array(
            "movie_id" => $m_id,
            "image" => $profile_picture,
            "username" => $username,
            "rating" => $rating,
            "description" => $description 
        );
    }
    echo json_encode($m_temp);
}

function getDetail($m_id) {
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/movie_showing.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $movieShowing = new MovieShowing($connection);
    $statement = $movieShowing->readDetailSchedule($m_id);

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $m_temp  = array(
            "movie_showing_id" => $movie_showing_id,
            "movie_name" => $movie_name,
            "show_date" => $show_date,
            "show_time" => $show_time,
            "seats_count" => $seats_count
        );
    }
    echo json_encode($m_temp);
}