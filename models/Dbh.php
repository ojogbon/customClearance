<?php
include_once "DbHandler.php";
    class Dbh extends DbHandler
    {
        protected $servername;
        protected $username;
        protected $password;
        protected $dbname;
        protected $charset;

        public function dbConnect()
        {
            $this->servername = "localhost" ;
            $this->username = "root";
            $this->password = "";
            $this->dbname = "clearance";
            $this->charset = "utf8mb4";


            try {
                $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Connection Failed: ".$e->getMessage();
            }
        }
    }

?>
