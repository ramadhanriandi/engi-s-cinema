<?php
/**
 * Movie_Showing
 *
 * MovieShowing class
 * 
 * php version 7.2.19
 *
 * @category   Model
 * @package    Classes
 * @subpackage MovieShowing
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

 /**
  * MovieShowing is a class to store data from movie_showing table
  * 
  * @category   Model
  * @package    Classes
  * @subpackage MovieShowing
  * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
  * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
  * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
  */
class MovieShowing
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name1 = "movies";
    private $_table_name2 = "movie_showings";
    private $_table_name3 = "seats";

    // table columns
    public $movie_showing_id;
    public $movie_id;
    public $movie_name;
    public $rating;
    public $genre;
    public $image;
    public $description;
    public $show_date;
    public $show_time;
    public $seats_count;

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
     * This function is used to read all available seats from specific movie_showing
     * 
     * @param int $movie_id movies primary key
     * 
     * @return statement
     */
    public function readDetailSchedule($m_s_id)
    {
        $query = "SELECT * FROM movie_showings NATURAL JOIN movies WHERE movie_showing_id=".$m_s_id;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }
    
    /** 
     * This function is used to read all available seats from specific movie_showing
     * 
     * @param int $movie_id movies primary key
     * 
     * @return statement
     */
    public function readSchedule($movie_id)
    {

        $query = "SELECT movie_showing_id, show_date, show_time, seats_count FROM " . $this->_table_name1 
                 . " NATURAL JOIN " . $this->_table_name2
                 . " WHERE " . $this->_table_name1
                 . ".movie_id = " . $movie_id;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    /** 
     * This function is used to read all available seats from specific movie_showing
     * 
     * @param int $movie_showing_id movie_showings primary key
     * 
     * @return statement
     */
    public function readSeatsAvailable($movie_showing_id)
    {
        $query = "SELECT COUNT(movie_showing_id) FROM " . $this->_table_name2
                      . " NATURAL JOIN " . $this->_table_name3
                      . " WHERE " . $this->_table_name2 . ".status = 1";

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
    public function updateSeatsCount($movie_showing_id)
    {
        $query = "UPDATE " . $this->_table_name2
                 . " SET seats_count = seats_count-1 "
                 . " WHERE movie_showing_id=" . $movie_showing_id;

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