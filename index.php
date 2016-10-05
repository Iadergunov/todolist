<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
  <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
<!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel='stylesheet' type='text/css'>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="http://todolist.tw1.ru/">
                    Task List
                </a>
                <a class="navbar-brand" href="http://todolist.tw1.ru/finance.php">
                    Finance
                </a>
                
	            <ul class="nav navbar-nav navbar-right">
					<li><a href="#">Войти</a></li>
				    <li><a href="#">Регистрация</a></li>
				</ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">

                    <!-- New Task Form -->
						<form class="form-horizontal">
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" id="task-name" class="form-control" placeholder="Enter new task">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" id="Add">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody id='current' class="col-sm-12">
                              
                               <?php 
                                    include 'db_auth.php';
                                    foreach($mysqli->query('SELECT * from tasks') as $row) {
                                      $txt = $row['task_text'];
                                      $id = $row['id'];
                                      $task_status = $row['is_done'];
                                      if($task_status){
                                        $background_color = "rgb(204,238,204)";
                                      }else{
                                        $background_color = "rgb(256,256,256)";
                                      }
                                      echo '<tr id="task_' . $id .'" style="background-color: '. $background_color . ';">
                                        <td class="table-text"><div>' . htmlspecialchars($txt) . '</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <button class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </td>
                                        <!-- Task Edit Button -->
                                        <td>
                                            <button class="btn btn-danger">
                                                <i class="fa fa-btn fa-pencil"></i>Edit                                                
                                            </button>
                                        </td>    
                                    </tr>';
                               		}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="scripts.js"></script>

</body>
</html>