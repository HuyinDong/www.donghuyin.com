<?
  include_once('global.php');
  include_once('check.php');

 if($_GET['Delete']){
   $sql3="DELETE FROM `dongyin_ProgramLearning`.`p_newsbase` WHERE `p_newsbase`.`id` = ".$_GET['id'];
   $query2=mysql_query($sql3);
   $query5=$database->select("*","p_newscontent","`nid`=".$_GET['id']);
  $row5=$database->fetch($query5);
   $sql4="DELETE FROM `dongyin_ProgramLearning`.`p_newscontent` WHERE `p_newscontent`.`id` = ".$row5['id'];
   $query3=mysql_query($sql4);
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
 
<div class="panel-group col-sm-3 sidebar-offcanvas" id="accordion">
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
		   <div id="main">
		   <div id="header" class="well well-lg">
		  <a href='admin.php'>Backstage</a>&gt;&gt;<a href='#'>Newslist</a>
           </div>
<div id='list' >

<form action='' method='GET'>
<table cellspacing="0" class="table table-hover table table-bordered ">
<tr class='headlist'>
	<td color>News Catagory</td><td>Title</td><td>Author</td><td>Date</td><td>Edit</td>
</tr>
<?
 $offset = 0;
 $num = 5;
 $condition = "limit ".$offset.",".$num;
 $query=$database->select("*","p_newsbase");
 $total=mysql_num_rows($query);
 $query=$database->select("*","p_newsbase",$condition,false);
 $page = ceil($total/$num);
 $count = $page;
if($_GET['goto']){
         $offset = $num * ($_GET['p']-1) + $offset;
	 $condition = "limit ".$offset.",".$num;
	 $query=$database->select("*","p_newsbase",$condition,false);
}	
while( $row=$database->fetch($query)){

 $query1=$database->select("*","p_newsclass","`id`=".$row['cid']);
 while($row1=$database->fetch($query1)){

$id=$row['id'];

?>

<tr>
	<td><input type='hidden' name='id' value='<?=$id?>' /><?=$row1['name']?></td><td><?=$row['title']?></td><td><?=$row['author']?></td><td><?=$row['date']?></td><td><a class="btn btn-success btn-xs" href="editnews.php?id=<?=$id?>">Edit</a>/<a href="newslist.php?id=<?=$id?>&Delete=Delete" class="btn btn-danger btn-xs">Delete</a>
<?
?>
</tr>
<?}}?>
<tr class='headlist'>
	<td colspan='5'>Page <?php echo $_GET['p']  ?>, News List from <?php echo $offset+1;?>-<?php echo $offset+$num;?> ,
 <?php
  $p = 1;
  if($_GET['p'] != 1){
	echo "<a href = newslist.php?p=".($_GET['p']-1)."&goto=goto><span>Prev </span></a>";
	}
 while($count>0){
   echo "<a href = newslist.php?p=".$p."&goto=goto><span>".$p." </span></a>";
   $p++;
   $count--;
}
  if($_GET['p'] != $page){
	echo "<a href = newslist.php?p=".($_GET['p']+1)."&goto=goto><span> Next</span></a>";
	}


?> Totle: <?=$total?></td>
</tr>
</table>
</form>
</div>
</div>
 <!--<div class="text-center">
	<hr/>
      <p>Copyright reserved by donghuyin.com</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="./bootstrap-3.1.1/docs/examples/offcanvas/offcanvas.js"></script>
</body>
</html>







