<?php $this->load->view('block/header.php');?>
<?php $this->load->view('block/nav_top.php');?>
<?php $this->load->view('block/nav_bar.php');?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <p style="font-size: 18px;">当前字段：<?=$field['ch_name']?></p>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 booking-search" style="height: 120px;">
                <div class="clearfix margin-bottom-20">
                    <form  class="form-horizontal" method="get">
                        <div class="control-group">
                            <div class="control-group pull-left" style="margin-left: -130px;">
                                <label class="control-label">号段:</label>
                                <div class="controls">
                                    <input type="text" style="width: 180px;" name="num" class="medium m-wrap" placeholder="键入号段" value="<?=@$search['num']?>">
                                </div>
                            </div>
                            <div class="control-group pull-left" style="">
                                <label class="control-label">状态：</label>
                                <div class="controls">
                                    <select name="is_use" class="m-wrap span40">
                                        <option value="all" <?=empty(@$search['is_use'])    ? 'selected' : NULL ?>  ></option>
                                        <option value="yes" <?= @$search['is_use'] == 'yes' ? 'selected' : NULL; ?> >已使用</option>
                                        <option value="no"  <?= @$search['is_use'] == 'no ' ? 'selected' : NULL;?>  >未使用</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group pull-left" style="margin-left:-40px;text-align: left;">
                                <label class="control-label">字段ID:</label>
                                <div class="controls">
                                    <input type="text" style="width: 100px;" name="id_start"  width="" value="<?=@$search['id_start']?>">
                                    至
                                    <input type="text" style="width: 100px;" name="id_end"   value="<?=@$search['id_end']?>">
                                </div>
                            </div>
                        </div>
                        <div  class="control-group" style="width:400px;">
                            <div class="pull-left" style="margin-right:20px;">
                                <input type="submit" value="开始搜搜" class="btn blue">
                            </div>
                            <div class="pull-left margin-right-20" style="margin-right:20px;">
                                <a href="<?=base_url('public_field/confirm_num/'.$f_id);?>" class="btn blue" name="reset" id="reset">清空条件</a>
                            </div>
                            <div class="pull-left margin-right-20" style="margin-right:20px;">
                                <a href="javascript:void(0);" class="btn blue" id="js_number_add">新增导入</a>
                            </div>
                            <div class="pull-left margin-right-20 js-mulit-del" style="margin-right:20px;">
                                <a href="javascript:void(0);" class="btn blue" id="js_number_add">批量删除</a>
                            </div>
                        </div>
                    
            
            <div class="control-group pull-left" style="margin-left:450px;margin-top:-60px;">
                <div class="alert alert-error fixedWidth" style="font-size: 16px;">
                    <p><b>导入提示：</b>Excel文件类型仅支持xls,第一列竖行填写确认号</p>
                </div>
            </div>
        </form>
   </div>
</div>
            <table class="table table-striped table-bordered table-hover" style="margin-top:-10px;">
                <thead>
                <tr>
                    <th width="10%"><input type="checkbox" id="SelectAll">全选/反选</th>
                    <th width="10%">ID</th>
                    <th width="20%">确认号</th>
                    <th width="15%">添加人</th>
                    <th width="15%">更新时间</th>
                    <th width="15%">状态</th>
                    <th width="15%">操作</th>
                </tr>
                </thead>
                <?php if(!empty($data)):?>
                    <?php foreach($data as $key=>$num):?>
                        <tbody>
                        <tr class="tr_<?= $num['id']?>">
                            <td><input type="checkbox" class="js-sub-check" name="check[]" value="<?= $num['id']?>"></td>
                            <td><?= $num['id']?></td>
                            <td><?= $num['num']?></td>
                            <td><?= $num['operator']?></td>
                            <td><?= date('Y-m-d H:i:s', $num['update_time'])?></td>
                            <td>
                                <?php
                                if($num['status'] == '1'){
                                    echo '<span class="label label-success">未使用</span>';
                                }elseif($num['status'] == '2'){
                                    echo '<span class="label label-important">已使用</span>';
                                }elseif($num['status'] == '3'){
                                    echo '<span class="label">已删除</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn red js-del"  data-id="<?=$num['id']?>">删除</a>
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach;?>
                <?php else:?>
                    <tbody>
                    <tr>
                        <td colspan="7" style="text-align: center;">没有数据!</td>
                    </tr>
                    </tbody>
                <?php endif;?>
            </table>
            <?php if(isset($pagination)):?>
                <div class="pagination pagination-right" >
                    <?=$pagination?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<div id="uploadAlert" class="modal hide" tabindex="-1" style="margin-top:250px;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close js-modal-close" type="button"></button>
        <span class="icon"><i class="icon-upload"></i>导入数据</span>
    </div>
    <div class="modal-body">
        <form action="<?=base_url("table_explode/reload")?>" id='from_file'
              class="form-horizontal"
              enctype="multipart/form-data" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">导入资源：</label>
                <div class="controls">
                    <input id="confirm_num_file" name="confirm_num_file" type="file" style="font-size: 16px;">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0);" id="confirm_num_file_submit"  class="btn blue" data-dismiss="modal">确定导入</a>
        <a data-dismiss="modal" class="btn js-modal-close" href="javascript:void(0);">关闭</a>
    </div>
