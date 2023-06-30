<?php
// require __DIR__ . '/../config/conn.php';
// $sql = new sql_info;

class sql_get extends connect{

    function show_all($table_name){
        $show_all_sql = "SELECT * FROM `$table_name`";
        $result = $this->connection()->query($show_all_sql);
        return $result;
    }
    function show_where($table_name, $grab_point, $grab_point_value){
        $show_where_sql = "SELECT * FROM `$table_name` WHERE `$grab_point` = '$grab_point_value';";
        $result = $this->connection()->query($show_where_sql);
        return $result;

    }
    function insert_all($table_name, $insert_row_names, $insert_row_values){
        $insert_all_sql = "INSERT INTO `$table_name`($insert_row_names) VALUES ($insert_row_values)";
        $result = $this->connection()->query($insert_all_sql);
        return $result;

    }
    
    function insert_where(){
        $insert_where_sql = "";
        $result = $this->connection()->query($insert_where_sql);
        return $result;

    }
    function update_all($table_name, $update_rows_and_values, $grab_point, $grab_point_value){
        $update_all_sql = "UPDATE `$table_name` SET $update_rows_and_values WHERE `$grab_point` = '$grab_point_value';";
        $result = $this->connection()->query($update_all_sql);
        return $result;

    }
    function update_where(){
        $update_where_sql = "";
        $result = $this->connection()->query($update_where_sql);
        return $result;

    }
    function delete_all($table_name, $grab_point, $grab_point_value){
        $delete_all_sql = "DELETE FROM `$table_name` WHERE `$grab_point` = '$grab_point_value';";
        $result = $this->connection()->query($delete_all_sql);
        return $result;

    }
    function delete_where(){
        $delete_where_sql = "";
        $result = $this->connection()->query($delete_where_sql);
        return $result;

    }
    function msg_inbox($sender_username, $reciver_username){
        $msg_inbox_sql = "SELECT * FROM `messages` WHERE `sender_username` = '$sender_username' AND `reciver_username` = '$reciver_username' OR `reciver_username` = '$sender_username' AND `sender_username` = '$reciver_username';";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    // SELECT * FROM `messages` WHERE sender_username = "Jhumur Roy" AND reciver_username = "Lokeshwar Deb";]]

    // main sql for inbox is
    // SELECT * FROM `messages` WHERE sender_username = 'Lokeshwar Deb' AND reciver_username = 'Jhumur Roy' OR sender_username = 'Jhumur Roy' AND reciver_username = 'Lokeshwar Deb';
    function msg_one_inbox($sender_username, $reciver_username){
        $msg_inbox_sql = "SELECT * FROM `messages` WHERE sender_username = '$sender_username' AND reciver_username ='$reciver_username';";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    function msg_join_inbox(){
        $msg_inbox_sql = "SELECT * FROM `messages` me JOIN users u ON me.sender_username = u.username;";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    // SELECT * FROM `chat_users` cu JOIN users u ON cu.username = u.username;
    function join_sql_all($table_name1, $table_name2,  $short_form1, $short_form2, $grab_point){
        $msg_inbox_sql = "SELECT * FROM `$table_name1` $short_form1 JOIN $table_name2 $short_form2 ON $short_form1.$grab_point = $short_form2.$grab_point;";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    // SELECT * FROM `chat_users` cu JOIN users u ON u.username = cu.username WHERE u.username = "Lokeshwar Deb";
    function join_sql_where($table_name1, $table_name2,  $short_form1, $short_form2, $grab_point, $grab_point_value){
        $msg_inbox_sql = "SELECT * FROM `$table_name1` $short_form1 JOIN $table_name2 $short_form2 ON $short_form1.$grab_point = $short_form2.$grab_point WHERE $short_form2.$grab_point = '$grab_point_value';";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    // SELECT * FROM `chat_users` cu JOIN users u ON cu.username = u.username JOIN `messages` m ON m.sender_username = u.username;
    function join_2_sql_all($table_name1, $table_name2, $table_name3,  $short_form1, $short_form2, $short_form3, $grab_point, $grab_point2){
        $msg_inbox_sql = "SELECT * FROM `$table_name1` $short_form1 JOIN $table_name2 $short_form2 ON $short_form1.$grab_point = $short_form2.$grab_point JOIN `$table_name3` $short_form3 ON $short_form3.$grab_point2 = $short_form2.$grab_point";
        $result = $this->connection()->query($msg_inbox_sql);
        return $result;

    }
    function html_special_chars($info){
       
        $result =  htmlspecialchars(mysqli_real_escape_string($this->connection(), $info));
       
        return $result;

    }



}


?>