<?php
/**
 * Create
 *
 * User controller for creating user data
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    User
 * @subpackage Create
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will create user data
 * 
 * @return void
 */
function createUser()
{
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/src/api/classes/user.php";
    
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);

    $data = json_decode(file_get_contents("php://input"));
    
    $user->username = $data->username;
    $user->email = $data->email;
    $user->phone = $data->phone;
    $user->password = $data->password;
    $user->profile_picture = $data->profile_picture;

    if (!empty($user->username)
        && !empty($user->email) 
        && !empty($user->phone) 
        && !empty($user->password) 
        && !empty($user->profile_picture) 
        && $user->create()
    ) {
        http_response_code(200);
        echo json_encode(array("message" => "User was created."));
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Unable to create user."));
    }
}
?>