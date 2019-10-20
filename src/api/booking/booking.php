<?php

/**
 * Booking
 *
 * Transaction, Movie_Showing, Seats controller
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Booking
 * @subpackage None
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */


/** 
 * This function will book a selected movie if the user have already logged in
 * 
 * @return void
 */
function bookingMovie()
{
    // For creating a new transaction, we need to do these:
    // 1. Updating seat_counts in movie_showings table
    // 2. Updating status to 0 in seats table
    // 3. Insert all required data in transactions table

    // required headers
    header("Content-Type: application/json");

    // Allows API Call with POST method
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/transaction.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/movie_showing.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/seat.php";

        $dbclass = new Database();
        $connection = $dbclass->getConnection();

        $transaction = new Transaction($connection);
        $movieShowing = new MovieShowing($connection);
        $seat = new Seat($connection);

        $data = json_decode(file_get_contents("php://input"));

        $transaction->movie_showing_id = $data->movie_showing_id;
        $transaction->seat_number = $data->seat_number;
        $transaction->transaction_for_date = $data->for_date;
        $transaction->transaction_for_time = $data->for_time;
        $transaction->transaction_made_date = $data->made_date;

        if (!empty($transaction->movie_showing_id)
            && !empty($transaction->seat_number) 
            && !empty($transaction->transaction_for_date) 
            && !empty($transaction->transaction_for_time)
            && !empty($transaction->transaction_made_date)
        ) {

            // Insert data into transaction table
            session_start();
            $user_id = $_SESSION['id'];
            $statement = $transaction->create($user_id);

            // Success updating movie_showings table
            if ($statement->rowCount()>0) {
                // Updating status to 0 in seats table
                $statement = $seat->update($transaction->movie_showing_id, $transaction->seat_number);

                //Success updating seats table
                if ($statement->rowCount()>0) {
                    
                    // Updating seat_counts in movie_showings_table
                    $statement = $movieShowing->updateSeatsCount($transaction->movie_showing_id);


                    if ($statement->rowCount()>0) {
                        http_response_code(201);
                    } else {
                        http_response_code(500);
                    }
                } else {
                    http_response_code(500);
                }
            } else {
                http_response_code(500);
            }
        } else {
            http_response_code(400);
        }
    } else {
        http_response_code(400);
    }
}