<?php
function users_all($link){
        // запрос
        $query = "SELECT * FROM users"; // ВЫБРАТЬ * ВСЕ КОЛОНКИ из таблицы И ОТСОРТИРОВАТЬ по выбраной колонке В УБЫВАЮЩЕМ ПОРЯДКЕ
        $result = mysqli_query($link, $query); // запрос 

        if (!$result) // если произошла ошибка
            die(mysqli_error($link));

        // извлечение из БД
        $n = mysqli_num_rows($result); // получаем количество строк, которое нам вернула база
        $users = array(); // создаем пустой массив

        for ($i = 0; $i < $n; $i++) { 
            $row = mysqli_fetch_assoc($result); // проходимся по каждой строке нашей таблицы
            $users[] = $row; // добавляем асоциативный массив строки в таблице в массив, который называется articles
        }

        return $users; // возвращаем результат

    }

function users_delete($link, $id){
    $id = (int)$id;
    // check
    if ($id == 0)
        return false;

    // query
    $query = sprintf("DELETE FROM users WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}

function users_edit($link, $id, $first_name, $last_name, $role, $status){
        // preparation
        $first_name = trim($first_name);
        $last_name = trim($last_name);
        $role = trim($role);
        $status = trim($status);
        $id = trim($id);

        // check
        if ($first_name == '')
            return false;

        // query
        $sql = "UPDATE users SET first_name='%s', last_name='%s', role='%s', status='%s' WHERE id='%d'";

        $query = sprintf($sql,mysqli_real_escape_string($link, $first_name), 
            mysqli_real_escape_string($link, $last_name), 
            mysqli_real_escape_string($link, $role),
            mysqli_real_escape_string($link, $status),
            $id);

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));
        return mysqli_affected_rows($link);
        
    }

function user_get($link, $id_user){
        // Запрос
        $query = sprintf("SELECT * FROM users WHERE id=%d", (int)$id_user);
        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        $user = mysqli_fetch_assoc($result);

        return $user;
    }
