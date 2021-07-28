<?php
require_once'../db.php';

$error = null;
$id = $_POST['id'];
if($_POST['id']){
    $id=$_POST['id'];
    is_numeric($id);
} 

$sql = "DELETE FROM `users` WHERE `id` = ".$id." LIMIT 1";
$query = $pdo->prepare($sql);
$query->execute([$id]);

echo "YES";
