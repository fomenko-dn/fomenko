<?php
    require_once'../db.php';
    $first_name = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $last_name = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
    $role = $_POST['role'];
    $status = $_POST['status'];
    $error = null;
    if(strlen($first_name) <= 3){ //если длина переменной меньше трехсимволов
        $error = array('code' => 100, 'message' => "Введите полное имя");
        exit();
    } else if(strlen($last_name) <= 3){ //если длина переменной меньше трехсимволов
        $error = array('code' => 100, 'message' => "Введите полную фамилию");
        exit();
    }

    $id = $_POST['id'];
    if($id != null){
        $id = $_POST['id'];
        is_numeric($id);
        $sql = "SELECT id FROM users WHERE id=".$id;
        $result = $pdo->prepare($sql);
        $result->execute([$id]);
        $user_id = $result->fetch(PDO::FETCH_ASSOC);
        if ($user_id['id'] == $id){
            $error = null;
        } else {
            $error = array('code' => 100, 'message' => "Not found user");
        }
        $sql = "UPDATE users SET first_name=?, last_name=?, role=?, status=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute([$first_name, $last_name, $role, $status, $id]);
        $u = array('first_name' => $first_name, 'last_name' => $last_name, 'role' => $role, 'status' => $status, 'id' => $id);
        echo json_encode(array(
            'error' => $error,
            'users' => $u
        ));
    } else {
        $sql = 'INSERT INTO users(first_name, last_name, role, status) VALUES (?, ?, ?, ?)';
        $query = $pdo->prepare($sql);
        $query->execute([$first_name, $last_name, $role, $status]);
        $LAST_ID = $pdo->lastInsertId();
        $u = array('first_name' => $first_name, 'last_name' => $last_name, 'role' => $role, 'status' => $status);

        echo json_encode(array(
            'error' => $error,
            'LAST_ID' => $LAST_ID,
            'users' => $u
        ));
    }
