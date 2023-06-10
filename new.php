<?php 
include "db.php";
$year = $_POST['year'];
$name = $_POST['name'];
$query = "SELECT * FROM data";
if(($_POST['year']!=="")){
   $query.= " WHERE year = {$year}";
}
if($_POST['name']!==""){
    $query.= " AND name = '".$name."'";
}
echo $query;
?>