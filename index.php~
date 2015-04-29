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
    <meta name="description" content="Java, php,algorithm">
    <meta name="author" content="donghuyin">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>
	<?php
	$query4=$database->select("*","p_config");
	$row4=$database->fetch($query4);
	echo $row4['values'];
	?>
	
	</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
	 <link href="./Flat-UI-master/css/flat-ui.css" rel="stylesheet" />
	  <link href="./Flat-UI-master/css/demo.css" rel="stylesheet" />
	  	<link href="./assets/css/animate.css" rel="stylesheet" />
			<link href="./assets/css/style.css" rel="stylesheet">
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
			  <a class="navbar-brand" href="index.php">
			
			  <?=$row4['values']?></a>
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
                    <li><a href="./list.php?id=<?=$row2['id']?>"><?=$row2['name']?></a></li>
					<?php
                 while($row2=$database->fetch($query2)){
                ?>				 
                <li><a href="./list.php?id=<?=$row2['id']?>"><?=$row2['name']?></a></li>
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
		<div class="row" id = "middle">
		 <div class="col-sm-6">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./assets/img/bd.jpg" alt="...">
      <div class="carousel-caption">
       Bid Data
      </div>
    </div>
    <div class="item">
      <img src="./assets/img/java1.gif" alt="...">
      <div class="carousel-caption">
        Java
      </div>
    </div>
   <div class="item">
      <img src="./assets/img/cloud.jpg" alt="...">
      <div class="carousel-caption">
        Cloud
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		 </div>
		 <div class="col-sm-6">
		
        <h6 class="text-center bg-primary border-top-radius">Latest Update Articles</h6>
        <div class="list-group">
   	<?php
	 $query3=$database->select("*","p_newsbase"," ORDER BY  `date` DESC LIMIT 5",false);
  while($row3=$database->fetch($query3)){
?>

	<a href="./articles.php?id=<?=$row3['id']?>" class="list-group-item text-center shake"><?=$row3['title']?><small>-----<?=$row3['author']?></small></a>
  <?php
  }
  ?>
</div> 
	 </div>
	 </div>
	 <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row text-center">
        <div class="col-sm-4 view" >
	<div class = "thumbnail " id = "video">
          <h4 class = "animated bounce" id = "videoContent">Video</h4>
          <p>Videos for learning, still processing</p>
          <p><a class="btn btn-primary" href="#" role="button">Know more &raquo;</a></p>
	</div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 view">
	<div class="thumbnail" id = "download">
          <h4 class = "animated bounce" id = "downloadContent">Software</h4>
          <p>xampp，Eclipse etc. to download</p>
          <p><a class="btn btn-primary" href="#" role="button">Know more &raquo;</a></p>
	</div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 view">
	<div class= "thumbnail" id = "codes">
          <h4 class = "animated bounce" id = "codesContent">Codes</h4>
          <p>Front-end and Back-end codes</p>
          <p><a class="btn btn-primary" href="#" role="button">Know more &raquo;</a></p>
	</div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	 </div>
    <div class="text-center">
	<hr/>
      <p>Copyright reserved by aptattack.com.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="./slick/slick.min.js"></script>
	<script src="./assets/js/headroom.js"></script>
	<script src = "./assets/js/dropdown.js"></script>

	<script>
	$(function(){
	$('#header').addClass('animated fadeInDown');
	$('#video').hover(
		function(){
		$('#videoContent').removeClass('bounce');
		},
		function(){
		$('#videoContent').addClass('bounce');
		}
	);
	$('#download').hover(
		function(){
		$('#downloadContent').removeClass('bounce');
		},
		function(){
		$('#downloadContent').addClass('bounce');
		}
	);
	$('#codes').hover(
		function(){
		$('#codesContent').removeClass('bounce');
		},
		function(){
		$('#codesContent').addClass('bounce');
		}
	);
	});
	</script>
  </body>
</html>
