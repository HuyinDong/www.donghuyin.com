
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
    <!-- Custom styles for this template -->
	 <link href="./Flat-UI-master/css/flat-ui.css" rel="stylesheet" />
	  <link href="./Flat-UI-master/css/demo.css" rel="stylesheet" />
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
	<div class = 'articlesList'>
	<div class="container">
	<div class="row">
	<div class="col-md-12 ">
	<div class="navbar navbar-inverse navbar-fixed-top" id="header" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
			  <a class="navbar-brand" href="index.php">
			  <?php
			  $query4=$database->select("*","p_config");
	         $row4=$database->fetch($query4);
	          ?>
			  <?=$row4['name']?></a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">           
			     <?php
		$query1=$database->select("*","p_newsclass","f_id =0");
        while($row1=$database->fetch($query1)){

		$query2=$database->select("*","p_newsclass","f_id =".$row1['id']);
		if($row2=$database->fetch($query2)){
		?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle = "dropdown" data-hover = "dropdown"><?=$row1['name']?></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="list.php?id=<?=$row2['id']?>"><?=$row2['name']?></a></li>
					<?php
                 while($row2=$database->fetch($query2)){
                ?>				 
                <li><a href="list.php?id=<?=$row2['id']?>"><?=$row2['name']?></a></li>
		<?php
		}
		?>
                  </ul>
				  
                </li>
                <?php
		}
		  else{
		  ?>
		  <li><a href="#"><?=$row1['name']?></a></li>
		 <?php
		 }
		 }
		 ?>
               </ul>
			    <ul class="nav navbar-nav pull-right">    
		<li><a href="./management/index.php" >Management</a></li>
      </ul>
            </div><!-- /.navbar-collapse -->
         </div>
		
        </div>
		</div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
		  <div class="title">
            <h5> <?=$row3['name']?></h5>
			<hr>
	</div>
	<div>
	<?php
		$query5=$database->select("*","p_newsbase","cid=".$_GET['id']);
		while($row5=$database->fetch($query5)){
		?>
	<blockquote>
	
	
  <p>
	
		<a href="articles.php?id=<?=$row5['id']?>"><?=$row5['title']?></a></p>
		
  <small>Author:<?=$row5['author']?>　　　　　Date:<?=$row5['date']?></small>
</blockquote>
	<hr>
	<?php
	}
	?>
		</div>	
          </div><!-- /.blog-post -->
        <div class="col-md-3 col-sm-offset-1 blog-sidebar">
         <div class="jumbotron">
            <h4>Reserved</h4>
           </div>
         
      </div><!-- /.row -->

   

 </div><!-- /.container -->
</div>

<div class="text-center">
	<hr/>
     <address>
Written by <a href="mailto:donghuyin@gmail.com">Huyin Dong</a>.<br> 
Visit me at:<br>
www.donghuyin.com<br>
Graduate Student in the University of the District of Columbia
</address>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>
    </div>    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="slick/slick.min.js"></script>
	<script src="./assets/js/headroom.js"></script>
	<script src = "./assets/js/dropdown.js"></script>
	<script>
	$(function(){
	$('#header').addClass('animated fadeInDown');
	});
	</script>
  </body>
</html>
