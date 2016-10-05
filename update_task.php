<?php 
    $id_task = $_POST['id_task'];
    $new_text = $_POST['task_text'];

    include 'db_auth.php';

    if (!($stmt = $mysqli->prepare("UPDATE tasks SET task_text = ? WHERE id = ?"))) {
        echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
    }   
    
    if (!$stmt->bind_param('si', $new_text, $id_task)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    if (!$stmt->execute()) {
    	echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }
    
?>