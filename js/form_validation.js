// JavaScript Document
// builds the paramOrder variable
function buildParamOrder(frm) {
	if (frm.elements['paramOrder'] == null) return;
	
    var els = frm.elements;
    var paramOrder = "";
    var specialFields = "|paramOrder|formName|emailFrom|emailSubject|emailRecipient|successURL|errorURL|";
    // the following are not currently implemented: "csvHeader|csvDelimiter|csvDelimiter2|csvAttach|";
    for (var i = 0; i < els.length; i++) {
        var nm = els[i].name;
        if (nm.length < 1) continue;
        if (specialFields.indexOf("|"+nm+"|") != -1) continue;
        if (paramOrder.indexOf(nm+"|") != -1) continue;
        paramOrder += nm;
        paramOrder += "|";
    }
    frm.paramOrder.value = paramOrder;
    return true;
}

function isValidAddForm() {
	var frm = document.add;
	buildParamOrder(frm);
	
	if (frm.date.value == '') return messageHelper(frm.date, "Please enter date.");
	if (frm.agents.value == '') return messageHelper(frm.agents, "Please enter agents.");
	if (frm.sched_op.value == '') return messageHelper(frm.sched_op, "Please enter sched_op.");
	if (frm.unsch_op.value == '') return messageHelper(frm.unsch_op, "Please enter unsch_op.");
	if (frm.chat.value == '') return messageHelper(frm.chat, "Please enter chat.");
	if (frm.skill.value == '') return messageHelper(frm.skill, "Please enter skill.");
	if (frm.service_level.value == '') return messageHelper(frm.service_level, "Please enter service_level.");
	if (frm.received.value == '') return messageHelper(frm.received, "Please enter received.");
	if (frm.answered.value == '') return messageHelper(frm.answered, "Please enter answered.");
	if (frm.abandoned.value == '') return messageHelper(frm.abandoned, "Please enter abandoned.");
	if (frm.thresh_ans.value == '') return messageHelper(frm.thresh_ans, "Please enter thresh_ans.");
	if (frm.thresh_ans_pc.value == '') return messageHelper(frm.thresh_ans_pc, "Please enter thresh_ans_pc.");
	if (frm.thresh_aband.value == '') return messageHelper(frm.thresh_aband, "Please enter thresh_aband.");
	if (frm.avg_delay.value == '') return messageHelper(frm.avg_delay, "Please enter avg_delay.");
	if (frm.avg_time.value == '') return messageHelper(frm.avg_time, "Please enter avg_time.");

	return true;
	
}

function isValidSelectForm() {
	var frm = document.select;
	buildParamOrder(frm);
	
	if (frm.s_date.value == '') return messageHelper(frm.s_date, "Please enter date.");
	if (frm.s_skill.value == '') return messageHelper(frm.s_skill, "Please enter skill.");

	return true;
	
}

function contactValidForm() {
	var frm = document.frm;
	buildParamOrder(frm);
	
	if (frm.first_name.value == '') return messageHelper(frm.first_name, "Please enter your First Name.");
	if (frm.last_name.value == '') return messageHelper(frm.last_name, "Please enter your Last Name.");
	if (frm.email.value == '') return messageHelper(frm.email, "Please enter your Email Address.");
	if (frm.phone.value == '') return messageHelper(frm.phone, "Please enter your phone number.");
	if (!checkEmail(frm.email, "Invalid Email Address")) return false;
	return true;
	
}