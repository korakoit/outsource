<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

       <div class="row-fluid" style="height:50px;">
            <?php if(empty($product['supplier_remark'])):?>
                <span class="span12" style="height:50px;"><h3><?=$product['name']?></h3></span>
            <?php else: ?>
                <span class="span12" style="height:50px;"><h3><?=$product['supplier_remark']?></h3></span>
            <?php endif;?>    

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid profile">

                <!--BEGIN TABS-->

                <div class="tabbable tabbable-custom tabbable-full-width">

                    <ul class="nav nav-tabs">

                        <li><a href="/product/editFirst/<?=$id?>">基础信息</a></li>

                        <li><a href="/product/editSecond/<?=$id?>">商品详情</a></li>

                        <li><a href="/product/editThird/<?=$id?>">图片管理</a></li>

                        <li><a href="/product/editFour/<?=$id?>">价格管理</a></li>

                        <li class="active"><a href="#tab_1_5" data-toggle="tab">评价管理</a></li>

                        <li><a href="/product/editSix/<?=$id?>">上下架管理</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane row-fluid" id="tab_1_1">

                        </div>


                        <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

                        </div>

                        <div class="tab-pane row-fluid profile-account" id="tab_1_3">

                        </div>


                        <div class="tab-pane" id="tab_1_4">
                            TAB4


                        </div>

                        <div class="tab-pane row-fluid active" id="tab_1_5">
                            <form  name="" id="comment_form" class="form-horizontal" method="post">
                                <div class="row-fluid">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="icon-reorder"></i>打分项</div>
                                    </div>

                                    <div class="span12">
                                        <div class="span6">
                                            <input type="text" name="item[]" class="small" value="<?=$score_item['item_one']?>">
                                        </div>
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">占比：</label>
                                                <div class="controls">
                                                    <input type="text" name="weight[]" class="small" value="<?=$score_item['one_weight']?>">%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span12">
                                        <div class="span6">
                                            <input type="text" name="item[]" class="small" value="<?=$score_item['item_two']?>">
                                        </div>
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">占比：</label>
                                                <div class="controls">
                                                    <input type="text" name="weight[]" class="small" value="<?=$score_item['two_weight']?>">%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span12">
                                        <div class="span6">
                                            <input type="text" name="item[]" class="small" value="<?=$score_item['item_three']?>">
                                        </div>
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label">占比：</label>
                                                <div class="controls">
                                                    <input type="text" name="weight[]" class="small" value="<?=$score_item['three_weight']?>">%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn blue" id="saveCom">保存</button>
                            </form>
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>当前服务评分</div>
                            </div>
                            <div class="row-fluid">
                                <?php if(!empty($score_item['item_one'])):?>
                                    <div class="span4">
                                        <div class="margin-bottom-10"><?=$score_item['item_one']?>:</div>
                                        <div class="margin-bottom-10"><?=$score_item['item_two']?>:</div>
                                        <div class="margin-bottom-10"><?=$score_item['item_three']?>:</div>
                                        <div class="margin-bottom-10">总分：</div>
                                    </div>
                                <?php else:?>
                                    <div class="span4">
                                        <div class="margin-bottom-10">没有数据</div>
                                    </div>
                                <?php endif; ?>

                                <div class="span4">
                                    <div class="margin-bottom-10"><?=$score_avg['one']?></div>
                                    <div class="margin-bottom-10"><?=$score_avg['two']?></div>
                                    <div class="margin-bottom-10"><?=$score_avg['three']?></div>
                                    <?php if(!empty($score_total)):?>
                                        <div class="margin-bottom-10"><?=$score_total?></div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>评价列表</div>
                            </div>
                            <?php if(!empty($list)):?>
                                <?php foreach($list as $commKey => $commRow):?>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="span2"><?=$commRow['nickname']?></div><div class="span2"><?=date('Y-m-d H:i:s',$commRow['create_time'])?></div><div class="span6 text-right"><div class="btn blue"><?=round(($commRow['one_score']+$commRow['two_score']+$commRow['three_score'])/3,1)?></div></div>
                                        </div>
                                        <div class="span12">
                                            <a href="#"><?=$commRow['lm_sale_name']?></a>
                                        </div>
                                        <div class="span12">
                                            <p><?=$commRow['comments']?></p>
                                        </div>
                                        <div class="span12">
                                            <div class="span2"><a href="javascript:void(0);" onclick="reply(this);" class="btn" id="<?=$commRow['id']?>">答复</a></div>
                                            <?php if($commRow['status']==1):?>
                                                <div class="span2">
                                                    <a href="/product/passreply/<?=$commRow['id']?>" class="btn">通过</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <ul class="nav nav-list">
                                        <li class="divider"></li>
                                    </ul>
                                <?php endforeach;?>
                            <?php else: ?>
                                <div class="row-fluid">
                                    没有数据！
                                </div>
                            <?php endif;?>
                            <?php if(isset($pagination)):?>
                                <div class="pagination pagination-centered" >
                                    <?=$pagination?>
                                </div>
                            <?php endif;?>
                        </div>


                        <div class="tab-pane row-fluid" id="tab_1_6">

                            <div class="row-fluid">

                            </div>

                        </div>

                    </div>

                </div>
                <!--END TABS-->


        </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>

<div class="modal hide fade " id="commModal" tabindex="-999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">回复评论</h4>
            </div>
            <div class="modal-body">
                <h4>评价内容</h4>
                <div><p class="alert-error" id="comments"></p></div>
                <input type="hidden" value="" id="comment_id">
                <h4>回复内容</h4>
                <div id="reply">
                </div>
                <div><textarea id="content" style="width: 520px;height: 88px;"></textarea></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveBtn">回复</button>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE -->
<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        $('#saveCom').click(function(){
            var isReturn = false;
            $("input[name='item[]']").each(function(){
               var item = $(this).val();
                if(item==''){
                    layer.msg('打分项不能为空！');
                    isReturn = true;
                }
            });
            var temp = 0;
            $("input[name='weight[]']").each(function(){
                var weight = $(this).val();
                temp += weight*1;
                if(weight==''){
                    layer.msg('权重不能为空！');
                    isReturn = true;
                }
            })
            if(temp!=100){
                layer.msg('权重和必须为100！');
                isReturn = true;
            }
            if(isReturn) return false;
            var form = document.getElementById("comment_form");
            form.action = base_url + 'product/editcomment/';
            form.submit();
        })

        //回复
        $('#saveBtn').click(function(){
            var content = $('#content').val();
            var id = $('#comment_id').val();
            if(content==''){
                layer.msg('请输入回复内容！');
                return false;
            }
            $.post("/product/saveReply",{id:id,content:content},function(result){
                html = "<p class='alert-error'>"+content+"</p>";
                $('.alert-info').text('');
                $('#reply').append(html);
                $('#content').val('');
            });
        })
    })

    function reply(obj){
        var id = $(obj).attr('id');
        var comment = $('#comments');
        comment.text();
        $('#reply').html('');
        $.post("/product/getComm",{id:id},function(result){
            if(result){
                var replyObj = jQuery.parseJSON(result);
                comment.text(replyObj.comments);
                $('#comment_id').val(replyObj.id);
                var html = '';
                if(replyObj.list==''){
                    html += "<p class='alert-info'>暂未回复</p>";
                }else {
                    $.each(replyObj.list, function(i, item) {
                        html += "<p class='alert-error'>"+item.reply+"</p>";
                    });
                }
                $('#reply').append(html);
                $('#commModal').on('shown.bs.modal', function (e) {
                }).modal('toggle');
            }
        });
    }
</script>

