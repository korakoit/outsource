<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css" />
<style type="text/css">
.modules{float:left;}
.child1 {
  padding: 0 10px;
  float: left;
  height: 40px;
  line-height: 40px; }

.child2 {
  background: url(<?=STATIC_FILE_HOST?>assets/image/editpen.png) no-repeat;
  background-position: center center;
  width: 32px;
  height: 36px;
  float: left; }
  .modal-body{
    overflow-x:hidden;
  }
  .m-wrap.medium {
    margin-top: 10px;
}
</style>

<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            
        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">
            <a class="btn blue" href="#" id="addcate">新增大类</a>
        </div>
        <!-- 下面分类开始循环 主体部分 -->
        <?php foreach($category as $k => $v):?>
            <div class="row-fluid">
                <div class="row-fluid margin-bottom-20">
                    <div class="child1"><?=$v['name']?></div>
                    <a href="#"><div class="child2" onclick="edit(<?=$v['id']?>);"></div></a>
                </div>
                <div class="row-fluid margin-bottom-10 module_list">
                    <input type="hidden" class="orderlist" value="<?=$k?>" />
                    <?php foreach($v['child'] as $key => $val):?>
                        <div class="span1 modules" onclick="editchild(<?=$val['id']?>);" title="<?=$val['id']?>" style="margin-bottom:20px;margin-right: 20px;">
                            <div class="btn gray row-fluid xlarge m_title" style="margin-bottom:2px;"><?=$val['name']?></div>
                            <div class="btn gray row-fluid"><?=$val['belong']?></div>
                        </div>
                    <?php endforeach;?>
                    <div class="clear"></div>
                    <div class="span1" >
                        <div class="btn gray row-fluid" onclick="add(<?=$v['id']?>);"><img src="<?=STATIC_FILE_HOST?>assets/image/addcate.png"></div>
                    </div>
                </div>
            </div>
            <hr>
        <?php endforeach;?>
    </div>

    <!-- END PAGE CONTAINER-->

</div>


<div class="modal fade " id="cateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">添加分类</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="/product/addCategory" novalidate="novalidate" method="post">
                <div class="form-group">
                    <div class="control-group">
                        <label class="control-label">大类名称:</label>
                        <div class="controls">
                            <input type="text" id="catename" class="m-wrap" placeholder="请添加名称">
                            <input type="hidden" id="cateid" value="0">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">大类拼音:</label>
                        <div class="controls"> 
                            <input type="text" id="catepy" class="m-wrap" placeholder="请添加拼音">    
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO标题模板:</label>
                        <div class="controls">
                            <textarea type="text" id="seo_t" class="m-wrap" placeholder="请添加SEO标题模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO描述模板:</label>
                        <div class="controls">
                            <textarea type="text" id="seo_d" class="m-wrap" placeholder="请添加SEO描述模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO关键字模板:</label>
                        <div class="controls">
                            <textarea type="text" id="seo_k" class="m-wrap" placeholder="请添加SEO关键字模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label tips">SEO的TDK内容支持的变量:</label>
                        <div class="controls">
                            <label>国家名字:{country_name}</label>
                            <label>城市名字:{city_name}</label>
                            <label>大分类名字:{category_name1}</label>
                            <label>小分类名字:{category_name2}</label>
                        </div>
                    </div>
                </div>
            </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveCate">保存</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">取消</button>
                <button style="display:none;" type="button" class="btn btn-primary" id="delparent">删除</button>
            </div>
        </div>
    </div>
