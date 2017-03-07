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
        var image_url = "<?=IMAGE_FILE_HOST?>";
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
    <link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
    <style type="text/css">
        #thumbnails ul li{float:left;list-style-type:none;width:105px;margin-left:5px;}
        .uploadify-queue {height: 0px;}
    </style>
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
                <form class="form-horizontal" action="/product/saveCityDesc/" method="post" >
                    <div class="control-group">
                        <label class="control-label">城市名：</label>
                        <div class="controls">
                            <input type="text" disabled="" class="m-wrap medium" value="<?=$desc['city_name']?>" name="catename">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">副标题：</label>
                        <div class="controls">
                            <input type="text" class="m-wrap medium" name="catetitle" value="<?=$desc['title']?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">介绍文字：</label>
                        <div class="controls">
                            <input type="text" style="width:250px;" class="m-wrap" name="catetext" value="<?=$desc['profile']?>">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="control-group">
                        <label class="control-label">PC图片：</label>
                        <input type="hidden" name="catepic" id="catepic" value="<?=$desc['url']?>">
                        <div class="controls">
                            <div class="margin-bottom-10" title="pic">
                                <div id="queue"></div>
                                <div style="width:250px; height: auto; border: 1px solid #e1e1e1; font-size: 12px; padding: 10px;">
                                    <div id="thumbnails" class="margin-bottom-10">
                                        <ul id="pic_list" style="margin: 5px;">
                                            <?php if(!empty($desc['url'])):?>
                                                <li><img class='content'  src='<?=IMAGE_FILE_HOST?><?=substr($desc['url'],0,2)?>/<?=$desc['url']?>' style=\"width:100px;height:100px;\"></li>
                                            <?php endif; ?>
                                        </ul>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <input name="file_upload" id='cate_upload' type="file" multiple="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">移动端图片：</label>
                        <input type="hidden" name="mobile_catepic" id="mobile_pic" value="<?=$desc['m_url']?>">
                        <div class="controls">
                            <div class="margin-bottom-10" title="pic">
                                <div id="queue"></div>
                                <div style="width:250px; height: auto; border: 1px solid #e1e1e1; font-size: 12px; padding: 10px;">
                                    <div id="thumbnails" class="margin-bottom-10">
                                        <ul id="m_pic_list" style="margin: 5px;">
                                            <?php if(!empty($desc['m_url'])):?>
                                                <li><img class='content'  src='<?=IMAGE_FILE_HOST?><?=substr(($desc['m_url']),0,2)?>/<?=$desc['m_url']?>' style=\"width:100px;height:100px;\"></li>
                                            <?php endif; ?>
                                        </ul>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <input name="file_upload" id='mobile_cate_upload' type="file" multiple="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn blue" type="submit"><i class="icon-ok"></i> 保存</button>
                    </div>
                </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <div class="row-fluid">
                <table class="table table-border table-bordered table-hover table-bg">
                    <thead>
                    <tr class="">
                        <th>名称</th>
                        <th width="300">优先级</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($list)):?>
                            <?php foreach($list as $cityKey => $cityRow):?>
                                <tr class="text-c">
                                    <td><?=$cityRow['name']?></td>
                                    <td>
                                        <input type="hidden" name="id[]" value="<?=$cityRow['id']?>">
                                        <div class="coefficient">
                                            <div style="display:none" class="rank"><?=$cityRow['ord']?></div>
                                            <span class="fontgeo f14 red"><?=$cityRow['ord']?></span>
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
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $(".modifyCoefficient").live('click',function(){
             $(".cancelModifyCoefficient").trigger("click");
            tag = $(".modifyCoefficient").index($(this));
            id = $("input[name='id[]']").eq(tag).val();
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
                url:'/product/editRank',                     //后台处理程序路径
                type:'post',        							//数据发送方式
                data:'id='+id+'&rank='+rank,					//要传递的数据
                dataType:'text',    							//接受数据格式
                error:function(){
                    alert('返回数据错误！');
                },
                success:function(text){ 						//回传函数
                    if(text){
                        window.location.reload();
                    }else{
                        alert('修改失败！');
                    }
                }
            })
        });

        $("#cate_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '1024KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'width': '1920', 'height': '284' },
            uploader      : '/upload/uploadCountryPic/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0){
                    var newElement = "<li><img class='content'  src='"+image_url+obj.path+"' style=\"width:100px;height:100px;\"></li>";
                    $("#pic_list").html(newElement);
                    $("#catepic").val(obj.raw_name);
                }else{
                    alert(obj.error_msg)
                    return false;
                }
            },
        });

        $("#mobile_cate_upload").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '2048KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            auto: true,
            multi: true,
            formData : { 'width': '405', 'height': '405' },
            uploader      : '/upload/uploadPic/',
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==0){
                    var newElement = "<li><img class='content'  src='"+image_url+obj.path+"' style=\"width:100px;height:100px;\"></li>";
                    $("#m_pic_list").html(newElement);
                    $("#mobile_pic").val(obj.raw_name);
                }else{
                    alert(obj.error_msg)
                    return false;
                }
            },
        });
    });
</script>