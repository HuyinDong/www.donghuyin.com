<?php
/*
UPDATE  `worldcup` SET  `积分` =0,
`胜` =0,
`平` =0,
`负` =0,
`进球` =0,
`失球` =0,
`净胜球` =0

UPDATE  `wc_result` SET  `比分1` =0,
`比分2` =0,
`竞猜比分1` =0,
`竞猜比分2` =0,
`ifSubmit` =0

*/
 include('global.php');
 if($_GET['sub']==true && $_GET['score1']!=null & $_GET['score2']!=null){
     
       $query6=$database->select("*","wc_result","`比赛`=".$_GET['id']);
	   $row6=$database->fetch($query6);
	   
	   $originaljifen = $database->score($row6['比分1'],$row6['比分2']);   //1
	   $originalgoal = $row6['比分1'];    //0
	   $originallose = $row6['比分2'];     //0
	
	    
	   $sql7=$database->select("*","worldcup","`国家`='".$_GET['country1']."'");
	   $row7=$database->fetch($sql7);
	   if($row6['ifSubmit']){
	   $tempjifen = $row7['积分']-$originaljifen;		//3-1=2  
	   $tempgoal = $row7['进球']-$row6['比分1']; 		//0-0=0
	   $templose = $row7['失球']-$row6['比分2'];		//0
	 
	   if($originaljifen==3){
	     $row7['胜'] = $row7['胜']==0? 0:$row7['胜']-1;     //0
	   }else if($originaljifen==1){
	   $row7['平'] = $row7['平']==0? 0:$row7['平']-1;		//3-1=2
	   }else if($originaljifen==0){
	   $row7['负'] = $row7['负']==0? 0:$row7['负']-1; 		//0
	   }
	   /*$tempjifen= $tempjifen<0 ? 0: $tempjifen;  	//2		
	  $tempgoal= $tempgoal<0 ? 0: $tempgoal;    //0
	  $templose= $templose<0 ? 0: $templose; 	//0
	  */
	
	}else{
	    $tempjifen = $row7['积分'];
	   $tempgoal = $row7['进球'];
	   $templose = $row7['失球'];
	}
	   $defen = $database->score($_GET['score1'],$_GET['score2']);    	//3
	 
	   if($defen==3){
	  $row7['胜']=$row7['胜']+1;           //1
	  }else if($defen==1){
	  $row7['平']=$row7['平']+1;
	  }else if($defen==0){
	   $row7['负']=$row7['负']+1;
	  }
	  $jifen = $defen + $tempjifen;     		 //3+2=5
	  $goal =  $tempgoal+$_GET['score1'];		//2
	  $lose =  $templose+$_GET['score2'];		//0
	  $jing = $goal-$lose;					//0
	  $jifen= $jifen<0 ? 0: $jifen;						//5

	  $row7['胜']= $row7['胜']<0 ? 0: $row7['胜'];			//1
	  $row7['平']= $row7['平']<0 ? 0: $row7['平'];			//0
	  $row7['负']= $row7['负']<0 ? 0: $row7['负'];			//0
	  $sql8="UPDATE `wc_result` SET `比分1`=".$_GET['score1'].",`比分2`=".$_GET['score2'].",`竞猜比分1`=".$_GET['compt1'].",`竞猜比分2`=".$_GET['compt2'].", `ifSubmit`=1 WHERE `比赛`=".$_GET['id'];
	  $query8 = mysql_query($sql8);
	   $sql9="UPDATE `worldcup` SET `积分`=".$jifen.",`胜`=".$row7['胜'].",`平`=".$row7['平'].",`负`=".$row7['负'].",`进球`=".$goal.",`失球`=".$lose.",`净胜球`=".$jing." WHERE `国家`= '".$_GET['country1']."'";
	   $query9 = mysql_query($sql9);
	
	   //国家2
	    $originaljifen1 = $database->score($row6['比分2'],$row6['比分1']);    //1
	   $originalgoal1 = $row6['比分2'];										//0
	   $originallose1 = $row6['比分1'];											//2
	    $sql10=$database->select("*","worldcup","`国家`='".$_GET['country2']."'");
	   $row10=$database->fetch($sql10);
	   if($row6['ifSubmit']){
	    $tempjifen1 = $row10['积分']-$originaljifen1;			//3-1=2
	   $tempgoal1 = $row10['进球']-$row6['比分2'];				//0
	   $templose1 = $row10['失球']-$row6['比分1'];				//-2
	   if($originaljifen1==3){
	     $row10['胜'] = $row10['胜']==0? 0:$row10['胜']-1;
	   }else if($originaljifen1==1){
	   $row10['平'] = $row10['平']==0? 0:$row10['平']-1;             //3-1=2
	   }else if($originaljifen1==0){
	   $row10['负'] = $row10['负']==0? 0:$row10['负']-1;
	   }
	   /*$tempjifen1= $tempjifen1<0 ? 0: $tempjifen1;					//2
	  $tempgoal1= $tempgoal1<0 ? 0: $tempgoal1;						//0
	  $templose1= $templose1<0 ? 0: $templose1;			
*/	  //0
}else{
	    $tempjifen1 = $row10['积分'];
	   $tempgoal1 = $row10['进球'];
	   $templose1 = $row10['失球'];
	   }
	   $defen1 = $database->score($_GET['score2'],$_GET['score1']);     //0
	    if($defen1==3){
	  $row10['胜']=$row10['胜']+1;            
	  }else if($defen1==1){
	  $row10['平']=$row10['平']+1;
	  }else if($defen1==0){
	   $row10['负']=$row10['负']+1;           //1  
	  }
	  $jifen1 = $defen1 + $tempjifen1;           //2
	  $goal1 =  $tempgoal1+$_GET['score2'];		//0
	  $lose1 =  $templose1+$_GET['score1'];		//2
	  $jing1 = $goal1-$lose1;
	  $jifen1= $jifen1<0 ? 0: $jifen1;			//2
	  $row10['胜']= $row10['胜']<0 ? 0: $row10['胜'];	
	  $row10['平']= $row10['平']<0 ? 0: $row10['平'];
	  $row10['负']= $row10['负']<0 ? 0: $row10['负'];		//1
	   $sql11="UPDATE `worldcup` SET `积分`=".$jifen1.",`胜`=".$row10['胜'].",`平`=".$row10['平'].",`负`=".$row10['负'].",`进球`=".$goal1.",`失球`=".$lose1.",`净胜球`=".$jing1." WHERE `国家`= '".$_GET['country2']."'";
	   $query11 = mysql_query($sql11);
	  
	 
	}else if($_GET['sub']){
	 $sql12="UPDATE `wc_result` SET `竞猜比分1`=".$_GET['compt1'].",`竞猜比分2`=".$_GET['compt2']." WHERE `比赛`=".$_GET['id'];
	  $query12 = mysql_query($sql12);
	}
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
<?php
	$query4=$database->select("*","p_config");
	$row4=$database->fetch($query4);
	
	?>
    <title>
	世界杯
	
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
	<style>
	tr{
	height:45px;
	}
	.bulletin{
	margin-right:-31px;
	}
	
	</style>
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
			  <a class="navbar-brand" href="index.php"><?=$row4['values']?></a>
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$row1['name']?> <b class="caret"></b></a>
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
         <li><a href="wc.php">世界杯</a></li>
               </ul>
			    <ul class="nav navbar-nav pull-right">    
		<li><a href="./management/index.php" >后台管理</a></li>
      </ul>
            </div><!-- /.navbar-collapse -->
         </div>
		
        </div>
		</div>
		<div class="row">
		 <div class="col-md-12">
		 <ul class="nav nav-tabs nav-justified">
  <li class="active"><a href="#zu" data-toggle="tab">分组</a></li>
  <li class=""><a href="#fen" data-toggle="tab">积分</a></li>
  <li><a href="#sai" data-toggle="tab">赛程</a></li>
  <li><a href="#she" data-toggle="tab">射手榜</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="zu">
  <div class="group">
  <span class="letter">
  A
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_032.png"></div>
                                <div class="team-name">巴西</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_055.png"></div>
                                <div class="team-name">克罗地亚</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_133.png"></div>
                                <div class="team-name">墨西哥</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_041.png"></div>
                                <div class="team-name">喀麦隆</div>
                            
                        </li>
						</ul>