</div>
<div class="clear" style="clear:both;"></div>
<div class="modal fade " id="childCateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">添加子分类</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" id="category" action="#" novalidate="novalidate" method="post">
                <div class="form-group">
                    <div class="control-group">
                        <label class="control-label">小类名称:</label>
                        <div class="controls">
                            <input type="text" id="childcatename" class="m-wrap" placeholder="请添加名称">
                            <input type="hidden" id="childcateid" value="0">
                            <input type="hidden" id="childid" value="0">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">小类拼音:</label>
                        <div class="controls"> 
                            <input type="text" id="childcatepy" class="m-wrap" placeholder="请添加拼音">    
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label ">权限：</label>
                        <div class="controls">
                            <label class="radio">
                                <span class=""><input type="radio" value="0" name="belong"></span>公用</label>
                            </label>
                            <label class="radio">
                                <span class=""><input type="radio" value="1" name="belong"></span>部分可用</label>
                            </label>
                        </div>

                        <div class="control-group" name="open_div" style="display: none;" >
                            <div class="controls">
                                <select name="cityId" id="cityId" class="medium m-wrap">
                                    <option value="-1">选择城市</option>
                                    <?php foreach($city as $key=>$val):?>
                                        <option value="<?=$val['id']?>">
                                            <?=$val['city_name']?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO标题模板:</label>
                        <div class="controls">
                            <textarea type="text" id="c_seo_t" class="m-wrap" placeholder="请添加SEO标题模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO描述模板:</label>
                        <div class="controls">
                            <textarea type="text" id="c_seo_d" class="m-wrap" placeholder="请添加SEO描述模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">SEO关键字模板:</label>
                        <div class="controls">
                            <textarea type="text" id="c_seo_k" class="m-wrap" placeholder="请添加SEO关键字模板"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label tips">SEO的TDK内容支持的变量:</label>
                        <div class="controls">
                            <label>国家名字:{country_name}</label>
                            <label>城市名字:{city_name}</label>
                            <label>大分类名字:{category_name1}</label>
                            <label>小分类名字:{category_name2}</label>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="childSaveCate">保存</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">取消</button>
                <button style="display:none;" type="button" class="btn btn-primary" id="delchild">删除</button>
            </div>
        </div>
    </div>
</div>

<!-- END PAGE -->
<style>
    .modal_1{width:600px;height:350px;}
    .modal_1 .modal-body{max-height:250px;}
    .modal_2{width:600px;height:350px;}
    .modal_2 .modal-body{max-height:250px;}
