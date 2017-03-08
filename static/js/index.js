$(document).ready(function() {

    //banner
    initbanner();
    inithotdes();
});
function ckSilider(dom){
  dom.find('.ck-slide').ckSlide({
      next:'.right',
      prev:'.left',
      time:5000,
      pausetime:1000,
      pageclassName:'.ck-slidebox span'
  });
}
function initbanner(){
  if($('.banner:eq(0)').find('.item').length>1){
    ckSilider($('.banner:eq(0)'));
  }else{
    var dom = $('.banner:eq(0)');
    dom.find('.ck-slidebox').hide();
  }
}
function inithotdes(){
    var minwid = $('.slider ul').width();
    var liwid  = $('.slider ul li').width();
    var len = $('.slider ul li').size();
    $('.slider ul').width(len*liwid*2>minwid?len*liwid*2:minwid);
    $('.slider ul').width();
    $(".slider").Xslider({
        unitdisplayed:6,
        loop:"cycle",
        numtoMove:1,//要移动的单位个数    必需项;
        unitlen:156,//移动的单位宽或高度     默认查找li的尺寸;
        speed:500,
        autoscroll:5000  //自动移动间隔时间     默认null不自动移动;
    });
}