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
class TransactionClass
{
    // Connection instance
    private $_connection;

    // table name
    private $_table_name1 = "transactions";
    private $_table_name2 = "movie_showings";
    private $_table_name3 = "movies";
    private $_table_name4 = "reviews";


    // table columns
    public $user_id;
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
    public function readUserTransaction($user_id)
    {
        $query = "SELECT movie_id,transaction_id,movie_name,image,show_date,show_time FROM "
            . $this->_table_name1." NATURAL JOIN "
            . $this->_table_name2." NATURAL JOIN "
            . $this->_table_name3
            . " WHERE user_id =". $user_id ;

        $statement = $this->_connection->prepare($query);

        $statement->execute();

        return $statement;
    }
    public function view($view,$data=[]){
      require($view);

    }
    public function checkReviewedTransaction($transaction_id)
    {
            $query = "SELECT * FROM "
                . $this->_table_name4
                . " WHERE transaction_id =". $transaction_id  ;
    
            $statement = $this->_connection->prepare($query);
    
            $statement->execute();
    
            return $statement;
    }
}