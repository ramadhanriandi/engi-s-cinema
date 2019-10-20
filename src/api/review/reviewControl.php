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
function addFilmReview()
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");    
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/ReviewModel.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();
    $ReviewModel = new ReviewModel($connection);
    $data = json_decode(file_get_contents("php://input"));
    $statement = $ReviewModel->addReview($data->starRating,$data->description,$data->userid,
                                        $data->movie_id,$data->transaction_id);
    if($statement->rowCount()!=0){
            http_response_code(201);
            echo json_encode(array("message" => "User was created."));

        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "User was created."));
            
        }
}
function deleteFilmReview($id)
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/ReviewModel.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $ReviewModel = new ReviewModel($connection);
    $data = json_decode(file_get_contents("php://input"));
    
    $statement = $ReviewModel->deleteReview($id);
    if($statement->rowCount()!=0){
            http_response_code(201);
            echo "Success Delete";

        }
        else{
            echo "failed delete";
            http_response_code(400);
        }
        
}
function updateFilmReview()
{
    // required headers
    header("Content-Type: application/json; charset=UTF-8");
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/ReviewModel.php";

    $dbclass = new Database();
    $connection = $dbclass->getConnection();

    $ReviewModel = new ReviewModel($connection);
    $data = json_decode(file_get_contents("php://input"));
    $statement = $ReviewModel->updateReview($data->starRating,$data->description,$data->transaction_id);
    if($statement->rowCount()!=0){
            
            http_response_code(201);
            echo "Success Update";

        }
        else{
            echo "failed Insert";
            http_response_code(400);
        }
        
}

