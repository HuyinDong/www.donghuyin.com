<?php
  include_once('global.php');
  include_once('check.php');
 if($_GET['sub'])
{
$sql="update `dongyin_ProgramLearning`.`p_config` set `values`='".
$_GET['Name']."' , `Website_Address`='".
$_GET['Address']."' , `Key_Words`='".
$_GET['Key']."' , `Remark`='".
$_GET['Remark']."' where `p_config`.`name`='websitename'";
echo $sql;
$query=mysql_query($sql);
}
 //update("p_config","`values`=$_GET['Name'])

 $query= $database->select("*","p_config");
 $row=$database->fetch($query);

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

    <title>Configuration</title>

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
		   <div id="header">
		  <a href='admin.php'>Backstage</a>&gt;&gt;<a href='#'>Configuration</a>
           </div>
           <div id='config'>
         

<form action='' method='GET' id="sc">
<table>
<tr class='con'>
	<td colspan='2'><h3 class='font'>System Configuration</h3></td>
</tr>
<tr class='con1'>
	<td>Website Name:</td><td><input type='text' name='Name' value=<?=$row['values']?> /></td>
</tr>
<tr class='con1'>
	<td>Website Address:</td><td><input type='text' name='Address' value=<?=$row['Website_Address']?> /></td>
</tr>
<tr class='con1'>
	<td>Key Words:</td><td><input type='text' name='Key' value=<?=$row['Key_Words']?> /></td>
</tr>
<tr class='con1'>
	<td>Remark:</td><td><input type='text' name='Remark' value=<?=$row['Remark']?> /></td>
</tr>
<tr class='con' >
	<td colspan='2'><input type='submit' name='sub' value='Update' class="btn btn-success btn-xs"/></td>
</tr>
</table>
</form>
</div>
     
         </div>
        </div><!--/span-->

       
      </div><!--/row-->
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


