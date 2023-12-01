<?php
$srvr="localhost";
$user="root";
$pass="";
$db="codepr";//database name

$conn=new mysqli($srvr,$user,$pass,$db);

if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}
?>