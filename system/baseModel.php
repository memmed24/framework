<?php
include "db.php";

class baseModel{

    private $db;

    public function __construct()
    {
        $this->db = new database('localhost', 'root', '', '');
        $this->db->connect();
    }

}
