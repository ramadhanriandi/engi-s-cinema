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
class ReviewModel
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name = "reviews";

    // table columns
    public $movie_id;
    public $movie_name;
    public $image;
    public $rating;
    public $genre;
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
    public function addReview($starRating,$description,$user_id,$movie_id,$transaction_id)
    {
        $query = "INSERT INTO ".$this->_table_name. 
        "( `user_id`, `movie_id`, `transaction_id`, `rating`, `description`) VALUES 
        (".$user_id.",".$movie_id.",".$transaction_id.",".$starRating.","."\"".$description."\"".")";
        
        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    /** 
     * This function is used to create/write a new data
     * 
     * @return statement
     */
    public function deleteReview($transaction_id)
    {
        $query = "DELETE FROM ".$this->_table_name." WHERE transaction_id = ".$transaction_id;
        
        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    /** 
     * This function is used to update the data
     * 
     * @return statement
     */
    public function updateReview($starRating,$description,$transaction_id)
    {
        $query = "UPDATE ".$this->_table_name
        ." SET rating = ".$starRating.", description = \"".$description
        ."\" WHERE transaction_id = ".$transaction_id;
        
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
