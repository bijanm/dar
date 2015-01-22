<?php
include "includes/db.php";
include "includes/base.php";
include "includes/query.php";
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
<link rel="stylesheet" href="css/jquery.datepick.css">

<script src="js/form.js"></script> 
<script src="js/form_validation.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.datepick.js"></script>
<script>
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

</head>
<body class="body">
<div id="fullheightcontainer">
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) include_once('includes/index.inc');
elseif(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
{
include_once('includes/signin.inc');
}
else include_once('includes/login.inc');
?>

  <div id="header">
    <div class="outer_horiz_border">&nbsp;</div>
    <div id="subheader1">
			<p>
        <img src="images/CS_Forms_Head.gif" width="958" height="90">
      </p>
    </div>
    <div id="subheader2">

    </div>
    <div id="subheader3">
		<?php echo $message; ?>		
    </div>
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