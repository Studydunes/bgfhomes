<?php 
    include_once("../includes/db_connect.php");
    //require_once('../includes/mysql_connection.php');
    require_once('../includes/functions.php');
    //$con = new MysqlDB();
    //$con->connect();

    if(isset($_POST)){
        $table = $_POST['table'];
        $id_col = $_POST['id_col'];
        $value_col = $_POST['value_col'];
        $selected = $_POST['selected'];
        $cond = $_POST['cond'];

        echo get_new_optionlist($table,$id_col, $value_col, $selected , $cond);
    }else{
        //echo "Something Went Wrong";
    }
    
?>