</span>
  </div>
    <div class="group">
  <span class="letter">
  B
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_193.png"></div>
                                <div class="team-name">西班牙</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_121.png"></div>
                                <div class="team-name">荷兰</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_047.png"></div>
                                <div class="team-name">智利</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_049.png"></div>
                                <div class="team-name">澳大利亚</div>
                            
                        </li>
						</ul>
</span>
  </div>
       <div class="group">
  <span class="letter">
  C
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_050.png"></div>
                                <div class="team-name">哥伦比亚</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_082.png"></div>
                                <div class="team-name">希腊</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_100.png"></div>
                                <div class="team-name">科特迪瓦</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_105.png"></div>
                                <div class="team-name">日本</div>
                            
                        </li>
						</ul>
</span>
  </div>
       <div class="group">
  <span class="letter">
  D
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_220.png"></div>
                                <div class="team-name">乌拉圭</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_053.png"></div>
                                <div class="team-name">哥斯达黎加</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_219.png"></div>
                                <div class="team-name">英格兰</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_103.png"></div>
                                <div class="team-name">意大利</div>
                            
                        </li>
						</ul>
</span>
  </div>
  <div class="group">
  <span class="letter">
  E
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_067.png"></div>
                                <div class="team-name">厄瓜多尔</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_075.png"></div>
                                <div class="team-name">法国</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_093.png"></div>
                                <div class="team-name">洪都拉斯</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_199.png"></div>
                                <div class="team-name">瑞士</div>
                            
                        </li>
						</ul>
