<?php

class Table_Handler implements Db
{
    public $table;
    public $link;

    public function __construct($table_name)
    {
        try {
            $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $this->set_table($table_name);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            error_log($ex->getMessage());
        }

    }

    public function set_table($table)
    {
        $this->table = $table;
    }

    public function select_record_by_id($id)
    {
        $query = "SELECT * FROM `{$this->table}` WHERE `id` = {$id}";
        $result = mysqli_query($this->link, $query);
        return mysqli_fetch_array($result);
    }

    public function select_records($first_record)
    {
      
        $query= "select * from ".$this->table." limit $first_record,".record_per_page;
        return $this->query($query);
    }
    private function query($sql){
     
      $result=mysqli_query($this->link,$sql);
      $results=array();
      while( $row=mysqli_fetch_array($result)){
       $results[]=$row;
      }
      if(count($results)===1) return $result[0];
      else return $results;
}
}