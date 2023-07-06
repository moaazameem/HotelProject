<?php
$table=$_POST["table"];
$id=$_POST["id"];
session_start();
$_SESSION["refresh"]="no";
$host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="Menuitems";

$conn = mysqli_connect("$host","$dbusername","$dbpassword","$dbname");

if(!$conn)
{
    echo " Error in connection";
}

$sql3="DELETE FROM $table WHERE id=$id";
mysqli_query($conn,$sql3);  
   header('location:../php/delete.php');

   ?>