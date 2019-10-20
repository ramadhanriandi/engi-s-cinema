<?php
/**
 * Transaction
 *
 * Transaction class
 * 
 * php version 7.2.19
 *
 * @category   Model
 * @package    Classes
 * @subpackage Transaction
 * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

 /**
  * Transaction is a class to store data from transaction table
  * 
  * @category   Transaction
  * @package    Classes
  * @subpackage Transaction
  * @author     Isa Mujahid Darussalam <13517002@std.stei.itb.ac.id>
  * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
  * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
  */
class Transaction
{
    // Connection instance
    private $_connection;

    private $_table_name = "transactions";

    // table columns
    public $transaction_id;
    public $movie_showing_id;
    public $seat_number;
    public $transaction_for_date;
    public $transaction_made_date;
    public $transaction_for_time;
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
    public function create($user_id)
    {
        // $current_time = date('Y-m-d H:i:s');
        $query = 'INSERT INTO `transactions`(`user_id`, `movie_showing_id`, `seat_number`, `transaction_for_date`, `transaction_for_time`, `transaction_made_date`) VALUES ('
                 . $user_id .',' . $this->movie_showing_id . ',' . $this->seat_number. ',"' . $this->transaction_for_date . '","' . $this->transaction_for_time . '","'.$this->transaction_made_date.'")';

        $statement = $this->_connection->prepare($query);   

        $statement->execute();

        return $statement;
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
     * This function is used to update the data
     * 
     * @return statement
     */
    public function update()
    {
        $query = "SELECT * FROM " . $this->_table_name;

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
