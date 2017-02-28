<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.theme.css">
    <link href="lib/fancybox/jquery.fancybox.css" rel="stylesheet">
    <style type="text/css">
      .container{
        border: 1px solid gray;
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
        height:130px;
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

    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<button type="button" class="btn btn-primary btn-lg"  id="show">
  插入云端图片
</button>

<!-- Modal -->
<div class="modal fade" id="gallary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="row">
          <div class="col-lg-3">
            
          <h3 class="modal-title" id="myModalLabel">图片库添加</h3>
          </div>
          <div class="col-lg-8">
            <div class="input-group">
             <!-- /navigation -->
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">搜索</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">

          <div class="row">
        <ol id="selectable">
            <div class="col-sm-2 col-md-2" >
              <div class="thumbnail ui-widget-content">
                <img src="img/1.jpg" alt="...">
                <div class="caption">
                  <h5>泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/2.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/3.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/4.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/1.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/2.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/3.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="thumbnail ui-widget-content">
                <img src="img/4.jpg" alt="...">
                <div class="caption">
                  <h5>T泰国普及人妖秀</h5>
                </div>
              </div>
            </div>
          </div>
      </ol>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary btn-lg">插入</button>
      </div>
    </div>
  </div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="lib/jquery.min.js"></script>
    <script src="lib/jquery-ui/jquery-ui.js"></script>
  <script src="lib/fancybox/jquery.fancybox.js"></script>
    <script src="lib/bootstrap.min.js"></script>
  <script src="js/app.js" type="text/javascript" charset="utf-8" async defer></script>
</body></html>