<?php

class DatabaseConfig extends PDO {

    public $db_connect;
    private $db_host = "127.0.0.1";
    private $db_name = "ghmedic";
    private $db_user = "root";
    private $db_pass = "";

    public function __construct()
    {
        if(is_null($this->db_connect)) {
            $this->db_connect = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
        }

        return $this->db_connect;
    }
}