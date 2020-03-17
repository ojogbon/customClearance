<?php
define("SERVERNAME","localhost");
define("DBNAME","clearance");
define("USERNAME","root");
define("PASSWORD","");
/**
 * Class DbHandler v2.0
 * This class handles database connection and execution
 * developed by Aristotle Hilary
 */
class DbHandler{


	private $transaction = false;

	public function __construct(){
        $this->db = new PDO("mysql:host=".SERVERNAME.";dbname=".DBNAME,USERNAME,PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

    /**
     * Start transaction statement
     */
    public  function startTransaction(){
	    $this->db->beginTransaction();
	    $this->transaction = true;
    }

    /**
     * commit transaction
     */
    public function commitTransaction(){
        $this->db->commit();
    }
    /**
     * roll back transaction statements
     */
    public function rollBack(){
        $this->db->rollBack();
    }
    /**
     * @param $sql
     * @param null $param
     * @return array
     * get all the result from the result set in associative array
     */
	public  function getAll($sql,$param = NULL){

		$statement = $this->db->prepare($sql);

		$statement->execute($param);

		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
        /**
         * close cursor it this is a transaction statement
         */
		if($this->transaction){
		    $statement->closeCursor();
        }

		return $result;

	}
    /**
     * @param $sql
     * @param null $param
     * @return mixed
     * Get only the first result from the result set - For performance it's best to use this function when selecting a single record
     */
	//get only one result from the result set
	public  function getOne($sql,$param = NULL){

		$statement = $this->db->prepare($sql);

		$statement->execute($param);

		$result = $statement->fetch(PDO::FETCH_ASSOC);
        /**
         * close cursor it this is a transaction statement
         */
        if($this->transaction){
            $statement->closeCursor();
        }
		return $result;

	}

    /**
     * @param $sql
     * @param null $param
     * @return string
     * Insert and return the inserted item Id from the database;
     */
	public  function executeGetId($sql,$param = NULL){

		$statement = $this->db->prepare($sql);

		$statement->execute($param);

		$insertId =  $this->db->lastInsertId();
        /**
         * close cursor it this is a transaction statement
         */
        if($this->transaction){
            $statement->closeCursor();
        }
        return $insertId;

	}
    /**
     * @param $sql
     * @param null $param
     * Execute query that does not return result
     */
	public  function execute($sql,$param = NULL){

		$statement = $this->db->prepare($sql);

		$statement->execute($param);

        /**
         * close cursor it this is a transaction statement
         */
        if($this->transaction){
            $statement->closeCursor();
        }
	}
	public  function executeUpdate($sql,$param = NULL){

		$statement = $this->db->prepare($sql);

		$statement->executeUpdate($param);

        /**
         * close cursor it this is a transaction statement
         */
        if($this->transaction){
            $statement->closeCursor();
        }
	}
    /**
     * close the database connection
     */
	public function __destruct()
    {
        $this->db = null;
    }

}
