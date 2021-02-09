<?php 
session_start();
if($_SESSION['role']!='1'){
    header("Loacation:../index.php");
}
require_once 'dbConfig.php';
$id=$_GET['id'];
if($id!=null && !empty($id)){
    $sql="DELETE FROM users WHERE id=".$id;
    if($db->query($sql)===TRUE){
        header("Location:../pregled-korisnika.php");
    }else{
        echo "Error: ".$sql." <br>".$db->error;
    }
}else{
    header("Location:../index.php");
}


?>