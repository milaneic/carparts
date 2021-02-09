<?php

session_start();
if ($_SESSION['role'] != '1') {
    header('Location:../index.php');
}

require 'dbConfig.php';
$id = $_GET['id'];


$query = "DELETE FROM delovi WHERE id=" . $id;

if ($db->query($query) === TRUE) {
    header("Location:../admin.php");
} else {
    echo "SQL: " . $query . " Error:" . $db->error;
}
