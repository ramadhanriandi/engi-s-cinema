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
class Movie
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name = "movies";

    // table columns
    public $movie_id;
    public $movie_name;
    public $image;
    public $rating;
    public $genre;
    public $description;
    public $duration;
    public $release_date;

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
     * @return statement
     */
    public function read()
    {
        $query = "SELECT * FROM " . $this->_table_name;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }
    
    /** 
     * This function is used to read a specific movie description
     * 
     * @param int $movie_id movies primary key
     * 
     * @return statement
     */
    public function readMovieDesc($movie_id)
    {

        $query = "SELECT * FROM " . $this->_table_name
                 . " WHERE " . $this->_table_name
                 . ".movie_id = " . $movie_id;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }

    /** 
     * This function is used to search the data
     * 
     * @param string $movie_name name of the movie
     * 
     * @return statement
     */
    public function search($name)
    {
        $query = "SELECT movie_id, movie_name, image, rating, description FROM ".$this->_table_name." WHERE movie_name LIKE '%".$name."%'";
        
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
