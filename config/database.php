<?php

/**
 * Database
 * 
 * Database configuration for this project
 * 
 * php version 7.2.19
 * 
 * @category   Config
 * @package    Config
 * @subpackage Database
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

/**
 * Database is a class that store database configuration
 * 
 * @category   Config
 * @package    Config
 * @subpackage Database
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */
class Database
{
    // specify your own database credentials
    private $_host = "localhost";
    private $_db_name = "engima";
    private $_username = "root";
    private $_password = "1234";
    public $conn;
 
    /** 
     * This function will return the current connection to the database
     * 
     * @return connection 
     */
    public function getConnection()
    {
        $this->conn = null;
 
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->_host . ";dbname=" . $this->_db_name, 
                $this->_username, $this->_password
            );
            // $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
