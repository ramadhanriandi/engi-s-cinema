<?php
/**
 * Auth
 *
 * Check cookie for authentication
 * 
 * php version 7.2.19
 *
 * @category   Controller
 * @package    Auth
 * @subpackage None
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/** 
 * This function will check cookie in browser and database
 * 
 * @return url
 */
function checkCookie() 
{
    include_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";

    $database = new Database();
    $db = $database->getConnection();

    if (isset($_COOKIE["id"])) {
        $id = $_COOKIE["id"];

        $checkQuery = "SELECT * FROM cookies WHERE id=:id";

        $checkStatement = $db->prepare($checkQuery);

        $checkParams = array(
            ":id" => $id
        );

        $checkStatement->execute($checkParams);

        $cookie = $checkStatement->fetch(PDO::FETCH_ASSOC);

        if ($cookie) {
            header("Location: home");
        }
    } else {
        header("Location: login");
    }
    
}