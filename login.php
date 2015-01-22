<?php
include "includes/db.php";
$message = "";
if(!isset($_REQUEST['select'])&&!isset($_REQUEST['update'])&&!isset($_REQUEST['add']))
	{
	$message = "Please fill one of the forms below to add or update data!";
	}
if(isset($_REQUEST['s_date'])&&isset($_REQUEST['s_skill'])&&isset($_REQUEST['select']))
	{
	$query = "select dar.* from dar where date = '".$_REQUEST['s_date']."' and skill = '".$_REQUEST['s_skill']."'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$db->close();
	}
if(isset($_REQUEST['u_abandoned'])&&isset($_REQUEST['u_agents'])&&isset($_REQUEST['u_answered'])&&isset($_REQUEST['u_avg_delay'])&&isset($_REQUEST['u_avg_time'])&&isset($_REQUEST['u_chat'])&&isset($_REQUEST['u_date'])&&isset($_REQUEST['u_received'])&&isset($_REQUEST['u_sched_op'])&&isset($_REQUEST['u_service_level'])&&isset($_REQUEST['u_skill'])&&isset($_REQUEST['u_thresh_aband'])&&isset($_REQUEST['u_thresh_ans'])&&isset($_REQUEST['u_thresh_ans_pc'])&&isset($_REQUEST['u_unsch_op'])&&isset($_REQUEST['update']))
	{
	$query = "update dar set abandoned = '".$_REQUEST['u_abandoned']."', agents = '".$_REQUEST['u_agents']."', answered = '".$_REQUEST['u_answered']."', avg_delay = '".$_REQUEST['u_avg_delay']."', avg_time = '" .$_REQUEST['u_avg_time']."', chat = '".$_REQUEST['u_chat']."', received = '" .$_REQUEST['u_received']."', sched_op = '".$_REQUEST['u_sched_op']."', service_level = '".$_REQUEST['u_service_level']."', thresh_aband = '".$_REQUEST['u_thresh_aband']."', thresh_ans = '".$_REQUEST['u_thresh_ans']."', thresh_ans_pc = '" .$_REQUEST['u_thresh_ans_pc']."', unsch_op = '".$_REQUEST['u_unsch_op']."' where date = '".$_REQUEST['u_date']."' and skill = '".$_REQUEST['u_skill']."'";
	$result = $db->query($query);
	//$result->free();
	$db->close();
	}
	
if(isset($_REQUEST['abandoned'])&&isset($_REQUEST['agents'])&&isset($_REQUEST['answered'])&&isset($_REQUEST['avg_delay'])&&isset($_REQUEST['avg_time'])&&isset($_REQUEST['chat'])&&isset($_REQUEST['date'])&&isset($_REQUEST['received'])&&isset($_REQUEST['sched_op'])&&isset($_REQUEST['service_level'])&&isset($_REQUEST['skill'])&&isset($_REQUEST['thresh_aband'])&&isset($_REQUEST['thresh_ans'])&&isset($_REQUEST['thresh_ans_pc'])&&isset($_REQUEST['unsch_op'])&&isset($_REQUEST['add']))
	{
	$query = "insert into dar(abandoned, agents, answered, avg_delay, avg_time, chat, date, received, sched_op, service_level, skill, thresh_aband, thresh_ans, thresh_ans_pc, unsch_op) values "."('".$_REQUEST['abandoned']."', '".$_REQUEST['agents']."', '".$_REQUEST['answered']."', '".$_REQUEST['avg_delay']."', '" .$_REQUEST['avg_time']."', '".$_REQUEST['chat']."', '".$_REQUEST['date']."', '" .$_REQUEST['received']."', '".$_REQUEST['sched_op']."', '".$_REQUEST['service_level']."', '" .$_REQUEST['skill']."', '".$_REQUEST['thresh_aband']."', '".$_REQUEST['thresh_ans']."', '" .$_REQUEST['thresh_ans_pc']."', '".$_REQUEST['unsch_op']."')";
	$result = $db->query($query);
	//$result->free();
	$db->close();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!-- The above DOCTYPE and html lines and the meta http-equiv line below the head are critical. DO NOT DELETE them -->
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>SEPTA | ACD dar form</title>
<style type="text/css" media="screen">@import url("css/base.css");</style>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<script src="form.js"></script> 
<script src="form_validation.js"></script> 

<!--[if IE]>
<style type="text/css">
/*** The rule below prevents long urls from widening floated cols and breaking the layout
     in IE. It is not W3C valid, but if placed within a "Conditional comment" it will be hidden
     from all user agents other than IE/Win, and thus validate. This fix fails in IE5/Win.
     http://msdn.microsoft.com/workshop/author/dhtml/overview/ccomment_ovw.asp ***/
#outer{word-wrap:break-word;}
</style>
<![endif]-->

</head>
<body class="body">
<div id="fullheightcontainer">
  <div id="wrapper">
    <div id="login_outer">
			<div id="login_center">
				<div id="clearheadercenter"></div>
				<div class="clear">&nbsp;</div>

				<div id="mymain1" title="login_center">					
					<form method="post" action="index.php" name="loginform" id="loginform">
						<p>
						Please select the skill set and date of the data you need to update:
						</p>
						<p align="center">
						User Name: <input type="text" name="username" id="username" />
						</p>
						<p align="center">
						Password: <input type="password" name="password" id="password" />
						</p>
						<p align="right">
						<input type="submit" name="login" id="login" value="Login" />
						</p>
					</form>					
					<div class="clear">&nbsp;</div>
				</div>
				<div id="clearfootercenter"></div>
			</div>
      <div id="login_left">
        <div id="clearheaderleft"></div>
        <div id="container-left">
					<div title="left">
						<div class="clear">&nbsp;</div>
					</div>
        </div>
        <div id="clearfooterleft"></div>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
    <div id="login_gfx_bg_middle">&nbsp;</div>
  </div>
  <div id="header">
    <div class="outer_horiz_border">&nbsp;</div>
    <div id="subheader1">
			<p>
        <img src="images/CS_Forms_Head.gif" width="958" height="90">
      </p>
    </div>
    <div id="subheader2">

    </div>
    <!--<div id="subheader3">
		<?php echo $message; ?>
    </div>-->
    <div class="outer_horiz_border">&nbsp;</div>
  </div>
  <div class="clear">&nbsp;</div>
  <div id="footer">
    <div class="outer_horiz_border">&nbsp;</div>
    <div id="subfooter1">
      <p>
        
      </p>
    </div>
    <div class="outer_horiz_border">&nbsp;</div>
  </div>
</div>

</body>
</html>