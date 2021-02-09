<?php

$dbHost="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="autodelovi";

$db= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


if($db->connect_error)
{
    die("Connection failed: ".$db->connection_error);
}

?>