<?php 
    include_once("../includes/db_connect.php");
    require_once('../includes/mysql_connection.php');
    $con = new MysqlDB();
    $con->connect();
    if(isset($_POST)){
        $result = $con->insert($_GET['table'], $_POST);
        echo json_encode($result);
    }else {
        echo "Request is not POST.Try to send Data in POST";
    }
?>