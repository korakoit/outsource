$(function () {
    //“选择其他日期”弹出事件
    $('.date-btn').click(function(){
        var parentTd=$(this).parent('td');
        var sku_id = parentTd.attr('data-id');
        popfruit('calendarPop');
        $('#cale').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            dayNames: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            today: ["今天"],
            firstDay: 1,
            buttonText: {
                today: '今天',
                month: '月',
                week: '周',
                day: '日',
                prev: '上一月',
                next: '下一月'
            },
            editable: true,
            dragOpacity: {
                agenda: .5,
                '': .6
            },
            dayClick: function(date, allDay, jsEvent, view) {
                var toDay = CurentTime();
                var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');
                if (getTime(toDay) > getTime(selDate)) {
                    layer.msg('期限已过');
                    return;
                }
                var skustock = $(this).children(".day_table").attr('data-stock')
                if (skustock == 'no') {
                    $('#sku_date').text(selDate);
                    //不可控库存
                    $('#sku_name').text(parentTd.attr('data-name'));
                    $('#sku_id').val(parentTd.attr('data-id'));
                    screening(parentTd.attr('data-id'));
                    $('#from_source_details').val('');
                    $('#mall_account').val('');
                    $('#tao_account').val('');
                    $('#adult_num').val('');
                    $('#children_num').val('');
                    $('#num').val('');
                    $('#baby_num').val('');
                    $('#add_why').val('');
                    $('#add_remark').val('');
                    $('#price').val('');
                    $('#adult_price').val('');
                    $('#child_price').val('');
                    $('#payment').val('');
                    $('.co-txt').hide();
                    popfruit('giPop');
                    $('#calendarPop').hide();
                }else if(skustock == 0){
                    popfruit('siPop');
                }else if(skustock=='cut_off'){
                    //“库存为cut off”弹出事件
                        popfruit('giPop');
                        $('#sku_date').text(selDate);
                        $('#sku_name').text(parentTd.attr('data-name'));
                        $('#sku_id').val(parentTd.attr('data-id'));
                        screening(parentTd.attr('data-id'));
                        $('#from_source_details').val('');
                        $('#mall_account').val('');
                        $('#tao_account').val('');
                        $('#adult_num').val('');
                        $('#children_num').val('');
                        $('#num').val('');
                        $('#baby_num').val('');
                        $('#add_why').val('');
                        $('#add_remark').val('');
                        $('#price').val('');
                        $('#adult_price').val('');
                        $('#child_price').val('');
                        $('#payment').val('');
                        $('.co-txt').show();
                        $('#calendarPop').hide();
                }else if(skustock > 0){
                    //“库存>0”弹出事件
                        popfruit('giPop');
                        $('#sku_date').text(selDate);
                        $('#sku_name').text(parentTd.attr('data-name'));
                        $('#sku_id').val(parentTd.attr('data-id'));
                        screening(parentTd.attr('data-id'));
                        $('#from_source_details').val('');
                        $('#mall_account').val('');
                        $('#tao_account').val('');
                        $('#adult_num').val('');
                        $('#children_num').val('');
                        $('#num').val('');
                        $('#baby_num').val('');
                        $('#add_why').val('');
                        $('#add_remark').val('');
                        $('#price').val('');
                        $('#adult_price').val('');
                        $('#child_price').val('');
                        $('#payment').val('');
                        $('.co-txt').hide();
                        $('#calendarPop').hide();
                }else if(skustock == 'free_sale'){
                        popfruit('giPop');
                        $('#sku_date').text(selDate);
                        $('#sku_name').text(parentTd.attr('data-name'));
                        $('#sku_id').val(parentTd.attr('data-id'));
                        screening(parentTd.attr('data-id'));
                        $('#from_source_details').val('');
                        $('#mall_account').val('');
                        $('#tao_account').val('');
                        $('#adult_num').val('');
                        $('#children_num').val('');
                        $('#num').val('');
                        $('#baby_num').val('');
                        $('#add_why').val('');
                        $('#add_remark').val('');
                        $('#price').val('');
                        $('#adult_price').val('');
                        $('#child_price').val('');
                        $('#payment').val('');
                        $('.co-txt').hide();
                        $('#calendarPop').hide();
                }else{
                 layer.msg('没有库存不可选');
                }
            },
        });

        init_data(sku_id);
        //上一页
        $('.fc-button-prev').click(function(){
            init_data(sku_id);
        });
        //下一页
        $('.fc-button-next').click(function(){
            init_data(sku_id);
        });
        //今天
        $('.fc-button-today').click(function(){
            init_data(sku_id);
        });

    });
    //联系人个人信息提示框
    $('.tips-icon').hover(function(){
        var offLeft=$(this).prev('.con-name').width();
        $(this).next('.tips-list').css('left',offLeft).show();
    },function(){
        $(this).next('.tips-list').hide();
    });
    //全选
   $('#checkbt').click(function (e) {
       if ($(this).attr("checked")) {
         $("[class='checkbox']").attr("checked",'true');
       }else{
           $("[class='checkbox']").removeAttr("checked");
       }
   });
   $('.checkbox').click(function (e) {
       if ($(this).attr("checked")) {
         $(this).attr("checked",'true');
       }else{
           $(this).removeAttr("checked");
       }
   });
   //获取选中行
   function getChecked() {
        var checknum = 0;
        var str ='';
         $("[class='checkbox'][checked]").each(function (index) {
             str+=$(this).attr('data-id')+" ";
             checknum+=1;
         });
         return [str,checknum];
   }
   //点击”批量签名“按钮弹出事件
   $('#btnSign').click(function(){
       var arr = getChecked();
       if (arr[1] == 0) {
           layer.msg('请先选择订单');
           return;
       }
       $('.cnum').text(arr[1]);
       popfruit('batchSign');
   });
   $('#changeoffset').change(function (e) {
       // event handler
       var url = $(this).val();
       go(url);
   });

   $('#signConfirm').click(function(){
       var arr = getChecked();
       $.ajax({
           type: "get",
dataType : 'json',
           url : domain+"order/ajaxdatasign",
           data : {
               type : 'sign',
               ids : arr[0]
           },
           success: function(data) {
               if (data) {
                   if (data.status == 1) {
                       layer.msg('提交成功');
                       window.location.reload();
                       $('#batchSign').hide();
                   }else{
                       layer.msg(data.info);
                   }
               } else {
                   layer.msg('erro');
               }
           }
       });
   });

   $('#allotConfirm').click(function(){
       var arr = getChecked();
       var uid = $('#allotuid').val();
       $.ajax({
           type: "get",
dataType : 'json',
           url : domain+"order/allotOrder",
           data : {
               uid : uid,
               ids : arr[0]
           },
           success: function(data) {
               if (data) {
                   if (data.status == 1) {
                       layer.msg('提交成功');
                       window.location.reload();
                       $('#batchSign').hide();
                   }else{
                       layer.msg('操作失败');
                   }
               } else {
                   layer.msg('erro');
               }
           }
       });
   });
   //点击”分配订单“按钮弹出事件
   $('#btnAllot').click(function(){

       // window.location.reload();
       var arr = getChecked();
       if (arr[1] == 0) {
           layer.msg('请先选择订单');
           return;
       }
       var uid = $('#allotuid').val();
       $.ajax({
           type: "get",
dataType : 'json',
           url : domain+"order/allotOrder",
           data : {
               uid : uid,
               ids : arr[0]
           },
           success: function(data) {
               if (data) {
                   if (data.status == 1) {
                       layer.msg('提交成功');
                       window.location.reload();
                       $('#batchSign').hide();
                   }else{
                       layer.msg('操作失败');
                   }
               } else {
                   layer.msg('erro');
               }
           }
       });
       // $('.fnum').text(arr[1]);
       // popfruit('orderAllot');
   })
    function init_data(sku_id){
         $(".day_table").remove();
         var start_date = $('.fc-first td:first').attr('data-date');
         var end_date = $('.fc-last td:last').attr('data-date');
         // var toDay = $('.fc-todays').attr('data-date');
         var toDay = CurentTime();
         $.ajax({
             type: "get",
dataType : 'json',
             url : domain+"order/ajaxdata",
             data : {
                 sku_id : sku_id,
                 type : 'checkSkuStock',
                 start_date : start_date,
                 end_date : end_date
             },
             success: function(data) {
                 if (data.error_msg == 'OK') {
                     stock = data.stock;
                     $('.fc-day').each(function(){
                         var data_date = $(this).attr('data-date');
                         if($(this).hasClass('fc-first')){
                           $(this).find('.fc-day-number').parent().css('min-height','0px');
                         }
                         // alert(getTime(data_date))
                         if (typeof(stock) == 'object') {
                             if (stock.hasOwnProperty(data_date)) {
                                 if (stock[data_date]){
                                     if (stock[data_date] == 'uncontrollable') {
                                         $(this).append('<div class="day_table" data-stock="no" style="text-align:center">不可控库存</div><div>');
                                     }else if(stock[data_date] == 0){
                                         $(this).addClass('bg1');
                                         $(this).append('<div class="day_table" data-stock="'+stock[data_date]+'" style="text-align:center">剩余库存 : <strong style="color:red">'+stock[data_date]+'</strong></div><div>');
                                     }else if(stock[data_date] > 0){
                                         $(this).append('<div class="day_table" data-stock="'+stock[data_date]+'" style="text-align:center">剩余库存 : <strong>'+stock[data_date]+'</strong></div><div>');
                                     }else{
                                         $(this).append('<div class="day_table" data-stock="'+stock[data_date]+'" style="text-align:center">总库存 : <strong>'+stock[data_date]+'</strong></div><div>');
                                     }
                                 }
                             }
                         }else if(stock == 'uncontrollable'){
                             $(this).append('<div class="day_table" data-stock="no" style="text-align:center"></div><div>');
                         }
                         if (getTime(toDay) > getTime(data_date)) {
                             $(this).addClass('bg2');
                         }
                     });
                 }
             }
         });
    }



    $('#btn_add').click(function(){
        var from_source_details = $('#from_source_details').val();
        var from_source = $('#from_source').val();
        var mall_account = $('#mall_account').val();
        var tao_account = $('#tao_account').val();
        var adult_num = $('#adult_num').val();
        var children_num = $('#children_num').val();
        var num = $('#num').val();
        var baby_num = $('#baby_num').val();
        var add_why = $('#add_why').val();
        var add_remark = $('#add_remark').val();
        var price = $('#price').val();
        var adult_price = $('#adult_price').val();
        var child_price = $('#child_price').val();
        var payment = $('#payment').val();
        var sku_date = $('#sku_date').text();
        var sku_id = $('#sku_id').val();
        if (isNaN(num)) {
            layer.msg('数量必须是数字');return;
        }
        if (isNaN(adult_num)) {
            layer.msg('成人必须是数字');return;
        }
        if (isNaN(children_num)) {
            layer.msg('儿童必须是数字');return;
        }
        if (isNaN(price)) {
            layer.msg('必须是数字');return;
        }
        if (isNaN(adult_price)) {
            layer.msg('必须是数字');return;
        }
        if (add_remark == '') {
            layer.msg('详情不能为空');return;
        }
        if (tao_account == '' && mall_account == '') {
            layer.msg('账号必填');return;
        }
        if (from_source_details == '') {
            layer.msg('来源必填');return;
        }
        if (adult_num == '' && children_num =='' && baby_num == '' && num == '') {
            layer.msg('数量必填');return;
        }
        if (add_why == '') {
            layer.msg('添加原因必填');return;
        }
        if (payment == '') {
            layer.msg('实付金额必填');return;
        }
        if (price =='' && adult_num =='' && child_price == '') {
            layer.msg('单价必填');return;
        }
        if (sku_id == '' || sku_date == '') {
            layer.msg('sku不完整');return;
        }
        $.ajax({
            type: "post",
            dataType : 'json',
            url : domain+"order/addorder",
            data : {
                from_source_details : from_source_details,
                mall_account : mall_account,
                tao_account : tao_account,
                num : num,
                adult_num : adult_num,
                children_num : children_num,
                baby_num : baby_num,
                add_why : add_why,
                add_remark : add_remark,
                price : price,
                adult_num : adult_num,
                price : price,
                adult_price : adult_price,
                child_price : child_price,
                payment : payment,
                sku_date : sku_date,
                sku_id : sku_id,
                from_source : from_source
            },
            success: function(data) {

                if (data.status == 0) {
                   layer. msg(data.info);
                }else{
                   layer.alert(data.info);
                   $('#giPop').hide();
                   if (data.url != undefined) {
                       go(data.url);
                   }
                }
            }
        });
    });
    //库存弹出事件
    $('.sku-num').each(function(){
        var parentTd=$(this).parent('td');
        parentTd.css('cursor','pointer');
        var skuVal=$(this).text();
        if(skuVal=='0'){
            $(this).addClass('c-red');
            $(this).parent('td').addClass('bg-gray');
            //“库存为0”弹出事件
            parentTd.click(function(){
                popfruit('siPop');
            });
        }else if(skuVal=='cut_off'){
            $(this).addClass('c-red');
            $(this).parent('td').addClass('bg-gray');
            //“库存为cut off”弹出事件
            parentTd.click(function(){
                popfruit('giPop');
                $('#sku_date').text(parentTd.attr('data-date'));
                $('#sku_name').text(parentTd.attr('data-name'));
                $('#sku_id').val(parentTd.attr('data-id'));
                screening(parentTd.attr('data-id'));
                $('#from_source_details').val('');
                $('#mall_account').val('');
                $('#tao_account').val('');
                $('#adult_num').val('');
                $('#children_num').val('');
                $('#num').val('');
                $('#baby_num').val('');
                $('#add_why').val('');
                $('#add_remark').val('');
                $('#price').val('');
                $('#adult_price').val('');
                $('#child_price').val('');
                $('#payment').val('');
                $('.co-txt').show();
            });
        }else if(skuVal > 0){
            //“库存>0”弹出事件
            parentTd.click(function(){
                popfruit('giPop');
                $('#sku_date').text(parentTd.attr('data-date'));
                $('#sku_name').text(parentTd.attr('data-name'));
                $('#sku_id').val(parentTd.attr('data-id'));
                screening(parentTd.attr('data-id'));
                $('#from_source_details').val('');
                $('#mall_account').val('');
                $('#tao_account').val('');
                $('#adult_num').val('');
                $('#children_num').val('');
                $('#num').val('');
                $('#baby_num').val('');
                $('#add_why').val('');
                $('#add_remark').val('');
                $('#price').val('');
                $('#adult_price').val('');
                $('#child_price').val('');
                $('#payment').val('');
                $('.co-txt').hide();
            });
        }else if(skuVal == 'no value'){
            parentTd.click(function(){

             layer.msg('没有库存不可选');

            })


        }else{
            parentTd.click(function(){
                popfruit('giPop');
                $('#sku_date').text(parentTd.attr('data-date'));
                $('#sku_name').text(parentTd.attr('data-name'));
                $('#sku_id').val(parentTd.attr('data-id'));
                screening(parentTd.attr('data-id'));
                $('#from_source_details').val('');
                $('#mall_account').val('');
                $('#tao_account').val('');
                $('#adult_num').val('');
                $('#children_num').val('');
                $('#num').val('');
                $('#baby_num').val('');
                $('#add_why').val('');
                $('#add_remark').val('');
                $('#price').val('');
                $('#adult_price').val('');
                $('#child_price').val('');
                $('#payment').val('');
                $('.co-txt').hide();
            });

        }
    })

    $('#from_source').change(function (e) {
      var from_source =  $('#from_source').val();
      $.ajax({
          type: "get",
dataType : 'json',
          url : domain+"order/ajaxdata",
          data : {
              id : from_source,
              type : 'source'
          },
          success: function(data) {
                  $("#from_source_details").html(data.html);
          }
      });
    });

    $('#order_status').change(function (e) {
      var order_status =  $('#order_status').val();

      $.ajax({
          type: "get",
dataType : 'json',
          url : domain+"order/ajaxdata",
          data : {
              id : order_status,
              type : 'status_order'
          },
          success: function(data) {
                  $("#order_status_details").html(data.html);
          }
      });
    });
    $('#pay_status_fu').change(function (e) {
      var order_status =  $('#pay_status_fu').val();

      $.ajax({
          type: "get",
dataType : 'json',
          url : domain+"order/ajaxdata",
          data : {
              id : order_status,
              type : 'status_order'
          },
          success: function(data) {
                  $("#pay_status").html(data.html);
          }
      });
    });
    // initSWFJs();
    // initDatatable();
    function screening(sku_id){
      $.ajax({
          type: "get",
dataType : 'json',
          url : domain+"order/ajaxdata",
          data : {
              id : sku_id,
              type : 'sale_unit'
          },
          success: function(data) {
             if(data.type == 0){
                $('#xadult_num').hide();
                $('#xchildren_num').hide();
                $('#xbaby_num').hide();
                $('#xadult_price').hide();
                $('#xchild_price').hide();
                $('#xnum').show();
                $('#xprice').show();
             }else if(data.type == 1){
                $('#xnum').hide();
                $('#xprice').hide();
                if (data.adult == 0) {
                    $('#xadult_price').hide();
                    $('#xadult_num').hide();
                }else{
                    $('#xadult_price').show();
                    $('#xadult_num').show();
                }
                if (data.children == 0) {
                    $('#xchildren_num').hide();
                    $('#xchild_price').hide();
                }else{
                    $('#xchildren_num').show();
                    $('#xchild_price').show();
                }
                if (data.baby == 0) {
                    $('#xbaby_num').hide();
                }else{
                    $('#xbaby_num').show();
                }
             }
         }
      });
    }
    function flashChecker()
    {
        var hasFlash=0;         //是否安装了flash
        var flashVersion=0; //flash版本
        var isIE=/*@cc_on!@*/0;      //是否IE浏览器

        if(isIE)
            {
                var swf = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
                if(swf) {
                    hasFlash=1;
                    VSwf=swf.GetVariable("$version");
                    flashVersion=parseInt(VSwf.split(" ")[1].split(",")[0]);
                }
            }else{
                if (navigator.plugins && navigator.plugins.length > 0)
                    {
                        var swf=navigator.plugins["Shockwave Flash"];
                        if (swf)
                            {
                                hasFlash=1;
                                var words = swf.description.split(" ");
                                for (var i = 0; i < words.length; ++i)
                                {
                                    if (isNaN(parseInt(words[i]))) continue;
                                    flashVersion = parseInt(words[i]);
                                }
                            }
                    }
            }
            return {f:hasFlash,v:flashVersion};
    };

    function initDatatable()
    {
       $('#example').dataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "../resources/server_processing_custom.php"
        } );
    }

    function initSWFJs()
    {
        // var fls= flashChecker();
        // if(!fls.f){
            // if(confirm("您的浏览器不支持Flash,无法进行图片上传,是否安装?"))
                // {
                    // window.open("http://get2.adobe.com/cn/flashplayer/");
                // }
                // haveFlash = false;
                // return;
        // }
/*         if(fls.v < 9){ */
            // alert("您的浏览器Flash Player版本太低,无法进行图片上传操作,请更新Adobe Flash Player.");
            // haveFlash = false;
            // return;
        // }

        var queueNum =0;
        $('#file_uploadfa').uploadify({
            'auto' : true,
            'multi' : true,
            'removeCompleted' : true,
            'buttonClass' : 'uploadifyButton',
            'fileSizeLimit' : '5000KB',
            'fileTypeExts' : '*.jpg;*.jpeg;*.gif;*.png',
            "fileObjName"     : "download",
            'buttonText' : '开始上传',
            'width': 176,
            'height': 42,
            'swf'      : domain+'/assets/swf/uploadify.swf',
            'uploader' : domain+"PublicAction/uploadImage",
            'overrideEvents': ['onSelectError', 'onDialogClose'],
            'onSelectError': function (file, errorCode, errorMsg) {
                switch (errorCode) {
                    case -110:
                        alert("图片 [" + file.name + "] 大小超出系统限制的" + $('#file_uploadfa').uploadify('settings', 'fileSizeLimit') + "大小！");
                    break;
                }
                return false;
            },
            'onDialogClose'  : function(queueData) {
                queueNum += queueData.filesQueued;
                $('#file_upload-queue').show();
            },
            'onUploadStart' : function(file) {
                $('.p_photo').hide();
                $('#picSave').show();
                $('.fileName','#'+file.id).html('正在上传' + (file.index+1) + ' / ' + queueNum);
            },
            'onUploadSuccess' : function(file, data, response) {
                $('#'+file.id).hide();
                var imgData = eval('('+data+')');

                if (imgData && imgData.status  == 0) {
                    alert(imgData.info);
                }
                 addImage(imgData,file.id);

            },
            'onClearQueue' : function(queueItemCount){
                $('#file_upload-queue').hide();
            }
        });
    };

    function addImage(imgData,id) {
        if(!id || !imgData || !imgData.url)
            {
                alert("上传失败.请重新上传!");
                return;
            }
       var imghtml = '<img src="'+imgData.url+'"/>';
       $('.q_upload').html('');
       $('.q_upload').append(imghtml);


    }
    //打印数组
    function print_array(arr){
        for(var key in arr){
            if(typeof(arr[key])=='array'||typeof(arr[key])=='object'){//递归调用
                print_array(arr[key]);
            }else{
                alert(key + ' = ' + arr[key] + '<br>');
            }
        }
    };

    //打印对象
    function writeObj(obj){
        var description = "";
        for(var i in obj){
            var property=obj[i];
            description+=i+" = "+property+"\n";
        }
        alert(description);
    };

    function getTime(day){
      re = /(\d{4})(?:-(\d{1,2})(?:-(\d{1,2}))?)?(?:\s+(\d{1,2}):(\d{1,2}):(\d{1,2}))?/.exec(day);
      return new Date(re[1],(re[2]||1)-1,re[3]||1,re[4]||0,re[5]||0,re[6]||0).getTime();
    }
    //得到当前时间字符串，格式为：YYYY-MM-DD HH:MM:SS
    function CurentTime()
    {
        var now = new Date();

        var year = now.getFullYear();       //年
        var month = now.getMonth() + 1;     //月
        var day = now.getDate();            //日

        // var hh = now.getHours();            //时
        // var mm = now.getMinutes();          //分
        // var ss=now.getSeconds();      //秒

        var clock = year + "-";

        if(month < 10) clock += "0";
        clock += month + "-";

        if(day < 10) clock += "0";
        clock += day + " ";

        // if(hh < 10) clock += "0";
        // clock += hh + ":";

        // if (mm < 10) clock += '0';
        // clock += mm+ ":";

        // if (ss < 10) clock += '0';
        // clock += ss;

        return(clock);
    }
    function go(a) {
        window.location.href = a;
    };
})
