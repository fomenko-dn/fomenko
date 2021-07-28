<?php
require_once'../db.php';

$id = $_POST['id'];
if($_POST['id']){
    $id=$_POST['id'];
    is_numeric($id);
}

$sql = "SELECT id FROM users WHERE id = ".$id;
$query = $pdo->prepare($sql);
$query->execute([$id]);
$user = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
    'status' => 'ok',
    'user' => $user,
));
exit();