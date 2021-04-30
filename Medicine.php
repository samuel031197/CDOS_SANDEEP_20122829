<?php
require_once 'DBTrait.php';

class Medicine
{

    use DBTrait;
    private $table="medicines";


    public function get_medicines(){
        $query = "SELECT * FROM $this->table";
        $obj_db = $this->get_db_conn();
        $data = $obj_db->query($query)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function add_medicine(){
        extract($_POST);
        $query = "INSERT INTO `$this->table` (`id`, `medicine_name`, `description`, `formula`, `price`, `company_name`, `created_at`, `updated_at`) VALUES (NULL,'$name','$description','$formula',$price,'$company',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
        $obj_db = $this->get_db_conn();
        $data = $obj_db->query($query);
    }
    public function update_medicine(){
        extract($_POST);
        $query = "UPDATE `$this->table` SET `medicine_name`='$name',`description`='$description',`formula`='$formula',`price`=$price,`company_name`='$company',`updated_at`=CURRENT_TIMESTAMP WHERE id=$id";
        $obj_db = $this->get_db_conn();

//        echo $query;die;
        $data = $obj_db->query($query);
    }
    public function delete_medicine(){
        extract($_GET);
        $query="DELETE FROM $this->table WHERE id=$id";
        $obj_db = $this->get_db_conn();

        $data = $obj_db->query($query);
    }

}