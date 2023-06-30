<?php
require __DIR__ . '/../config/conn.php';
$sql = new sql_info;

class sql_info extends connect{

    function show_all(){
        $show_all_sql = "";
        $result = $this->connection()->query($show_all_sql);
    }
    function show_where(){
        $show_where_sql = "";
        $result = $this->connection()->query($show_where_sql);
    }
    function insert_all(){
        $insert_all_sql = "";
        $result = $this->connection()->query($insert_all_sql);
    }
    
    function insert_where(){
        $insert_where_sql = "";
        $result = $this->connection()->query($insert_where_sql);
    }
    function update_all(){
        $update_all_sql = "";
        $result = $this->connection()->query($update_all_sql);
    }
    function update_where(){
        $update_where_sql = "";
        $result = $this->connection()->query($update_where_sql);
    }
    function delete_all(){
        $delete_all_sql = "";
        $result = $this->connection()->query($delete_all_sql);
    }
    function delete_where(){
        $delete_where_sql = "";
        $result = $this->connection()->query($delete_where_sql);
    }



}


?>