<?php
/**
 * Register
 *
 * Controller of register
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Register
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */


require_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";

require $_SERVER['DOCUMENT_ROOT'].'/src/auth.php';

if (isset($_POST['register'])) {    
    if ($_POST['password'] == $_POST['confirmPassword']) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $profile_picture = $_FILES['profile_picture']['name'];
        $tempPhoto  = $_FILES['profile_picture']['tmp_name']; 

        $targetDir = "uploads/";
        $targetFilePath = $targetDir.$profile_picture;

        if (move_uploaded_file($tempPhoto, $targetFilePath)) {
            $query = "INSERT INTO users (username, email, phone, password, profile_picture)
                    VALUES (:username, :email, :phone, :password, :profile_picture)";
                    
            $statement = $db->prepare($query);

            $params = array(
                ":username" => $username,
                ":email" => $email,
                ":phone" => $phone, 
                ":password" => $password,
                ":profile_picture" => $profile_picture
            );
    
            $saved = $statement->execute($params);

            if ($saved) {
                header("Location: login");
            }
        }
    }
}