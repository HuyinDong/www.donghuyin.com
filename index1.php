<?php
 include('global.php');
 $query=$database->select("*","p_newsbase");
 $row=$database->fetch($query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>
	<?php
	$query4=$database->select("*","p_config");
	$row4=$database->fetch($query4);
	echo $row4['name'];
	?>
	
	</title>

    <!-- Bootstrap core CSS -->
	
   <link href="./bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" type="text/css" href="./assets/css/unslider.css"/>
    <!-- Custom styles for this template -->
	 <link href="./Flat-UI-master/css/flat-ui.css" rel="stylesheet" />
	 
	  	<link href="./assets/css/animate.css" rel="stylesheet" />
			<link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="container">
	<div class="row">
	<div class="col-md-12 ">
	<div class="navbar navbar-inverse navbar-fixed-top" id="header" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
			  <a class="navbar-brand" href="#"><?=$row4['values']?></a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">           
		
                <li class="drop">
                  <a href="#" class="na">test<b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#">subtest</a></li>
					<li><a href="#">subtest</a></li>
					<li><a href="#">subtest</a></li>
					<li><a href="#">subtest</a></li>
		
                  </ul>
				  
                </li>
           
          <li><a href="wc.php">世界杯</a></li>
               </ul>
			    <ul class="nav navbar-nav pull-right">    
		<li><a href="./management/index.php" >后台管理</a></li>
      </ul>
            </div><!-- /.navbar-collapse -->
         </div>
		
        </div>
		</div>
	
		 </div>
		

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/jquery-migrate-1.2.1.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
	
	
	<script>
	$(function(){
	$(".dropdown-menu").hide();
	
	$(".drop").mouseover(function() {
		$('.dropdown-menu').slideDown(500);
	});
	$(".drop").mouseout(function() {
		$('.dropdown-menu').hide(300);
	});
	});
	

	
	</script>
	
  </body>
</html>
