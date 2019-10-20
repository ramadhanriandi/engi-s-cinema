<?php

/**
 * Seat
 *
 * Seat Controller
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Seat
 * @subpackage None
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will return all seats from specific id
 * 
 * @param int $m_s_id id for movie_showings
 * 
 * @return void 
 */
function getSeats($m_s_id)
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/seat.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $seat = new Seat($connection);
    $statement = $seat->read($m_s_id);

    $count = $statement->rowCount();

    if ($count > 0) {
        $seats = array();
        $seats["seat_number"] = array();
        $seats["count"] = $count;

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            array_push($seats["seat_number"], $seat_number);
        }
        echo json_encode($seats);
    } else {
        echo json_encode(
            array("body" => array(), "count" => 0)
        );
    }
}