</span>
  </div>
    <div class="group">
  <span class="letter">
  F
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_014.png"></div>
                                <div class="team-name">阿根廷</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_029.png"></div>
                                <div class="team-name">波黑</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_098.png"></div>
                                <div class="team-name">伊朗</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_150.png"></div>
                                <div class="team-name">尼日利亚</div>
                            
                        </li>
						</ul>
</span>
  </div>
       <div class="group">
  <span class="letter">
  G
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_079.png"></div>
                                <div class="team-name">德国</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_090.png"></div>
                                <div class="team-name">加纳</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_166.png"></div>
                                <div class="team-name">葡萄牙</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_004.png"></div>
                                <div class="team-name">美国</div>
                            
                        </li>
						</ul>
</span>
  </div>
       <div class="group">
  <span class="letter">
  H
  </span>
  <span class="letter1">
  组
  </span>
  <span>
  <ul class="nav nav-pills">
                    	<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_008.png"></div>
                                <div class="team-name">阿尔及利亚</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_023.png"></div>
                                <div class="team-name">比利时</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_192.png"></div>
                                <div class="team-name">韩国</div>
                            
                        </li>
						<li class="text-center">
                            	<div class="team-flag"><img src="assets/img/flag/Flagof_171.png"></div>
                                <div class="team-name">俄罗斯</div>
                            
                        </li>
						</ul>
