/**
 * Shows message, sets focus to desired element, and returns false.
 */
function messageHelper(el, msg) {
  if (el != null) {
  	if (el.select != null)
		el.select();
	if (el.focus != null)
  		el.focus();
  }
  if (msg != null)
  	alert(msg);
  if (el != null && el.focus != null)
  	el.focus();
  return false;
}

/**
 * Implements the checkFloat and checkInt functions.
 */
function checkNumber(el, msg, minimum, maximum, allowDecimals) {
  var val = el.value;
  var len = val.length;
  if (len == 0) return messageHelper(el, msg);
  
  var negAlreadyFound = false;
  var decimalAlreadyFound = false;
  
  for (var i = 0; i < len; i++) {
    var ch = val.charAt(i);
    if ("0123456789".indexOf(ch) != -1) {
      // this is good... continue
    } else if (ch == '-') {
      if (negAlreadyFound) return messageHelper(el, msg);
      negAlreadyFound = true;
    } else if (ch == '.') {
      if (decimalAlreadyFound) return messageHelper(el, msg);
      if (!allowDecimals) return messageHelper(el, msg);
      decimalAlreadyFound = true;
    } else 
      return messageHelper(el, msg); // not a number, sign, or decimal
  }
  
  if (minimum != null) {
    if (parseFloat(val) < minimum) return messageHelper(el, msg);
  }
  if (maximum != null) {
    if (parseFloat(val) > maximum) return messageHelper(el, msg);
  }
  
  return true;
}
  

/**
 * Verifies that the element contains a valid floating point number, and
 * displays an error message if needed.
 */ 
function checkFloat(el, msg, minimum, maximum) {
  return checkNumber(el, msg, minimum, maximum, true);
}

/**
 * Verifies that the element contains a valid integer, and
 * displays an error message if needed.
 */ 
function checkInt(el, msg, minimum, maximum) {
  return checkNumber(el, msg, minimum, maximum, false);
}

function arry() {}
var x_days_per_month = new arry();
x_days_per_month[1] = 31; x_days_per_month[2] = 29; x_days_per_month[3] = 31;
x_days_per_month[4] = 30; x_days_per_month[5] = 31; x_days_per_month[6] = 30;
x_days_per_month[7] = 31; x_days_per_month[8] = 31; x_days_per_month[9] = 30;
x_days_per_month[10] = 31; x_days_per_month[11] = 30; x_days_per_month[12] = 31;
function daysInMonth(m, y) {
  if (m == 2) return getFebDays(y);
  else return x_days_per_month[m];
}

/**
 * Verifies that the elements contain a valid date, and displays an 
 * error message if needed.
 */
function checkDate(mm, dd, yyyy, msg) {
  var m, d, y; // month, day, and year as integers
  
  if (!checkInt(mm, msg+"\r\n"+"Please enter a valid month.", 1, 12)) return false;
  m = parseInt(mm.value);
  
  // february check is performed below, after we know the year
  if (!checkInt(dd, msg+"\r\n"+"Please enter a valid day.", 1, x_days_per_month[m])) return false;
  d = parseInt(dd.value);

  if (!checkInt(yyyy, msg+"\r\n"+"Please enter a valid year.", 0)) return false;
  y = parseInt(yyyy.value);
  if (y < 100) return messageHelper(yyyy, msg+"\r\n"+"Please enter a four-digit year.");
  if (y < 1900) return messageHelper(yyyy, msg+"\r\n"+"Please enter a year after 1900.");
  if (y > 2100) return messageHelper(yyyy, msg+"\r\n"+"Please enter a year before 2100.");
  
  // perform february check
  if ((m == 2) && d > getFebDays(y)) return messageHelper(dd, "Please enter a valid day.");
  
  return true;
}

/**
 * Rounds the specified string to the nearest cents if a decimal point is present,
 * or returns the string as is if no decimal point is present.
 */
function moneyRound(str) {
    var perLoc = str.indexOf('.');
    if (perLoc == -1) return str;
    if (perLoc == str.length-3) return str;
    if (perLoc < str.length-3) return 0.01*Math.round(parseFloat(str)*100);
    return (str+"00").substring(0,perLoc+3);
}


/**
 * Verifies that the SELECTs contain a valid date, and displays an
 * error message if needed.  This function assumes that the lists
 * only contain valid months, days, and years.
 */
function checkDateSelects(mm, dd, yyyy, msg, is_optional) {
  var m, d, y; // month, day, and year as integers
  m = parseInt(mm.options[mm.selectedIndex].value);
  d = parseInt(dd.options[dd.selectedIndex].value);
  y = parseInt(yyyy.options[yyyy.selectedIndex].value);
  
  if (is_optional && (m<=0) && (d<=0) && (y<=0))
    return true;
    
  if (m<=0) {
    alert(msg+"\r\n"+"Please select a valid month.");
    return false;
  } else if (d<=0) {
    alert(msg+"\r\n"+"Please select a valid day.");
    return false;
  } else if (y<=0) {
    alert(msg+"\r\n"+"Please select a valid year.");
    return false;
  }
  
  if ( (x_days_per_month[m] < d) || ((m == 2) && d > getFebDays(y)) ) {
    alert(msg+"\r\n"+"Please select a valid day.");
    return false;
  }
    
  return true;
}


