
/**
 * [valid_email 校验邮件地址]
 * @param  {[type]} value [description]
 * @return {[type]}       [description]
 */
function valid_email(value){
	return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
}

/**
 * [validate_reqire 校验非空]
 * @param  {[type]} value [description]
 * @return {[type]}       [description]
 */
function valid_required(value){
	return value!=null&&value!='';
}

/**
 * [validate_date 校验日期]
 * @param  {[type]} value [description]
 * @return {[type]}       [description]
 */
function valid_date(value){
 	return /^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(value);
}

function valid_minlength(value,length){
	return value.length>=length;
}

function valid_maxlength(value,length){
	return value.length<=length;
}

function valid_rangelength(value,maxlength,minlength){
	return value.length<=maxlength&&value.length>=minlength;
}

function valid_digits(value){
	return /^\d+$/.test(value);
}

function valid_number(value){
	return /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value) && value>=0;
}