</div>


<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/ajaxfileupload.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/js/popfruit.js"></script>
<script>
    $(function() {
        //添加确认号
        $('#js_number_add').bind('click', function() {
            popfruit('uploadAlert');
        });

        //全选/反选
        $('#SelectAll').bind('click', selectAll);
        //子勾选事件
        $('.js-sub-check').bind('click', setSelectAll);

        //删除按钮
        $('.js-del').bind('click', function () {
            if(confirm('确定删除号段吗？号段删除后不可恢复，请谨慎操作')) {
                del($(this).attr('data-id'));
            }

        });

        //批量删除
        $('.js-mulit-del').bind('click', function () {
            var checks = $(".js-sub-check:checked");
            if(checks.length == 0) {
                alert('请勾选需要删除的确认码');return;
            }
            if(confirm('确定删除号段吗？号段删除后不可恢复，请谨慎操作')) {
                var ids = "";
                $.each(checks, function () {
                    ids += $(this).val() + ",";
                });
                ids=ids.substring(0,ids.length-1);//去掉最后一个逗号
                del(ids);
            }
        });

        //导入框体的关闭
        $('.js-modal-close').bind('click', function () {
            //清除上传按钮的值
            $('#confirm_num_file').val("");
            $('#uploadAlert').fadeOut();
        });

        $('#confirm_num_file_submit').bind('click', function() {
            if($('#confirm_num_file').val()==''){
                layer.msg('请先选择要导入的确认码Excel文件');
            }else{
                $.ajaxFileUpload({
                    url: '<?=base_url('/public_field/confirm_num_add/'.$f_id)?>',
                    secureuri:false,
                    fileElementId:'confirm_num_file',//file标签的id
                    dataType: 'json',//返回数据的类型
                    success: function (data, status) {
                        layer.msg(data.message);
                        setTimeout(window.location.reload(),3000);
                    },
                    error: function (data, status) {
                    }
                });
            }
        });
    });

    //复选框事件
    //全选、取消全选的事件
    function selectAll(){
        if ($(this).attr("checked")) {
            $(":checkbox").attr("checked", true);
        } else {
            $(":checkbox").attr("checked", false);
        }
    }
    //子复选框的事件
    function setSelectAll(){
        //当没有选中某个子复选框时，SelectAll取消选中
        if (!$(this).checked) {
            $("#SelectAll").attr("checked", false);
        }
        var chsub = $(".js-sub-check").length; //获取所有子checkbox的个数
        var checkedsub = $(".js-sub-check:checked").length; //获取选中的的个数
        if (checkedsub == chsub) {
            $("#SelectAll").attr("checked", true);
        }
    }
    //删除事件
    function del(ids) {
        console.log(typeof ids);
        $.ajax({
            url:'/public_field/confirm_num_del',
            type:'post',
            dataType:'json',
            data:{ids : ids},
            success:function (res) {
                if(res.status == 'success') {
                    //从table中删掉那列
                    $.each(ids.split(','), function() {
                        $('.tr_' + this).fadeOut();
                    });
                }else{
                    layer.msg(res.msg);
                }
            }
        });
    }
</script>