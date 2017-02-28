<?php $this->load->view('block/header.php');?>

<?php $this->load->view('block/nav_top.php');?>

<?php $this->load->view('block/nav_bar.php');?>>
<link rel="stylesheet" href="<?=STATIC_FILE_HOST?>assets/plugin/ztree/css/metroStyle/metroStyle.css" type="text/css">

<!-- BEGIN PAGE -->
<div class="page-content">

    <!-- BEGIN PAGE CONTAINER-->

    <div class="container-fluid">

        <!-- BEGIN PAGE HEADER-->

        <div class="row-fluid">

            <div class="span12">

                

            </div>

        </div>

        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->

        <div class="container-fluid">
            <div class="row-fluid">
                <TABLE border=0 height=600px align=left>
                    <TR>
                        <TD width=260px align=left valign=top style="BORDER-RIGHT: #999999 1px dashed">
                            <ul id="tree" class="ztree" style="width:260px; overflow:auto;"></ul>
                        </TD>
                        <TD width=770px align=left valign=top><IFRAME ID="testIframe"  Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO width=100%  SRC=""></IFRAME></TD>
                    </TR>
                </TABLE>

            </div>
        </div>

    </div>

    <!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

<?php $this->load->view('block/footer.php')?>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ztree/js/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ztree/js/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript" src="<?=STATIC_FILE_HOST?>assets/plugin/ztree/js/jquery.ztree.exedit-3.5.js"></script>

<script type="text/javascript">
    var setting = {
        view: {
            addHoverDom: addHoverDom,
            removeHoverDom: removeHoverDom,
            selectedMulti: false
        },
        check: {
            enable: false
        },
        data: {
            simpleData: {
                enable: false
            }
        },
        edit: {
            enable: true,
            showRemoveBtn: showRemoveBtn,
            showRenameBtn: showRenameBtn
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.type==='continent') {
                    return false;
                } else {
                    if(treeNode.type==='city'){
                        var url = "/product/editCity/"+treeNode.id;
                    }else if(treeNode.type==='tag'){
                        var url = "/product/editCate/"+treeNode.id;
                    }else if(treeNode.type==='country'){
                        var url = "/product/editCoun/"+treeNode.id;
                    }
                    demoIframe.attr("src",url);
                    demoIframe.bind("load", iFrameHeight);
                    return true;
                }
            },
            beforeEditName: beforeEditName,
            beforeRemove: beforeRemove,
            beforeRename: beforeRename,
            onRemove: onRemove,
            onRename: onRename,
            beforeDrag:function(){return false;}
        }
    };

    var zNodes = <?=$json?>;

    $(document).ready(function(){
        $.fn.zTree.init($("#tree"), setting, zNodes);
    });

    var newCount = 1;
    function addHoverDom(treeId, treeNode) {
        var sObj = $("#" + treeNode.tId + "_span");
        if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
        if(treeNode.type!=='city') return;
        var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
            + "' title='add node' onfocus='this.blur();'></span>";
        sObj.after(addStr);
        var btn = $("#addBtn_"+treeNode.tId);
        if (btn) btn.bind("click", function(){
            var zTree = $.fn.zTree.getZTreeObj("tree");
            zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
            return false;
        });
    };
    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_"+treeNode.tId).unbind().remove();
    };

    function showRemoveBtn(treeId, treeNode) {
        return !((treeNode.type === 'continent')||(treeNode.type === 'country')||(treeNode.type === 'city'));
    }
    function showRenameBtn(treeId, treeNode) {
        return !((treeNode.type === 'continent')||(treeNode.type === 'country')||(treeNode.type === 'city'));
    }

    function beforeEditName(treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("tree");
        zTree.selectNode(treeNode);
        return confirm("进入节点 -- " + treeNode.name + " 的编辑状态吗？");
    }
    function beforeRemove(treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("tree");
        zTree.selectNode(treeNode);
        var r = confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
        if(r==true){
            if(treeNode.pid){
                $.post("/product/deltag",{id:treeNode.id},function(result){
                });
            }
        }else {
            return false;
        }
    }
    function onRemove(e, treeId, treeNode) {

    }

    function beforeRename(treeId, treeNode, newName, isCancel) {
        var zTree = $.fn.zTree.getZTreeObj("tree");
        if (newName.length == 0) {
            alert("节点名称不能为空.");
            setTimeout(function(){zTree.editName(treeNode)}, 10);
            return false;
        }
        var node = treeNode.getParentNode();
        $.post("/product/addtag",{pid:node.id,name:newName,isadd:treeNode.pid,id:treeNode.id},function(result){
            if(result){
                treeNode.id = result;
                treeNode.type = 'tag';
                treeNode.pid = node.id;
                layer.msg('保存成功,请编辑并添加分类拼音。');
            }
        });
        return true;
    }
    function onRename(e, treeId, treeNode, isCancel) {

    }

    $(document).ready(function(){
        var t = $("#tree");
        t = $.fn.zTree.init(t, setting, zNodes);
        demoIframe = $("#testIframe");
        demoIframe.bind("load", loadReady);
        var zTree = $.fn.zTree.getZTreeObj("tree");
        zTree.selectNode(zTree.getNodeByParam("id", 101));
    });

    //iframe 自适应高度
    function loadReady() {
        var bodyH = demoIframe.contents().find("body").get(0).scrollHeight,
            htmlH = demoIframe.contents().find("html").get(0).scrollHeight,
            maxH = Math.max(bodyH, htmlH), minH = Math.min(bodyH, htmlH),
            h = demoIframe.height() >= maxH ? minH:maxH ;
        if (h < 250) h = 250;
        demoIframe.height(h);
    }
</script>
