<?php
/**
 * Login
 *
 * Controller of login
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Login
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

require_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";

require $_SERVER['DOCUMENT_ROOT'].'/src/auth.php';

if (isset($_POST['login'])) {    
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $loginQuery = "SELECT * FROM users WHERE email=:email";
            
    $loginStatement = $db->prepare($loginQuery);

    $loginParams = array(
        ":email" => $email
    );

    $loginStatement->execute($loginParams);

    $user = $loginStatement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            $cookieId = time().rand(1, 100000);
            $userId = $user["id"];

            setcookie("id", $cookieId, time() + 3600);

            $cookieQuery = "INSERT INTO cookies (id, user) 
                            VALUES (:cookieId, :userId)";

            $cookieStatement = $db->prepare($cookieQuery);

            $cookieParams = array(
                ":cookieId" => $cookieId,
                ":userId" => $userId
            );

            $saved = $cookieStatement->execute($cookieParams);
            
            if ($saved) {
                header("Location: home");
            }
        }
    }
}