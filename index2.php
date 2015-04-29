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
	asdf
	</title>

    <!-- Bootstrap core CSS -->
    
    <!-- Custom styles for this template -->
	 <link href="Flat-UI-master/css/flat-ui.css" rel="stylesheet"/>
	  <link href="Flat-UI-master/css/demo.css" rel="stylesheet"/>
	  	<link href="assets/css/animate.css" rel="stylesheet"/>
			<link href="assets/css/style.css" rel="stylesheet"/>
			<link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
			<link rel="stylesheet" type="text/css" href="slick/css/style.css"/>
    
  </head>

  <body>
	
	<section id="features" class="blue">	
<div class="content">	
				<div class="slider fade">
					<div><img src="./slick/img/fonz1.png" /></div>
					<div><img src="./slick/img/fonz2.png" /></div>
					<div><img src="./slick/img/fonz3.png"/></div>		
				</div>							
				</div>
		</section>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="slick/js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="slick/js/jquery-migrate-1.2.1.js"></script>
	<script type="text/javascript" src="slick/slick/slick.min.js"></script>
	<script type="text/javascript" src="slick/js/scripts.js"></script>
	<script>
	
	</script>
  </body>
</html>
