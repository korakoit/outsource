<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />

    <title>懒猫旅游后台管理</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta content="" name="description" />

    <meta content="" name="author" />

    <script type="text/javascript">
        //全局的JS路径
        var base_url = "<?=STATIC_FILE_HOST?>";
    </script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?=STATIC_FILE_HOST?>assets/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/q_style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?=STATIC_FILE_HOST?>assets/css/uniform.default.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page-header-fixed">
<div class="page-container">
<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE CONTENT-->

        <div class="container-fluid">
            <div class="row-fluid">
                <form class="form-horizontal" action="/product/saveCateDesc/" method="post" >
                    <div class="control-group">
                        <label class="control-label">分类名：</label>
                        <div class="controls">
                            <input type="text" class="m-wrap medium" value="<?=$desc['name']?>" name="catename">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">分类拼音：</label>
                        <div class="controls">
                            <input type="text" class="m-wrap medium" value="<?=$desc['cate_py']?>" name="cate_py">(用于链接SEO优化)
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="form-actions">
                        <button class="btn blue saveCateDesc" type="submit"><i class="icon-ok"></i> 保存</button>
                    </div>
                </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <div class="row-fluid">
                <input type="hidden" name="cid" value="<?=$id?>" id="cid">
                <table class="table table-border table-bordered table-hover table-bg">
                    <thead>
                    <tr class="">
                        <th>名称</th>
                        <th width="300">优先级</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($list)):?>
                        <?php foreach($list as $cateKey => $cateRow):?>
                            <tr class="text-c">
                                <?php if(empty($cateRow['supplier_remark'])):?>
                                    <td><?=$cateRow['lm_name']?></td>
                                <?php else:?>
                                    <td><?=$cateRow['supplier_remark']?></td>
                                <?php endif;?>
                                <td>
                                    <input type="hidden" name="id[]" value="<?=$cateRow['sale_id']?>">
                                    <div class="coefficient">
                                        <div style="display:none" class="rank"><?=$cateRow['ord']?></div>
                                        <span class="fontgeo f14 red"><?=$cateRow['ord']?></span>
                                        <a class="modifyCoefficient btn">修改</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php else:?>
                        <tr>
                            <td colspan="15">没有数据！</td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
                <?php if(isset($pagination)):?>
                    <tfoot>
                    <tr>
                        <td colspan="13" >
                            <div class="pagination pagination-centered" >
                                <?=$pagination?>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                <?php endif;?>
            </div>
        </div>

    </div>

    <!-- END PAGE CONTAINER-->
</div>
</div>
</body>
</html>
<!-- END PAGE -->
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/jquery.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript">

    $(function() {
        var valid_form = function () {
            var catename = $("[name='catename']");
            if (catename.val()== undefined || catename.val() == "") {
                catename.css({"border":"1px solid red"});
                alert('分类名不能为空。');
                return false;
            }
            var cate_py =$("[name='cate_py']");
            if (cate_py.val() == undefined || cate_py.val() == "") {
                cate_py.css({"border":"1px solid red"});
                alert('分类拼音不能为空。');
                return false;
            }
            return true;
        };
        $(".saveCateDesc").live("click",function()
        {
            var res = valid_form();
            if(!res)
            {
                return false;
            }
        });
    });
    $(function(){
        $(".modifyCoefficient").live('click',function(){
            $(".cancelModifyCoefficient").trigger("click");
            tag = $(".modifyCoefficient").index($(this));
            id = $("input[name='id[]']").eq(tag).val();
            cid = $("#cid").val();
            rank = $(".rank").eq(tag).text();
            html='<input type="text" name="rank" value="'+rank+'" id="rankVal" class="m-wrap small" size="4"/> ';
            html+='<a class="btn" id="updateCoefficient">提交</a> ';
            html+=' <a class="btn cancelModifyCoefficient" >取消</a>';
            $(".modifyCoefficient").eq(tag).parent().html(html);
        });

        $(".cancelModifyCoefficient").live('click',function(){
            tag=$(".cancelModifyCoefficient").index($(this));
            rank=$("#rankVal").val();
            $("#rankVal").parent().html('<div style="display:none" class="rank">'+rank+'</div><span class="fontgeo f14 red">'+rank+'</span> <a href="#" class="btn modifyCoefficient r">修改</a>');
        });
        $("#updateCoefficient").live('click',function(){
            rank=$("#rankVal").val();
            var re = /^[0-9]*[1-9][0-9]*$/;
            if(!re.test(rank)){
                alert('请输入正整数.');
                return false;
            }
            $.ajax({
                url:'/product/editProRank',                     //后台处理程序路径
                type:'post',        							  //数据发送方式
                data:'id='+id+'&rank='+rank+'&cid='+cid,  //要传递的数据
                dataType:'text',    							  //接受数据格式
                error:function(){
                    alert('返回数据错误！');
                },
                success:function(text){ 						  //回传函数
                    if(text){
                        window.location.reload();
                    }else{
                        alert('修改失败！');
                    }
                }
            })
        });
    });

</script>