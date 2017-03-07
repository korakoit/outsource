<div class="container">

    <div class="row" style="margin-top: 20px;">
        <input type="hidden" id="domain" value="http://static.lanmao.cn/">
        <input type="hidden" id="uptoken_url" value="/product/getUpToken">
        <a class="btn btn-default btn-lg " id="pickfiles" href="#" style="position: relative;">
            <i class="glyphicon glyphicon-plus"></i>
            <span>上传文件</span>
        </a>
        <span class="uploadtip" style="">请上传&lt;3M的图片</span>
        <div class="col-md-12 ">
            <table class="table table-striped table-hover text-left" style="margin-top:40px;">
                <thead>
                  <tr>
                    <th class="col-md-4">文件名</th>
                    <th class="col-md-4">大小</th>
                    <th class="col-md-4">结果</th>
                  </tr>
                </thead>
                <tbody id="fsUploadProgress">
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div id="container" style="position: relative;">
            <div class="col-md-4 hidden">
                
                <label for="exampleInputEmail1">归档图片库文件夹</label>
                <input type="path" class="form-control" id="exampleInputEmail1" placeholder="text/">
            </div>
                <!-- <a class="btn btn-default btn-lg " id="pickfiles" href="#" style="position: relative;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传文件</span>
                </a> -->

        </div>
        <div style="display:none" id="success" class="col-md-12">
            <div class="alert-success">
                队列全部文件处理完毕
            </div>
        </div>
    </div>
</div>
<div id="selectedTip"></div>