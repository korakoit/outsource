<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>

<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/css/select2_metro.css" />

<link>
<!-- BEGIN PAGE -->
<style type="text/css">
    .table th, .table td {
        border-top: 1px solid #ddd;
        line-height: 20px;
        padding: 8px;
        text-align: center;
        vertical-align:middle;
    }
</style>
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            
        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="row-fluid">

            <div class="span12 booking-search">

                    <form action="" method="get" class="form-horizontal">
                        <div class="clearfix margin_left_90">
                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">
                                <label class="control-label">所属终端:</label>
                                <div class="controls">
                                    <select name="type" id="type" class="medium m-wrap" >
                                        <option value="-1">选择终端</option>
                                        <option value="0" <?php if(isset($search['type']) && $search['type'] ==0) echo 'selected';?> >移动端</option>
                                        <option value="1" <?php if(isset($search['type']) && $search['type'] ==1) echo 'selected';?> >PC端</option>
                                    </select>
                                </div>

                            </div>

                            <div class="control-group pull-left margin-right-20" style="margin-right:20px;">
                                <label class="control-label">有效状态:</label>
                                <div class="controls">
                                    <select class="medium m-wrap" name="valid" id="valid">
                                        <option value="-1">选择状态</option>
                                        <option  value="0" <?php if(isset($search['valid']) && $search['valid'] == 0) echo 'selected';?> >失效</option>
                                        <option  value="1" <?php if(isset($search['valid']) && $search['valid'] == 1) echo 'selected';?> >有效</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group pull-left margin-right-20"  style="margin-left:-20px;">
                                <label class="control-label">标题关键字:</label>
                                <div class="controls">
                                    <input type="text" name="titleKey" class="medium m-wrap" placeholder="键入标题关键字" value="<?php if(isset($search['titleKey'])) echo $search['titleKey'];?>">
                                </div>
                            </div>
                        </div>


                        <div class="clearfix margin-bottom-10">
                            <div class="pull-left margin-right-20" style="margin-right:20px;">
                                <a class="btn green" href="/banner/add/">新增BANNER</a>
                            </div>

                            <div class="pull-left margin-right-20" style="margin-right:20px;">
                                    <button class="btn blue" type="submit">开始搜索</button>
                            </div>

                            <div class="pull-left margin-left-20" style="margin-right:20px;">
                                <a class="btn blue" href="/banner/index">清空条件</a>
                            </div>
                        </div>
                    </form>
            </div>

            <!-- 开始分割线-->
            <ul class="nav nav-list">

                <li class="divider"></li>

            </ul>
            <!-- 结束分割线-->
            <form id="batch-form" name="batch-form" method="post" >
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>
                    <th>编号</th>
                    <th class="hidden-480">标题</th>
                    <th class="hidden-480">图片</th>
                    <th class="hidden-480">所属终端</th>
                    <th class="hidden-480">URL地址</th>
                    <th class="hidden-480">添加时间</th>
                    <th class="hidden-480">更新时间</th>
<!--                    <th class="hidden-480">开始时间</th>-->
<!--                    <th class="hidden-480">结束时间</th>-->
                    <th class="hidden-480">有效状态</th>
                    <th class="hidden-480">排序值</th>
                    <th class="hidden-480">位置标志</th>
                    <th class="hidden-480">管理</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($result)):?>
                    <?php foreach($result as $k=>$row): ?>
                        <?php
                            $skunum = isset($row['sku']) ? count($row['sku']) : 0;
                        ?>
                        <tr class="odd gradeX">
                            <td><?=$row['id']?></td>
                            <td><?=$row['title']?></td>
                            <td>
                                <?php if(!empty($row['pic'])):?>
                                    <img class='content'  src='<?=IMAGE_FILE_HOST?><?=substr($row['pic'],0,2)?>/<?=$row['pic']?>' style=\"width:100px;height:100px;\">
                                <?php endif; ?>
                            </td>
                            <td><?php if($row['type'] == "0"):?>移动端<?php else:?>PC端<?php endif;?></td>
                            <td ><?=@$row['url']?></td>
                            <td ><?=@date("Y-m-d H:i",$row['add_date'])?></td>
                            <td ><?=@date("Y-m-d H:i",$row['update_date'])?></td>
<!--                            <td >--><?//=@date("Y-m-d H:i",$row['start_date'])?><!--</td>-->
<!--                            <td >--><?//=@date("Y-m-d H:i",$row['end_date'])?><!--</td>-->
                            <td ><?php if($row['valid'] == "0"):?>失效<?php else:?>有效<?php endif;?></td>
                            <td ><?=@$row['ord']?></td>
                            <td ><?=@$row['position']?></td>
                            <td ><a href="/banner/edit/<?=$row['id']?>">编辑</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="15">没有数据！</td>
                    </tr>
                <?php endif;?>

                </tbody>

            </table>
            </form>
            <!--分页-->
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

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<!-- 弹窗相关 -->
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/js/select2.min.js"></script>
<script type="text/javascript">

</script>
