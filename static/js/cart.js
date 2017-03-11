$(document).ready(function() {
    $('.delete').on('click',function(){
        var product_id = $(this).prev().val();
        $.post("/cart/delcart",{product_id:product_id},function(result){
            var obj =  eval("("+result+")");
            if(obj.err_code == '0000'){
                window.location.href = '/cart';
            }else{
                window.location.href = '/login';
            }
        });
    });
});
//分页初始
function pages(count){
    laypage({
        cont: document.getElementById('page'),
        pages: count,  //总共页数
        groups: 5, //显示几个页码
        curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
            var page = location.search.match(/page=(\d+)/);
            return page ? page[1] : 1;
        }(),
        jump: function(e, first){
            if(!first){
                var index=window.location.href.indexOf('&page');
                var url=window.location.href.substring(0,index);
                var index1=window.location.href.indexOf('?page');
                var url1=window.location.href.substring(0,index1);
                if(index>-1){
                    location.href =url+'&page='+e.curr;
                }
                else if(index1>-1){
                    location.href =url1+'?page='+e.curr;
                }else{
                	location.href =window.location.href+'?page='+e.curr;
                }
            }
        }
    });
}
//总页数转last_index
function toPageIndex(){
    var page=Common.getQueryString('page');
    if(page==null){
        return 0;
    }
    else{
        return (page-1)*20;
    }
}
//last_index转总页数
function toPageCount(index){
    var page_count=Math.ceil(index/20);
    return page_count;
}