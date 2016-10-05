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
    </div>
    <div class="container">

        
            <div class="tabbable tabs-left">
          <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Раздел 1</a></li>
        <li><a href="#tab2" data-toggle="tab">Раздел 2</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <p>Я в Разделе 1.</p>
        </div>
        <div class="tab-pane" id="tab2">
          <p>Привет, я в Разделе 2.</p>
        </div>
  </div>



        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">

                    <!-- New Task Form -->
						<div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" id="Add_trans">
                                    <i class="fa fa-btn fa-plus"></i>Add Transactions
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All transactions
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include 'db_auth.php';
                                    foreach($mysqli->query('SELECT * from transactions') as $row) {
                                      $name = $row['name'];
                                      $date = $row['date'];
                                      $amount = $row['amount'];
                                      $id_wallet = $row['id_wallet'];
                                      $id_trans_type = $row['id_trans_type'];
                                      echo '<tr class="active">
                                        <td><div>' . $name . '</div></td>
                                        <td><div>' . $amount . '</div></td>
                                        <td><div>' . $date . '</div></td>
                                        <td><div>' . $id_trans_type . '</div></td>
                                        <td><div>' . $id_wallet . '</div></td>    
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
    <script type="text/javascript">$(document).ready(function(){    $(".left-options .option").hover(function(){        $(".left-options .tooltip p").text($(this).attr("data"));       $(".left-options .tooltip").show();     $(".left-options .tooltip").offset({top:$(this).offset().top,left:$(this).offset().left+60});   },function(){       $(".left-options .tooltip").hide(); }); $(window).scroll(function(){        var windowpos = $(window).scrollTop();      if(windowpos < 5) {         $(".left-options .top").fadeOut(500);       } else {            $(".left-options .top").fadeIn(500);        }   }); var windowpos = $(window).scrollTop();  if(windowpos < 5) {     $(".left-options .top").fadeOut(500);   } else {        $(".left-options .top").fadeIn(500);    }   $.fn.scrollToTop=function(){        $(this).click(function(){           $("html, body").animate({scrollTop:0},"normal");        }); };  $(".left-options .top").scrollToTop();});</script><div class="lm">
    <div class="left-options nomain">
        <div class="background"></div>
        <div class="tooltip"><p></p></div>
        <div class="options-block">
            <div class="option home" data-id="1" data="На главную" onclick="location.href='/'"></div>
            <div class="option back" data-id="2" onclick="history.go(-1)" data="Назад"></div>
            <div class="option top" data-id="3" data="Наверх" style="display: none;"></div>
        </div>
        <p><a href="http://hello-site.ru">Hello-Site.ru. Бесплатный конструктор сайтов.</a></p>
    </div>
</div><style type="text/css">.left-options{width: 60px;height: 100%;position: fixed;top: 0;left: 0;z-index: 500;}.left-options .background{width: 100%;height: 100%;position: absolute;background: rgb(35, 38, 72);opacity: 0.1;z-index:500;}.left-options .option{color: white;text-shadow: 0px 0px 2px rgb(17, 17, 17);font-size: 30px;cursor: pointer;z-index:600;position: relative;width:100%;height: 50px;opacity: 0.5;border-bottom: 1px solid rgb(100, 201, 226);}.left-options .back{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -171px -74px;}.left-options .top{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -294px -76px;display:none;}.left-options .home{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -109px -119px;}.left-options .message{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -109px 9px;}.left-options .search{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -232px -33px;}.left-options .like{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -48px 8px;}.left-options .construct{background: url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37, 184, 249);background-position: -294px 8px;}.left-options .option:hover{opacity:0.9;}.left-options .tooltip{display: none;position: absolute;background: rgb(250, 250, 250);padding: 5px 7px 4px;opacity: 1;left: 100px;font-size: 9px;font-family: "Source Sans Pro", sans-serif;text-transform: uppercase;letter-spacing: 0.1em;line-height: 14px;text-align: center;width: 100px;background: rgb(220, 78, 82);color: white;font-weight: bold;}.tooltip p{margin:0;}.left-options .option.newoption{background:url(http://hello-site.ru/main/images/leftmenu-sprite.png) no-repeat rgb(37,184, 249);background-position: -49px 9px;}.left-options > p{display:none;}</style>
  	<script src="jquery-3.1.1.min.js"></script>
  	<script type="text/javascript" src="scripts.js"></script>

</body>
</html>