</span>
  </div>
  </div>
  <div class="tab-pane" id="fen">
  <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='A' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query2=$database->select("*","worldcup","`组`='B' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row2=$database->fetch($query2)){
 ?>
     <tr>
		<td><?=$row2['国家']?></td><td><?=$row2['积分']?></td><td><?=$row2['胜']?></td><td><?=$row2['平']?></td><td><?=$row2['负']?></td><td><?=$row2['进球']?></td><td><?=$row2['失球']?></td><td><?=$row2['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='C' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='D' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='G' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='F' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='G' order by `积分` desc , `进球` desc , `净胜球` desc");
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   <table class="table table-bordered table-hover text-center">
  <tr>
		<td>国家</td><td>积分</td><td>胜</td><td>平</td><td>负</td><td>进球</td><td>失球</td><td>净胜球</td>
  </tr>
  <?php
  $query1=$database->select("*","worldcup","`组`='H' order by `积分` desc , `进球` desc , `净胜球` desc" );
 while($row1=$database->fetch($query1)){
 ?>
     <tr>
		<td><?=$row1['国家']?></td><td><?=$row1['积分']?></td><td><?=$row1['胜']?></td><td><?=$row1['平']?></td><td><?=$row1['负']?></td><td><?=$row1['进球']?></td><td><?=$row1['失球']?></td><td><?=$row1['净胜球']?></td>
  </tr>
  <?php
  }
  ?>
  </table>
  </div>
  <div class="tab-pane" id="sai"> 
  <div class="container">
  <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/13 周五</td><td>04:00</td>
  </tr>
   <tr>
		<td>06/14 周六</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/18 周三</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/19 周四</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/24 周二</td><td>04:00</td>
  </tr>
   <tr>
		<td>06/24 周二</td><td>04:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='A'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
  </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/14 周六</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/14 周六</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/19 周四</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/19 周四</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/24 周二</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/24 周二</td><td>00:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='B'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/15 周日</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/15 周日</td><td>09:00</td>
  </tr>
   <tr>
		<td>06/20 周五</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/20 周五</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/25 周三</td><td>04:00</td>
  </tr>
   <tr>
		<td>06/25 周三</td><td>04:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='C'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/15 周日</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/15 周日</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/20 周五</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/21 周六</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/25 周三</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/25 周三</td><td>00:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='D'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/16 周一</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/16 周一</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/21 周六</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/21 周六</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/26 周四</td><td>04:00</td>
  </tr>
   <tr>
		<td>06/26 周四</td><td>04:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='E'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/16 周一</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/17 周一</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/22 周日</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/22 周日</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/26 周四</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/26 周四</td><td>00:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='F'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/17 周二</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/17 周二</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/22 周日</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/23 周一</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/27 周五</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/27 周五</td><td>00:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='G'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
   <div class="row">
  <div class="col-md-4 bulletin">
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>日期</td><td>时间</td>
  </tr>
   <tr>
		<td>06/18 周三</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/18 周三</td><td>06:00</td>
  </tr>
   <tr>
		<td>06/23 周一</td><td>00:00</td>
  </tr>
   <tr>
		<td>06/23 周一</td><td>03:00</td>
  </tr>
   <tr>
		<td>06/27 周五</td><td>04:00</td>
  </tr>
   <tr>
		<td>06/27 周五</td><td>04:00</td>
  </tr>
  
  </table>
  </div>
   <div class="col-md-8 bulletin1">
  
  <table class="table table-bordered table-hover text-center">
  <tr class="h6">
		<td>对阵</td><td>竞猜</td><td>比分</td><td>提交</td>
  </tr>
  
  
  <?php
  $query3=$database->select("*","wc_result","`组`='H'");
  while($row3=$database->fetch($query3)){
  ?>
  <form method="GET"> 
  <tr>
		<td><input type='hidden' name='country1' value='<?=$row3['对手1']?>' /> <?=$row3['对手1']?>VS<input type='hidden' name='country2' value='<?=$row3['对手2']?>' /><?=$row3['对手2']?></td>
		<td><input type='hidden' name='id' value='<?=$row3['比赛']?>' />
		<input type="text" class="form-inline" size="2" name="compt1" value="<?=$row3['竞猜比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="compt2" value="<?=$row3['竞猜比分2']?>" /></td>
		<td><input type="text" class="form-inline" size="2" name="score1" value="<?=$row3['比分1']?>" />:
		<input type="text" class="form-inline" size="2" name="score2" value="<?=$row3['比分2']?>" />  </td>
		<td><input type="submit" value="提交" name="sub" class="btn btn-xs btn-success"/></td>
  </tr>
  </form>
  <?php
  }
  
  ?>
  
  </table>
  
  </div>
 </div>
 </div>
  <div class="tab-pane" id="she"></div>
</div>
</div>
</div>

  <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery-1.10.2.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/jquery-migrate-1.2.1.js"></script>
    <script src="./bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
	<script src="./assets/js/headroom.js"></script>
	<script src="assets/js/unslider.js"></script>
	<script>
	$(function(){
	$('#header').addClass('animated fadeInDown');
	});
	</script>
  

</div></body></html>