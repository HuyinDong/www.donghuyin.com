<?php
  
  include('./test1/global.php');
 
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
if($_POST['sub']){
  
  
  $query=$database->select("*","p_admin",'`mid` = \'' . $_POST['UserName'] . '\'');

  $row=$database->fetch($query);
 
   if($row == null){
	echo "<script language='javascript' type='text/javascript'>alert('UserName invalid or wrong password')</script>";	
	}else if($_POST['pwd']==$row['passwd']){
  echo "<meta http-equiv='refresh' content='2;url=./test1/admin.php'>";
   $_SESSION['UN']=$_POST['UserName'];
  $_SESSION['pw']=$_POST['pwd'];
  }
 else{
 echo "<script language='javascript' type='text/javascript'>alert('UserName invalid or wrong password')</script>";	
} 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Login System</title>

    <!-- Bootstrap core CSS -->
    <link href="./test1/bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./test1/bootstrap-3.1.1/docs/examples/jumbotron/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
body{
	text-align:center;
font-family:"Comic Sans MS", cursive;
  }
  #Intro{width:300px;
		 font-size:16px;
  }

h4{
	text-align:center;
	
	font-weight: bold;
}

</style>
  </head>

  <body>
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand " href="index.php">Program Learning & Developing Website Management System</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method='POST'>
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" name="UserName">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="pwd">
            </div>
            <input type="submit" class="btn btn-success" name='sub' value='Sign in'>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	<div id="ads">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2909789247733584";
/* Ads */
google_ad_slot = "6902796359";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h3>Welcome to the Program Learning & Developing Website</h3>
        <p>Program Learning & Developing Website, where you can read many articles related to the programming, such as Java, PHP and Mysql. You can know the latest news of IT field. Meanwhile, variety of tips of learning program, which would be helpful for the beginner. Here is the backstage of the website so that you can add,edit and delete articles which will displayed on the website. It is convinient for the administrator to manage them. Of course, many places should be improved and you are welcomed to give me your advice.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Bootstrap</h2>
          <p>Boostrap is used as the frame of the website. Bootstrap contains many classes which are beautiful and convinient for the beginner. the author are trying to use it as more as he can.</p>
                  </div>
        <div class="col-md-4">
          <h2>Database</h2>
          <p>All the data are reserved on the server, which means all the content on the website can be edited on the database, without understanding any knowledge about html. </p>
              </div>
        <div class="col-md-4">
          <h2>PHP</h2>
          <p>PHP is used to build the connection between website and database, it contains few functions of the management system, but the principle is the same as other complicate systems.</p>
                 </div>
      </div>

      <hr>

      <footer>
        <p>&copy; aptattack 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./test1/bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>

</body>
</html>

