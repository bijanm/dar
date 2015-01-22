  <div id="wrapper">
    <div id="outer">
			<div id="center">
				<div id="clearheadercenter"></div>
				<div class="clear">&nbsp;</div>

				<div id="mymain1" title="center_center">
					<div class="title_bar_shaded">Select Data to Update</div>				
					<form name="select" action="" method="post" onsubmit="return isValidSelectForm()">
						<p>
						Please select the skillset and date of the data you need to update:
						</p>
						<p align="right">
						<label for="s_date" >Date: </label>
						<input name="s_date" type="text" size="10" id="inlineDatepicker">
						</p>
						<p align="right">
						<label for="s_skill" >Skillset: </label>
							<select name="s_skill" id="s_skill" type="text">
								<option value=""></option>
								<option value="ADA">ADA</option>
								<option value="English">English</option>
								<option value="Spanish">Spanish</option>
								<option value="Specialist">Specialist</option>
								<option value="Key1">Key1</option>
								<option value="Key2">Key2</option>
							</select>
						</p>
						<p align="right">
						<input name="select" id="select" type="hidden" value="select">
						</p>
						<p align="right">
						<span class="error"><?php echo $message_select; ?></span>
						<input type="submit" name="submit" size="30" value="Select">
						</p>
					</form>
					
					<div class="clear">&nbsp;</div>
				</div>
				
				<div id="mymain1" title="center_center">
					<div class="title_bar_shaded">Update Data</div>
					
					<form name="update" action="" method="post">
						<p>
						In the following form update the data you selected above:
						</p>
						<p align="right">
						<label for="u_date" >Date: </label>
						<input name="u_date" id="u_date" type="text" size="10" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['date']);} ?>" readonly>
						</p>
						<p align="right">
						<label for="u_skill" >Skillset: </label>
						<input name="u_skill" id="u_skill" type="text" size="10" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['skill']);} ?>" readonly>
						</p>
						<p align="right">
						<label for="u_agents" >Agents: </label>
						<input name="u_agents" id="u_agents" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['agents']);} ?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="u_sched_op" >Scheduled Open: </label>
						<input name="u_sched_op" id="u_sched_op" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['sched_op']);} ?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="u_unsch_op" >Unscheduled Open: </label>
						<input name="u_unsch_op" id="u_unsch_op" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['unsch_op']);} ?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="u_chat" >Chats: </label>
						<input name="u_chat" id="u_chat" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['chat']);} ?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="u_service_level" >Service Level: </label>
						<input name="u_service_level" id="u_service_level" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['service_level'])*100;} ?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%
						</p>
						<p align="right">
						<label for="u_received" >Received: </label>
						<input name="u_received" id="u_received" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['received']);} ?>">
						Calls
						</p>
						<p align="right">
						<label for="u_answered" >Answered: </label>
						<input name="u_answered" id="u_answered" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['answered']);} ?>">
						Calls
						</p>
						<p align="right">
						<label for="u_abandoned" >Abandoned: </label>
						<input name="u_abandoned" id="u_abandoned" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['abandoned']);} ?>">
						Calls
						</p>
						<p align="right">
						<label for="u_thresh_ans" >Answered After Threshold: </label>
						<input name="u_thresh_ans" id="u_thresh_ans" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['thresh_ans']);} ?>">
						Calls
						</p>
						<p align="right">
						<input name="u_thresh_ans_pc" id="u_thresh_ans_pc" type="hidden" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['thresh_ans_pc'])*100;} ?>">
						</p>
						<p align="right">
						<label for="u_thresh_aband" >Abandoned After Threshold: </label>
						<input name="u_thresh_aband" id="u_thresh_aband" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['thresh_aband']);} ?>">
						Calls
						</p>
						<p align="right">
						<label for="u_avg_delay" >Average Call Delay: </label>
						<input name="u_avg_delay" id="u_avg_delay" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['avg_delay']);} ?>">
						&nbsp;&nbsp;Sec
						</p>
						<p align="right">
						<label for="u_avg_time" >Average Call Time: </label>
						<input name="u_avg_time" id="u_avg_time" type="text" size="5" value="<?php if (isset ($_REQUEST['select'])) {echo stripslashes($row['avg_time']);} ?>">
						&nbsp;&nbsp;Sec
						</p>
						<p align="right">
						<input name="update" id="update" type="hidden" value="update">
						</p>
						<p align="right">
						<span class="error"><?php echo $message_update; ?></span>
						<input type="submit" name="submit" size="30" value="Update">
						</p>
					</form>
					
					<div class="clear">&nbsp;</div>
				</div>


				<div id="clearfootercenter"></div>
			</div>
      <div id="left">
        <div id="clearheaderleft"></div>
        <div id="container-left">
					<div title="left">
					<div title="box">
					<form name="logout" action="logout.php" method="post">
					<p align="center">
					Welcome! You are logged in as <?php echo $_SESSION['Username']; ?>&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" size="250" value=" Logout ">
					</p>
					</form>
					</div>
					<p class="outline"> You can use this form to add ACD data to the database, or update data previously entered. For each day you add or update data one skillset at a time.</p><p></p>
					<div class="title_bar_shaded"> Add Data</div>
					<form name="add" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return isValidAddForm()">
						<p>
						Enter daily data for one skillset:
						</p>
						<p align="right">
						<label for="date" >Date: </label>
						<input name="date" type="text" size="10" id="popupDatepicker">
						</p>
						<p align="right">
						<label for="skill" >Skillset: </label>
							<select name="skill" id="skill" type="text">
								<option value=""></option>
								<option value="ADA">ADA</option>
								<option value="English">English</option>
								<option value="Spanish">Spanish</option>
								<option value="Specialist">Specialist</option>
								<option value="Key1">Key1</option>
								<option value="Key2">Key2</option>
							</select>
						</p>
						<p align="right">
						<label for="agents" >Agents: </label>
						<input name="agents" id="agents" type="text" size="5" value="" align="right">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="sched_op" >Scheduled Open: </label>
						<input name="sched_op" id="sched_op" type="text" size="5" value="">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="unsch_op" >Unscheduled Open: </label>
						<input name="unsch_op" id="unsch_op" type="text" size="5" value="">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="chat" >Chats: </label>
						<input name="chat" id="chat" type="text" size="5" value="">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						<p align="right">
						<label for="service_level" >Service Level: </label>
						<input name="service_level" id="service_level" type="text" size="5" value="">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%
						</p>
						<p align="right">
						<label for="received" >Received: </label>
						<input name="received" id="received" type="text" size="5" value="">
						Calls
						</p>
						<p align="right">
						<label for="answered" >Answered: </label>
						<input name="answered" id="answered" type="text" size="5" value="">
						Calls
						</p>
						<p align="right">
						<label for="abandoned" >Abandoned: </label>
						<input name="abandoned" id="abandoned" type="text" size="5" value="">
						Calls
						</p>
						<p align="right">
						<label for="thresh_ans" >Answered After Threshold: </label>
						<input name="thresh_ans" id="thresh_ans" type="text" size="5" value="">
						Calls
						</p>
						<p align="right">
						<input name="thresh_ans_pc" id="thresh_ans_pc" type="hidden" value="0">
						</p>
						<p align="right">
						<label for="thresh_aband" >Abandoned After Threshold: </label>
						<input name="thresh_aband" id="thresh_aband" type="text" size="5" value="">
						Calls
						</p>
						<p align="right">
						<label for="avg_delay" >Average Call Delay: </label>
						<input name="avg_delay" id="avg_delay" type="text" size="5" value="">
						&nbsp;&nbsp;Sec
						</p>
						<p align="right">
						<label for="avg_time" >Average Call Time: </label>
						<input name="avg_time" id="avg_time" type="text" size="5" value="">
						&nbsp;&nbsp;Sec
						</p>
						<p align="right">
						<input name="add" id="add" type="hidden" value="add">
						</p>
						<p align="right">
						<span class="error"><?php echo $message_add; ?></span>
						<input type="submit" name="submit" size="30" value="Add to Database">
						</p>
					</form>
						<div class="clear">&nbsp;</div>
					</div>
        </div>
        <div id="clearfooterleft"></div>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
    <div id="gfx_bg_middle">&nbsp;</div>
  </div>