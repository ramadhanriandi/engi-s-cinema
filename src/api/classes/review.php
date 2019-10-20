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
class Review
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name = "reviews";

    // table columns
    public $review_id;
    public $user_id;
    public $movie_id;
    public $transaction_id;
    public $rating;
    public $description;

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
     * @param int $m_id movie_id
     * 
     * @return statement
     */
    public function readSpecificMovieReview($m_id)
    {
        $query = "SELECT movie_id, username, profile_picture, rating, description FROM " 
                 . $this->_table_name . " NATURAL JOIN users WHERE movie_id=" . $m_id ;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    /** 
     * This function is used to update the data
     * 
     * @return statement
     */
    public function update()
    {

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
