<?php

class DBMySQL
{
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    /**
     * class.DBMySQL constructor.
     * @param string $g_hostname
     * @param string $g_db_username
     * @param string $g_db_password
     * @param string $g_database_name
     */
    function __construct($g_hostname, $g_db_username, $g_db_password, $g_database_name)
    {
        $this->servername = $g_hostname;
        $this->username = $g_db_username;
        $this->password = $g_db_password;
        $this->dbname = $g_database_name;

    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Creates and checks connection
     */
    function connectDB()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Connection to database failed: " . $this->conn->connect_error);
        }
    }

    /**
     * Closes the created connection
     */
    function closeDB()
    {
        $this->conn->close();
    }

}