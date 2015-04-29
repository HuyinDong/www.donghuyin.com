
<?
  include_once('global.php');
  include_once('check.php');
  if($_POST['Add']){
   $sql="INSERT INTO `dongyin_ProgramLearning`.`p_newsbase` (`id`, `cid`, `title`, `author`, `date`) VALUES (NULL, '".$_POST['f_id']."', '".$_POST['Title']."', '".$_POST['Author']."', now())";
   
$query=mysql_query($sql);
$last_id=mysql_insert_id();
   echo $last_id;
  $sql1="INSERT INTO `dongyin_ProgramLearning`.`p_newscontent` (`nid`, `keyword`, `content`, `remark`) VALUES ('".$last_id."', '".$_POST['Key']."', '".$_POST['Content']."', '')";
 $query=mysql_query($sql1);

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

    <title>Addnews</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bootstrap-3.1.1/docs/examples/offcanvas/offcanvas.css" rel="stylesheet">
	
 <link href="./bootstrap-3.1.1\docs\examples\sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
 <link rel="stylesheet" href="style.css" />
 <script src="./ckeditor/ckeditor.js"></script>
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-tarPOST=".navbar-collapse">
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
		  <a href='admin.php'>Backstage</a>&gt;&gt;<a href='#'>Addnews</a>
           </div>
<div id='addnews'>
<form action='' method='POST'>
<table>

	<td align='center'><h5>Add News</h5></td>
</tr>
<tr>
	<td>News Catagory:<select name='f_id'>
<?
 $query=$database->select("*","p_newsclass");

while($row=$database->fetch($query))
if($row['f_id']==0)
{
?>
  <option value='<?=$row['id']?>'><?=$row['name']?></option>
<?
$query1=$database->select("*","p_newsclass","`f_id`=".$row['id']);
while($row1=$database->fetch($query1))
{
?>
  <option value='<?=$row1['id']?>'>&nbsp;&nbsp;--<?=$row1['name']?></option>
<?
}
}
?>
</select>	
</td>
</tr>
<tr>
	<td>Title:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Title" /></td>
</tr>
<tr>
	<td>Author:<input type="text" name="Author" /></td>
</tr>
<tr>
	<td>Key Words:<input type="text" name="Key"/></td>
</tr>
<tr>
	<td>Content:<textarea type="text" name="Content" rows='10' cols='80'></textarea>
<script>
                CKEDITOR.replace( 'Content' );
            </script>
</td>
</tr>
<tr>
	<td align='center'><input type="submit" name="Add" value="Add News" class="btn btn-success btn-xs"/></td>
</tr>
</table>
</form>
</div>
</div>
 <div class="text-center navbar-bottom">
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





