<?php
/**
 * User
 *
 * User class
 * 
 * php version 7.2.19
 *
 * @category   Model
 * @package    Classes
 * @subpackage User
 * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

 /**
  * User is a class to model data from users table
  * 
  * @category   Model
  * @package    Classes
  * @subpackage User
  * @author     Mgs. M. Riandi Ramadhan <13517080@std.stei.itb.ac.id>
  * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
  * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
  */
class User
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name = "users";

    // table columns
    public $user_id;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $profile_picture;

    /** 
     * This is a constructor for User class
     * 
     * @param connection $connection connection for database
     */
    public function __construct($connection)
    {
        $this->_connection = $connection;
    }

    /** 
     * This function is used to create/write a new data
     * 
     * @return boolean
     */
    public function create()
    {
        $query = "INSERT INTO " . $this->_table_name . " (
            username, email, phone, password, profile_picture)
            VALUES (:username, :email, :phone, :password, :profile_picture)";

        $statement = $this->_connection->prepare($query);
    
        $statement->bindParam(':username', $this->username);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':password', $this->password);
        $statement->bindParam(':profile_picture', $this->profile_picture);
    
        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    /** 
     * This function is used to login as a user
     * 
     * @return statement
     */
    public function login()
    {
        $loginQuery = "SELECT * FROM " . $this->_table_name . " WHERE email=:email";

        $loginStatement = $this->_connection->prepare($loginQuery);

        $loginStatement->bindParam(':email', $this->email);

        if ($loginStatement->execute()) {
            return $loginStatement->fetch(PDO::FETCH_ASSOC);
        }
    }

    /** 
     * This function is used to read all user data for checking
     * 
     * @return statement
     */
    public function read()
    {
        $query = "SELECT username, email, phone FROM " . $this->_table_name;

        $statement = $this->_connection->prepare($query);

        $statement->execute();
        
        return $statement;
    }
}
