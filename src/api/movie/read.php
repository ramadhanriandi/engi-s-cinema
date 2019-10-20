<?php

/**
 * Read
 *
 * Movie controller
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Movies
 * @subpackage None
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will return all movies HTTP response
 * 
 * @return void
 */
function readAllMovies()
{
        // required headers
    header("Content-Type: application/json");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/movie.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $movie = new Movie($connection);

    $statement = $movie->read();
    $count = $statement->rowCount();

    if ($count > 0) {

        $movies = array();
        $movies["body"] = array();
        $movies["count"] = $count;

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $m_temp  = array(
                "movie_id" => $movie_id,
                "movie_name" => $movie_name,
                "image" => $image,
                "rating" => $rating,
                "genre" => $genre,
                "description" => $description
            );

            array_push($movies["body"], $m_temp);
        }

        echo json_encode($movies);
    } else {

        echo json_encode(
            array("body" => array(), "count" => 0)
        );
    }
}

/** 
 * This function will return movie with specific id, schedule, and review
 * 
 * @param int $m_id id for a movie
 * 
 * @return void 
 */
function readMovie($m_id)
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/movie.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $movieShowing = new Movie($connection);
    $statement = $movieShowing->readMovieDesc($m_id);

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $m_temp  = array(
            "movie_id" => $m_id,
            "movie_name" => $movie_name,
            "image" => $image,
            "rating" => $rating,
            "genre" => $genre,
            "description" => $description, 
            "duration" => $duration,
            "release_date" => $release_date
        );
    }
    echo json_encode($m_temp);
}