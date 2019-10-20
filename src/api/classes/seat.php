<?php
/**
 * Movie
 *
 * Movie class
 * 
 * php version 7.2.19
 *
 * @category   Model
 * @package    Classes
 * @subpackage Movie
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

 /**
  * Movie is a class to store data from movie table
  * 
  * @category   Model
  * @package    Classes
  * @subpackage Movie
  * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
  * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
  * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
  */
class Seat
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name = "seats";

    // table columns
    public $movie_showing_id;
    public $seat_number;
    public $status;

    /** 
     * This is a constructor for Movie class
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
     * @return statement
     */
    public function create()
    {
    }

    /** 
     * This function is used to create/write a new data
     * 
     * @param int $m_s_id m_s_id is movie_showing_id which is a primary key for movie_showings 
     * 
     * @return statement
     */
    public function read($m_s_id)
    {
        $query = "SELECT seat_number FROM " . $this->_table_name
                 . " NATURAL JOIN movie_showings WHERE movie_showing_id=" . $m_s_id
                 . " AND status=0";

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }
    
    /** 
     * This function is used to update the data
     * 
     * @param int $movie_showing_id movie_showings primary key
     * @param int $seat_number      seat_number updated
     *  
     * @return statement
     */
    public function update($movie_showing_id, $seat_number)
    {
        $query = "UPDATE " . $this->_table_name
                 . " SET status = 0 "
                 . " WHERE movie_showing_id=" . $movie_showing_id
                 . " AND seat_number=" . $seat_number ;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }
        
    /** 
     * This function is used to delete data
     * 
     * @return statement
     */
    public function delete()
    {

    }
}
