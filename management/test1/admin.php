<?
include_once('global.php');
include_once('check.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bootstrap-3.1.1/docs/examples/offcanvas/offcanvas.css" rel="stylesheet">
		<link rel="stylesheet" href="style.css" />
     <link href="./bootstrap-3.1.1\docs\examples\sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
   <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header ">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="admin.php">Program Learning & Developing Website Management System</a>
        </div>
         </div><!-- /.container -->
    </div><!-- /.navbar -->
 
<div class="panel-group col-xs-6 col-sm-3 sidebar-offcanvas" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <h5 class="text-center">-Management-</h5>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       <a href="configuration.php" class="list-group-item">Configuration</a>
            <a href="admin.php?logout=logout" class="list-group-item">Logout</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
         <h5 class="text-center">-News Content-</h5>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="catagory.php" class="list-group-item">News Catagory</a>
            <a href="newslist.php" class="list-group-item">News List</a>
            <a href="addnews.php" class="list-group-item">Add News</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <h5 class="text-center">-Version Info.-</h5>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="#" class="list-group-item">Version1.0</a>
            <a href="http://www.aptattack.com" class="list-group-item">www.aptattack.com</a>
      </div>
    </div>
  </div>
</div>
<div id=admin>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h3>Welcome to the Program Learning & Developing Website</h3>
            <p>Program Learning & Developing Website, where you can read many articles related to the programming, such as Java, PHP and Mysql. You can know the latest news of IT field. Meanwhile, variety of tips of learning program, which would be helpful for the beginner. Here is the backstage of the website so that you can add,edit and delete articles which will displayed on the website. It is convinient for the administrator to manage them. Of course, many places should be improved and you are welcomed to give me your advice.</p>
          </div>
         
         
        </div><!--/span-->

       </div>
	   </div>
     </div>
     
     <div class="text-center navbar-fixed-bottom">
	<hr/>
      <p>Copyright reserved by aptattack.com.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>
  <script src="./js/jquery-1.8.2.min.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="./bootstrap-3.1.1/docs/examples/offcanvas/offcanvas.js"></script>
</body>
</html>

