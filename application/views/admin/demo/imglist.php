<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/jquery-ui/jquery-ui.theme.css">
    <link href="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/fancybox/jquery.fancybox.css" rel="stylesheet">
    <style type="text/css">
      .container{
        z-index:2000;
      }
      .panel-action{
        /*background-color:#f0f0f0;*/
      }
      .bottom-menu{
        min-height: 100px;
        border: 1px solid gray;
        position: relative;
      }
      .thumbnail{
        height:150px;
      }
      .thumbnail ui-widget-content .caption{
        padding:0px;
      }
      .ui-selected .thumbnail.ui-widget-content.ui-selectee {
        background-color: orange;
      }
      .modal-title{
        text-align: center;
      }
      .container{
        width: 100%; 
      }
      .thumbnail a>img, .thumbnail>img{
            max-height: 106px;
      }
      tr.ui-selected{
        background-color:orange!important;
      }
      .caption h5{
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 113px;
        text-align:center;
      }
      .infoWrapper .fopLink{
        display:none;
      }
      .infoWrapper {
        position:relative;
        left:50px;
      }
      .caption h5{
          font-size:10px;
      }
      span.uploadtip{
        font:14px;color:#848689;padding-left:10px;
      }
    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="container">
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="gallaryTab">
    <li role="presentation" class="active"><a href="#cloud" aria-controls="cloud" role="tab" data-toggle="tab">图片库添加</a></li>
    <li role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">上传</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="cloud">
    <br/>
      <div class="panel panel-action">
        <div class="row">
            <div class="col-lg-12">
              <div class="input-group">
               <!-- /navigation -->
                <input id="search" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" id="sou">搜索</button>
                </span>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <ol id="selectable">
          <?php foreach($list['items'] as $k=>$v):?>
            <div class="col-sm-2 col-md-2" >
              <div class="thumbnail ui-widget-content">
                <img src="http://static.cattour.cn/<?=$v['key']?>" alt="">
                <div class="caption">
                  <h5><?=$v['key']?></h5>
                </div>
              </div>
            </div>
          <?php endforeach;?>
          </div>
      </ol>
        <input type="hidden" value="<?=$list['marker']?>" id="marker">
        <div class="row">
          <div class="col-sm-offset-5 col-md-2">
            <button class="btn btn-lg" type="button" id="loadmore">加载更多</button>
          </div>
        </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane hidden " id="upload">
      <?php $this->load->view('product/upload.php');?>


    </div>
  </div>



  </div><!-- /.col-lg-6 -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/jquery.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/bootstrap.min.js"></script>
<script src="<?=STATIC_FILE_HOST?>assets/plugin/layer/layer.js"></script>

  <script type="text/javascript">
    $(function(){
      $('#loadmore').click(function(){
          var marker = $('#marker').val();
          var search = $('#search').val();
          if(marker == ''){
            layer.msg('没有更多了');
            return false;
          }
          var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
          });
          $.post("/product/loadMore",{marker:marker,search:search},function(result){
              var html = '';
              if(result){
                  $('#marker').val(result.marker);
                  $.each(result.items,function(index,content){
                      html += '<div class="col-sm-2 col-md-2" ><div class="thumbnail ui-widget-content">';
                      html += '<img src="http://static.cattour.cn/'+content.key+'" alt="">';       
                      html += '<div class="caption"><h5>'+content.key+'</h5></div></div></div>';       
                  })
                  $('#selectable').append(html);
              }
              layer.close(index);
          })
      })

        $('#sou').click(function(){
            var search = $('#search').val();
            $.post("/product/loadMore",{marker:'',search:search},function(result){
                var html = '';
                if(result){
                    $('#selectable').html('');
                    $('#marker').val(result.marker);
                    $.each(result.items,function(index,content){
                        html += '<div class="col-sm-2 col-md-2" ><div class="thumbnail ui-widget-content">';
                        html += '<img src="http://static.cattour.cn/'+content.key+'" alt="">';       
                        html += '<div class="caption"><h5>'+content.key+'</h5></div></div></div>';       
                    })
                    $('#selectable').append(html);
                }
            })
        })
    })
  </script>
    <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/jquery.min.js"></script>
    <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/bootstrap.min.js"></script>
  <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/moxie.js" type="text/javascript" charset="utf-8" ></script>
  <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/Plupload.js" type="text/javascript" charset="utf-8" ></script>
  <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/lib/qiniu.js" type="text/javascript" charset="utf-8" ></script>
    <script src="<?=STATIC_FILE_HOST?>assets/plugin/gallary/js/app.js"></script>
</body></html>