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
 * @subpackage Login
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will create user data
 * 
 * @return void
 */
function loginUser()
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
    
    $user->email = $data->email;
    $user->password = $data->password;

    if (!empty($user->email) && !empty($user->password)) {
        $result = $user->login();

        session_start();
        $_SESSION['id']=$result["user_id"]; 
        $_SESSION['username']=$result["username"]; 

        if ($user->password == $result["password"]) {
            $cookieId = time().rand(1, 100000);
            $userId = $result["user_id"];

            setcookie("id", $cookieId, time() + 3600);
            echo $_COOKIE["id"];
            $cookieQuery = "INSERT INTO cookies (id, user_id) 
                            VALUES (:cookieId, :userId)";
            
            $cookieStatement = $db->prepare($cookieQuery);

            $cookieParams = array(
                ":cookieId" => $cookieId,
                ":userId" => $userId
            );

            $cookieSaved = $cookieStatement->execute($cookieParams);

            if ($cookieSaved) {
                http_response_code(200);
                echo json_encode(array("message" => "Login success"));
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Fail to save cookie"));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Wrong password"));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Login fail"));
    }
}