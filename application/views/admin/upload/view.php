<link rel="stylesheet" type="text/css" href="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.css">
<style type="text/css">
    #thumbnails ul li{float:left;list-style-type:none;width:105px;margin-left:5px;}
    #thumbnails .button{display:block;position: relative;right:-84px;top: -118px;width: 30px;z-index: 1103;cursor:pointer;}
</style>
<div id="queue"></div>
<div style="width: 750px; height: auto; border: 1px solid #e1e1e1; font-size: 12px; padding: 10px;">
    <div id="thumbnails">
        <ul id="pic_list" style="margin: 5px;">
        </ul>
        <div style="clear: both;"></div>
    </div>
    <input name="file_upload" id='cc' type="file" multiple="true">
</div>

<script src="<?=STATIC_FILE_HOST?>assets/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

<script type="text/javascript">
    //全局的JS路径
    var base_url = "<?=STATIC_FILE_HOST?>";
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#cc").uploadify({
            height        : 27,
            width         : 80,
            buttonText   : '选择图片',
            fileSizeLimit : '2048KB',
            fileTypeDesc : 'Image Files',
            fileTypeExts : '*.gif; *.jpg; *.png',
            swf           : '<?=STATIC_FILE_HOST?>assets/plugin/uploadify/uploadify.swf',
            uploader      : '/upload/uploadCate/',
            auto: true,
            multi: true,
            onUploadSuccess:function(file,data,response){
                var obj=eval('('+data+')');
                if(obj.error_code==1){
                    layer.msg(obj.error_msg);
                    return false;
                }else{
                    var newElement = "<li><img class='content'  src='" +base_url+obj.path + "' style=\"width:100px;height:100px;\"><img class='button' src=" +base_url+ "assets/plugin/uploadify/fancy_close.png></li>";
                    $("#thumbnails").find('ul').append(newElement);
                    //$('#upload').prev().find("img.button").last().bind("click", del);
                }
            }
        });
    });
</script>