/**
 * Makes sure that the specified input's value has one of the specified
 * extensions (which must be a comma-separated list).
 */
function checkExtensions(el, msg, extensions) {
	var str = el.value;
	extensions = extensions.split(',');
	for (var i = 0; i < extensions.length; i++) {
		var idx = str.lastIndexOf(extensions[i]);
		if (idx != -1 && idx == str.length - extensions[i].length)
			return true;
	}
	return messageHelper(el, msg);
}

/**
 * Makes sure that at least one of the specified radio buttons is checked.
 */
function checkSelected(els, msg) {
	var lenx = (els != null ? els.length : 0);
	if (lenx == null) lenx = 0;
	
	for (var i = 0; i < lenx; i++) {
		if (els[i].checked) return true;
	}
	alert(msg);
	return false;
}

// pass in year, get back days in that year's February
function getFebDays(y) {
  var febDays = 28;
  if (y % 4 == 0) {
    febDays = 29;
    if (y % 100 == 0) {
      febDays = 28;
      if (y % 400 == 0) {
        febDays = 29;
      }
    }
  }
  return febDays;
}

/**
 * 
 * Returns true iff the specified field's value contains an @ and a period,
 * and at least one character before the @ and at least one char after the period.
 */
function checkEmail(el, msg) {
	var msgDetail = null;
	var value = trim(el.value);
	
	var atloc = value.indexOf('@');
	if (value.length < 1) 
		msgDetail = "";
	else if (atloc < 1)
		msgDetail = "\r\nEmail addresses have a username followed by an @ symbol.";
	else if (value.lastIndexOf('.') < atloc)
		msgDetail = "\r\nThe @ symbol should be followed by an email domain.";
	
	if (msgDetail != null) 
		return messageHelper(el, msg+"\r\n"+msgDetail);
	else
		return true;
}

/**
 * Returns true iff the specified field only contains a valid zip code.
 * Valid zips are 5 digits long or are 5 digits plus a hyphen plus 4 digits.
 * If mustBe5digitZip is specified true, then only 5-digit zips will be allowed.
 */
function checkZip(el, msg, mustBe5digitZip) {
	var value = trim(el.value);

	if (!mustBe5digitZip && value.length == 10 && value.charAt(5) == '-')
		value = value.substring(0,5)+value.substring(6);
	else if (value.length != 5)
		return messageHelper(el, msg);
	
	var lenx = value.length;
	for (var i = 0; i < lenx; i++) {
		if ("0123456789".indexOf(value.charAt(i)) == -1)
			return messageHelper(el, msg);
	}
	return true;
}

/*
  Trims left side spaces from the given value and returns trimed string
 */
function ltrim(value) {
	if (value == null) return value;
	if (value.length < 1) return value;
	var result = new String(value);
	while (result.length > 0 && result.charAt(0) <= ' ')
	{
		result = result.substr(1);
	}
	return result;
}

/*
  Trims right side spaces in the given value and returns trimed string
 */
function rtrim(value) {
	if (value == null) return value;
	if (value.length < 1) return value;
	var result = new String(value);
	while (result.length > 0 && result.charAt(result.length - 1) <= ' ')
	{
		result = result.substring(0, result.length - 1);
	}
	return result;
}

/*
  Trims spaces from both ends in the given value and returns trimed string
 */
function trim(value) {
	return rtrim(ltrim(value));
}

/*
  Forces the element's value to be no longer than maxlen characters.
*/
function restrictArea(el, wind, maxlen) {
    if (wind.event.type == 'paste') {
        var proposed_value = el.value + wind.clipboardData.getData("Text");
        
        if (proposed_value.length > maxlen) {
            el.value = proposed_value.substring(0, maxlen);
            wind.event.cancelBubble = true;
            wind.event.returnValue = false;
            return false;
        }
    } else {
        var spaceNeeded = 1;
        if (wind.event.keyCode == 13) spaceNeeded = 2;
        if (el.value.length + spaceNeeded > maxlen) {
            wind.event.cancelBubble = true;
            wind.event.returnValue = false;
            return false;
        } 
    }
    return true;
}

/*
  Ensures that people can't select an invalid day for the specified month/year.
  Pass in a month, day, and year select object.
*/
function repairDays(mm, dd, yyyy) {
  var m = parseInt(mm.options[mm.selectedIndex].value);
  if (isNaN(m)) m = mm.selectedIndex+1;


  var y = parseInt(yyyy.options[yyyy.selectedIndex].value);
  if ((m <= 0) || (y <= 0)) return;
  var d_sel = dd.selectedIndex;
  var d_max_valid = top.daysInMonth(m, y);

  var offset = 1;
  if (parseInt(dd.options[0].value) <= 0) offset = 0;
  for (var i = 31; i >= 28; i--) {
    if (i > d_max_valid) {
      dd.options[i-offset] = null;
    } else {
      dd.options[i-offset] = new Option(""+i, ""+i);
    }
  }
  if (dd.options[d_sel] != null)
    dd.selectedIndex = d_sel;
  else
    dd.selectedIndex = dd.options.length - 1;
  
}

