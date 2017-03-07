//filter
template.helper('trueOrFalse', function(val){
  if(parseInt(val)==1){
    return true;
  }
  return false;
});
template.helper('isNullUndefinedEmpty', function(val){
  if(val==null||val==undefined||val==""||val=='0'||val=='0.00'){
    return true;
  }
  return false;
});
template.helper('transHtml', function(val){
    var newstr=removeHTMLTag(val);
    return newstr;
});
template.helper('number2Int', function(val){
    return parseInt(val,10);
});
template.helper('notNullUndefinedEmpty', function(val){
  if(val==null||val==undefined||val==""){
    return false;
  }
  return true;
});
template.helper('escape', function(val){
    return escape(val);
});
//去除url是否包含?
template.helper('expectUrlParams', function(val){
  if(val.indexOf('?')>-1){
    return val+"&";
  }
  return val+"?";
});
