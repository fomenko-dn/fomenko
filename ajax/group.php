<?php
    require_once'../db.php';
    // $status = $_POST['status'];
    $error = null;
    $checkedid = $_POST['checkedid'];
    $sel = $_POST['sel'];

    if($checkedid == null){
        $error = array('code' => 100, 'message' => "User don`t choose");
        exit();
    } else if ($sel == '0'){
        $error = array('code' => 100, 'message' => "Action don`t choose");
        exit();
    } else {
        $error = null;
        $n = count($checkedid);
        $imp = implode($checkedid, ',');
    }
    
    if ($sel == '0'){
        $error = array('code' => 100, 'message' => "Action don`t choose");
    } elseif($sel == 'del-grp'){
        for($i=0; $i < $n; $i++){
            $query = $pdo->prepare("DELETE FROM users WHERE id IN ($imp)");
            $query->execute(array($imp));
        }
        $action = array($imp);
    } elseif($sel == 'set-act'){
        for($i=0; $i < $n; $i++){
            $query = $pdo->prepare("UPDATE users SET status = 1 WHERE id IN ($imp)");
            $query->execute(array($imp));
        }
        $action = array($imp);
    } else if($sel == 'set-no-act') {
        for($i=0; $i < $n; $i++){
            $query = $pdo->prepare("UPDATE users SET status = 0 WHERE id IN ($imp)");
            $query->execute(array($imp));
        }
        $action = array($imp);
    } 
    echo json_encode(array(
        'error' => $error,
        'sel' => $sel,
        'action' => $action,
        'n' => $n
    ));
