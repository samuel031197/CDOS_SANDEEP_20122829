<?php


trait DBTrait
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "assignment_crud";

    function get_db_conn()
    {
	$obj_db = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
     
        return $obj_db;
    }
}