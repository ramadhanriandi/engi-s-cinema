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
 * This function will return movie with specific id, schedule, and review
 * 
 * @param int $m_id id for a movie
 * 
 * @return void 
 */
function render (){
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/transactionclass.php";
    $dbclass = new Database();
    $connection = $dbclass->getConnection();    
    $movieShowing = new TransactionClass($connection);
    $data=json_decode(getTransaction($_SESSION['id']));
    $movieShowing->view($_SERVER['DOCUMENT_ROOT']."/templates/History1.php",$data);
    
}
function getTransaction($m_id)
{
    // required headers
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/transactionclass.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $movieShowing = new TransactionClass($connection);
    $statement = $movieShowing->readUserTransaction($m_id);
    $transactionArr  = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $statement2 = $movieShowing->checkReviewedTransaction($transaction_id);
        if($statement2->rowCount()==0){
            
            $m_temp  = array( 
                "movie_id"=>$movie_id,
                "transaction_id"=>$transaction_id,           
                "movie_name" => $movie_name,
                "image" => $image,
                "show_date" => $show_date,
                "show_time" => $show_time,
                "reviewed" => 0
            );
            array_push($transactionArr,$m_temp);
        }
        else{
                $m_temp  = array( 
                    "movie_id"=>$movie_id,
                    "transaction_id"=>$transaction_id, 
                    "movie_name" => $movie_name,
                    "image" => $image,
                    "show_date" => $show_date,
                    "show_time" => $show_time,
                    "reviewed"=>1
                );
                array_push($transactionArr,$m_temp);
        }
        
    }
    return json_encode($transactionArr);
}
