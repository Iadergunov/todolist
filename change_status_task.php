<?php 
    $id_task = $_POST['id_task'];
    $is_done = $_POST['status'];

    include 'db_auth.php';

    if (!($stmt = $mysqli->prepare("UPDATE tasks SET is_done = ? WHERE id = ?"))) {
        echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
    }   
    
    if (!$stmt->bind_param('ii', $is_done, $id_task)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    if (!$stmt->execute()) {
    	echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }
    else{
    	echo "Yeah";
    }
?>