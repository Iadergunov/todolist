<?php 
	$id_task = $_POST['id_task'];
    echo $id_task;
    //Connect to db
    include 'db_auth.php';
    if (!($stmt = $mysqli->prepare("DELETE FROM tasks WHERE id = ?"))) {
        echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
    }   
    // connect 
    if (!$stmt->bind_param("i", $id_task)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }
    // execute query
    if (!$stmt->execute()) {
    echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }
    echo "Oke";                       
?>