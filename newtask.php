<?php 
	$text_task = $_POST['task'];
    //Connect to database
    include 'db_auth.php';
    
    if (!($stmt = $mysqli->prepare("INSERT INTO tasks(task_text) VALUES (?)"))) {
        echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
    }   
    
    if (!$stmt->bind_param("s", $text_task)) {
        echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    if (!$stmt->execute()) {
    echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
    }
    //Get id last inserted task
    $result = $mysqli->query('SELECT MAX(id) from tasks');
    $row = $result->fetch_row();
    $send_data = array(
    "id" => $row[0],
    );
    //close connection and send encoded id
    die(json_encode($send_data));
?>
