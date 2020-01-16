<?php 
    include_once("../includes/db_connect.php");
    require_once('../includes/mysql_connection.php');
    $con = new MysqlDB();
    $con->connect();
    if(isset($_POST)){
        $result = $con->update(TRANSFER_LIMIT,$_POST,$condition="id=".$_GET['id']);
        echo json_encode($result);
    }else {
        echo "Request is not POST.Try to send Data in POST";
    }
?>