</style>
<?php $this->load->view('block/footer.php')?>
<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/js/jquery.uniform.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/gridly/idrag.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/gridly/jquery-ui.min.js" type="text/javascript" ></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        show_div();
        $('#addcate').click(function(){
            $('#delparent').hide();
            $('#catename').val('');
            $('#catepy').val('');
            $('#cateid').val(0);
            $('#cateModal').modal('show').addClass("modal_1");
            
        })
        $('#saveCate').click(function(){
            var catename = $('#catename').val();
            var catepy = $('#catepy').val();
            var cateid = $('#cateid').val();
            if(catename == ''){
                layer.msg('请输入分类名称');
                return false;
            }
            if(catepy == ''){
                layer.msg('请输入分类拼音');
                return false;
            }
            var re = /^[a-z]+$/;
            if(!re.test(catepy)){
                layer.msg('分类拼音只能填写小写拼音');
                return false;
            }
            $.post("/product/saveCategory",
                {
                    cateid:cateid,
                    catename:catename,
                    catepy:catepy,
                    seo_t:$('#seo_t').val(),
                    seo_d:$("#seo_d").val(),
                    seo_k:$("#seo_k").val()
                },function(result){
                if(result.error_code==0){
                    layer.msg('保存成功！');
                    $('#cateModal').modal('hide');
                    window.location.reload();
                }else{
                    layer.msg(result.error_message);
                }
            });
        })
        $('#childSaveCate').click(function(){
            var childcatename = $('#childcatename').val();
            var child_category_id = $('#childcateid').val();
            var childcatepy = $('#childcatepy').val();
            var childid = $('#childid').val();
            //var childcateid = $('#childcateid').val();
            var belong = $('input[name="belong"]:checked').val();
            var city = $("#cityId option:selected").val();
            if(childcatename == ''){
                layer.msg('请输入小类名称');
                return false;
            }
            if(childcatepy == ''){
                layer.msg('请输入小类拼音');
                return false;
            }
            if(belong == 1){
                if(city < 0){
                    layer.msg('请选择城市权限');
                    return false;
                }
            }
            var re = /^[a-z]+$/;
            if(!re.test(childcatepy)){
                layer.msg('分类拼音只能填写小写拼音');
                return false;
            }
            $.post("/product/saveChildCategory",{
                child_category_id:child_category_id,
                childid:childid,
                childcatename:childcatename,
                childcatepy:childcatepy,
                belong:belong,
                city:city,
                seo_t:$('#c_seo_t').val(),
                seo_d:$("#c_seo_d").val(),
                seo_k:$("#c_seo_k").val()
            },function(result){
                if(result.error_code==0){
                    layer.msg('保存成功！');
                    $('#childCateModal').modal('hide');
                    window.location.reload();
                }else{
                    layer.msg(result.error_message);
                }
            });        
        })

        $('#delparent').click(function(){
            var catename = $('#catename').val();
            var cateid = $('#cateid').val();
            layer.confirm(catename + '的小类也会同时删除，是否继续？', {
                btn: ['确定','取消']
            }, 
            function(index){
                $.post('/product/delCategory/',
                    {
                        'cateid' : cateid,
                    },
                    function(data){
                        if(data.error_code=='0'){
                           layer.msg('删除成功');
                           layer.close(index);
                           $('#cateModal').modal('hide');
                           window.location.reload();
                        }else{
                            layer.msg(data.error_message);
                        }
                    }
                );
            }, function(){

            });
        })

        $('#delchild').click(function(){
            var cateid = $('#childid').val();
            layer.confirm('确定删除该分类？', {
                btn: ['确定','取消']
            }, 
            function(index){
                $.post('/product/delCategory/',
                    {
                        'cateid' : cateid,
                    },
                    function(data){
                        if(data.error_code=='0'){
                           layer.msg('删除成功');
                           layer.close(index);
                           $('#cateModal').modal('hide');
                           window.location.reload();
                        }else{
                            layer.msg(data.error_message);
                        }
                    }
                );
            }, function(){

            });            
        })
    })

    function edit(obj){
        $('#delparent').show();
        var category_id = obj;
        $.post("/product/getCateById",{category_id:category_id},function(result){
            if(result.error_code==0){
                $('#cateid').val(result.desc.id);
                $('#catename').val(result.desc.name);
                $('#catepy').val(result.desc.py);
                $('#seo_t').val(result.desc.seo_t);
                $('#seo_d').val(result.desc.seo_d);
                $('#seo_k').val(result.desc.seo_k);
                $('#cateModal').modal('show').addClass("modal_1");
            }else{
                layer.msg(result.error_message);
            }
        });
    }

    function add(obj){
        $('#delchild').hide();
        $("#cityId").select2({allowClear: true});
        var parent_id = obj;
        $('#childcateid').val(parent_id);
        $('#childcatename').val('');
        $('#childcatepy').val('');
        $('#childid').val(0);
        $("input[name='belong']").eq(0).attr('checked','checked');
        $("input[name='belong']").eq(0).parent().addClass('checked');
        $("input[name='belong']").eq(1).removeAttr('checked');
        $("input[name='belong']").eq(1).parent().removeClass('checked');
        $("[name='open_div']").hide();
        $('#childCateModal').modal('show').addClass("modal_2");
        $.fn.modal.Constructor.prototype.enforceFocus = function () { };
        $('.select2-drop').css('z-index','100000');
    }

    function show_div(){
        $("[name='belong']").on('click',function(){
            var belong = $(this).val();
            var open_div = $("[name='open_div']");
            if(belong == 1)
            {
                if(open_div != undefined)
                    open_div.show();
            }else{
                if(open_div != undefined)
                    open_div.hide();
            }
        });
    }

    function editchild(obj){
        $('#delchild').show();
        $("input[name='belong']").removeAttr('checked').parent().removeClass('checked');
        var category_id = obj;
        //子分类id
        $('#childid').val(category_id);
        //子分类的pid
        $('#childcateid').val(0);
        $.post("/product/getCateById",{category_id:category_id},function(result){
            if(result.error_code==0){
                $('#childcatename').val(result.desc.name);
                $('#childcatepy').val(result.desc.py);
                $('#c_seo_t').val(result.desc.seo_t);
                $('#c_seo_d').val(result.desc.seo_d);
                $('#c_seo_k').val(result.desc.seo_k);
                $("input[name='belong'][value='"+result.desc.belong+"']").attr('checked','checked').parent().addClass('checked');
                if(result.desc.belong == 1){
                    $("[name='open_div']").show();
                    $("#cityId").val(result.desc.city_id);
                    $("#cityId").find("option[value='"+result.desc.city_id+"']").attr("selected",true);
                    $("#cityId").select2({allowClear: true});
                    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
                    $('.select2-drop').css('z-index','100000');
                }else{
                    $("[name='open_div']").hide();
                }
                $('#childCateModal').modal('show').addClass("modal_2");
            }else{
                layer.msg(result.error_message);
            }
        });
    }
</script>
