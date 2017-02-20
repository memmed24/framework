<?php
include "db.php";

class baseModel{

    public $db;

    public function __construct()
    {
        $this->db = new database("cms", "root", "");
    }

}
