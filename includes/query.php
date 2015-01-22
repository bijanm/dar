<?php
$message_add = "";
$message_select = "";
$message_update = "";

/*if(!isset($_REQUEST['select'])&&!isset($_REQUEST['update'])&&!isset($_REQUEST['add']))
	{
		$message = "Please fill one of the forms below to add or update data!";
	}*/
if(isset($_REQUEST['s_date'])&&isset($_REQUEST['s_skill'])&&isset($_REQUEST['select']))
	{
		$query = "select dar.* from dar where date = '".$_REQUEST['s_date']."' and skill = '".$_REQUEST['s_skill']."'";
		$result = $db->query($query) or die("MySQL Error: " . mysql_error());
		$row = $result->fetch_assoc();
		if ($row == null) { $message_select = "No entry for ".($_REQUEST['s_skill'])." on ".($_REQUEST['s_date']);}
		$db->close() or die("MySQL Error: " . mysql_error());
	}
if(isset($_REQUEST['u_abandoned'])&&isset($_REQUEST['u_agents'])&&isset($_REQUEST['u_answered'])&&isset($_REQUEST['u_avg_delay'])&&isset($_REQUEST['u_avg_time'])&&isset($_REQUEST['u_chat'])&&isset($_REQUEST['u_date'])&&isset($_REQUEST['u_received'])&&isset($_REQUEST['u_sched_op'])&&isset($_REQUEST['u_service_level'])&&isset($_REQUEST['u_skill'])&&isset($_REQUEST['u_thresh_aband'])&&isset($_REQUEST['u_thresh_ans'])&&isset($_REQUEST['u_thresh_ans_pc'])&&isset($_REQUEST['u_unsch_op'])&&isset($_REQUEST['update']))
	{
		$query = "update dar set abandoned = '".$_REQUEST['u_abandoned']."', agents = '".$_REQUEST['u_agents']."', answered = '".$_REQUEST['u_answered']."', avg_delay = '".$_REQUEST['u_avg_delay']."', avg_time = '" .$_REQUEST['u_avg_time']."', chat = '".$_REQUEST['u_chat']."', received = '" .$_REQUEST['u_received']."', sched_op = '".$_REQUEST['u_sched_op']."', service_level = '".($_REQUEST['u_service_level']/100)."', thresh_aband = '".$_REQUEST['u_thresh_aband']."', thresh_ans = '".$_REQUEST['u_thresh_ans']."', thresh_ans_pc = '" .($_REQUEST['u_thresh_ans_pc']/100)."', unsch_op = '".$_REQUEST['u_unsch_op']."' where date = '".$_REQUEST['u_date']."' and skill = '".$_REQUEST['u_skill']."'";
		if($result = $db->query($query))	{$message_update="Your dataset was successfully updated";}
		else die("MySQL Error: " . mysql_error());
		//$result->free();
		$db->close() or die("MySQL Error: " . mysql_error());
	}
	
if(isset($_REQUEST['abandoned'])&&isset($_REQUEST['agents'])&&isset($_REQUEST['answered'])&&isset($_REQUEST['avg_delay'])&&isset($_REQUEST['avg_time'])&&isset($_REQUEST['chat'])&&isset($_REQUEST['date'])&&isset($_REQUEST['received'])&&isset($_REQUEST['sched_op'])&&isset($_REQUEST['service_level'])&&isset($_REQUEST['skill'])&&isset($_REQUEST['thresh_aband'])&&isset($_REQUEST['thresh_ans'])&&isset($_REQUEST['thresh_ans_pc'])&&isset($_REQUEST['unsch_op'])&&isset($_REQUEST['add']))
	{
		$query1 = "select dar.* from dar where date = '".$_REQUEST['date']."' and skill = '".$_REQUEST['skill']."'";
		$result1 = $db->query($query1) or die("MySQL Error: " . mysql_error());
		$row = $result1->fetch_assoc();
		if ($row !== null) 
			{ 
				$message_add = "An entry for ".($_REQUEST['skill'])." on ".($_REQUEST['date'])." already exists";
				$db->close() or die("MySQL Error: " . mysql_error());
			}
		else
			{
				$query = "insert into dar(abandoned, agents, answered, avg_delay, avg_time, chat, date, received, sched_op, service_level, skill, thresh_aband, thresh_ans, thresh_ans_pc, unsch_op) values "."('".$_REQUEST['abandoned']."', '".$_REQUEST['agents']."', '".$_REQUEST['answered']."', '".$_REQUEST['avg_delay']."', '" .$_REQUEST['avg_time']."', '".$_REQUEST['chat']."', '".$_REQUEST['date']."', '" .$_REQUEST['received']."', '".$_REQUEST['sched_op']."', '".($_REQUEST['service_level']/100)."', '" .$_REQUEST['skill']."', '".$_REQUEST['thresh_aband']."', '".$_REQUEST['thresh_ans']."', '" .($_REQUEST['thresh_ans_pc']/100)."', '".$_REQUEST['unsch_op']."')";
				if ($result = $db->query($query)) {$message_add=" Successfully added to database";}
				else die("MySQL Error: " . mysql_error());
				//$result->free();
				$db->close() or die("MySQL Error: " . mysql_error());
			}
	}
?>