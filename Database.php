<?php
// session_start();
$host="localhost";
$user="root";
$pass="";
$dbname="newinvoicephp";
$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn)
{
    die("not");
}

?>
