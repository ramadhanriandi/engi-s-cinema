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
 * @subpackage Read
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will read user data
 * 
 * @return void
 */
function readUser()
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

    $statement = $user->read();
    $count = $statement->rowCount();

    if ($count > 0) {
        $result = array();
        $result["body"] = array();
        $result["count"] = $count;

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $r_temp  = array(
                "username" => $username,
                "email" => $email,
                "phone" => $phone
            );
            array_push($result["body"], $r_temp);
        }
        echo json_encode($result);
    } else {
        echo json_encode(
            array("body" => array(), "count" => 0)
        );
    }
}
?>