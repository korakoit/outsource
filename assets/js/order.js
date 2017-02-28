function setAdditional(obj) {
    var adult_num = $(obj).val();
    var additional_id = $(obj).attr('data-id');
    var sku_id = $(obj).attr('data-sku-id');
    var lastvalue = $(obj).attr('data-last-value');
    var id = $('#order_id').val();
    if(IsNum(adult_num) == false){
        layer.msg('请输入数字');
        $(obj).focus();return;
    }
    $.ajax({
        type: "POST",
dataType : 'json',
        url : domain+"/order/ajaxdata",
        data : {
            type : 'set_additional',
            additional_id : additional_id,
            sku_id : sku_id,
            lastvalue : lastvalue,
            id : id,
            num : adult_num
        },
        success: function(data) {
            if (data) {
                if (data.status == 1) {
                    window.location.reload();
                }else{
                    layer.msg('修改失败');
                }
            }else{
                layer.msg('出现错误');return;
            }
        }
    });

}
function putfocus(argument) {
    $('.bibi').removeClass('bibi');
    $(argument).parents('.user-list').addClass('bibi');
}
function send_good(id) {
     layer.confirm('确认发货吗？', {
         btn: ['是','否'] //按钮
     }, function(index){
         $.get(domain+'/order/send_good/'+id,{},function(html){
             html = eval('(' + html + ')');
             layer.msg(html.info);
         },'html');
     },function(index){
         layer.close(index);
         return;
     });
}
function select_tra(id,types) {
    $.ajax({
        type: "POST",
dataType : 'json',
        url : domain+"/order/ajaxdata",
        data : {
            type : 'select_tra',
            id : id,
            types : types
        },
        success: function(data) {
            $(".bibi #63").val("111");
            if (data) {
                if (data.status == 1) {
                    var obj = data.data;
                  for (var prop in obj) {
                      // alert(prop)
                      // alert(obj[prop])
                  }
                }else{
                    layer.msg('出现错误');return;
                }
            } else {
                layer.msg('出现错误');return;
            }
        }
    })
}
function uploadimg(argument) {
    if ($(argument).val().length > 0) {
        var id = $(argument).attr('id');
        layer.load();
        ajaxFileUpload(id);
    }else {
        alert("请选择图片");
    }
}
function ajaxFileUpload(id) {
    var name = $('#'+id).val();
    $.ajaxFileUpload
    (
        {
            url: domain+'/order/upload/'+id, //用于文件上传的服务器端请求地址
            secureuri: false, //一般设置为false
            fileElementId: id, //文件上传空间的id属性  <input type="file" id="file" name="file" />
            dataType: 'HTML', //返回值类型 一般设置为json
            success: function (data, status)  //服务器成功响应处理函数
            {
                layer.closeAll('loading');
                if(data != 1){
                    var html = "<label class='label' style='line-height:22px;margin-right:3px' ><a target='_blank' href='"+data+"'>"+name+"</a><span class='del_v'>x</span><input type='hidden'  name='"+id+"_list[]'  value='"+data+"'></label>";
                    $('.upload_list_'+id).append(html);
                }

            },
            error: function (data, status, e)//服务器响应失败处理函数
            {
                alert(e);
            }
        }
    )
    return false;
}
//校验
function IsNum(s)
{
    if (s!=null && s!="")
        {
            return !isNaN(s);
        }
        return false;
}
//选择酒店
function selectHotel(id) {
    $('#onselect').val(id);
    $.ajax({
        type: "POST",
dataType : 'json',
        url : domain+"/order/ajaxdata",
        data : {
            type : 'select_hotel',
            city_id : city_id
        },
        success: function(data) {
            if (data) {
                if (data.status == 1) {
                    popfruit('hotel');
                }else if(data.status == 2){
                   popfruit('addHotelPop');
                }
            } else {
                layer.msg('出现错误');return;
            }
        }
    });
}
function selectOne(id) {
    var onselect =  $('#onselect').val();
    var surcharge_select = $('#surcharge_select').val();
    var sku_id = $('#sku_id').val();
    var surcharge = $('#surcharge').val();
    var sale_unit_val = $('#sale_unit_val').val();
    var Buprice = $('#surBu').text();
    var add_why = $('#add_why').val();
    var val_select = $('#val_select').val();
    if (Buprice == '') {
        Buprice = 0;
    }
    var num = $('#1').val();
    var adult = $('#3').val();
    var child = $('#4').val();
    var baby = $('#6').val();
    $.ajax({
        type: "POST",
        dataType : 'json',
        url : domain+"/order/ajaxdata",
        data : {
            type : 'select_hotel',
            type_h : 'selectone',
            id    :  id,
            sku_id : sku_id,
            sale_unit_val : sale_unit_val
        },
        success: function(data) {
            if (data) {
                if (data.status == 1) {
                    if (data.sur) {
                        if (add_why != 2 && add_why != 3) {
                            if (data.sur.sale_unit_type === 0) {
                                var suprice = num*data.sur.price-Number(surcharge);
                                if(suprice < 0){
                                  suprice = 0;
                                }
                                if(!surcharge_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else if(onselect == val_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else{
                                    $('#surcharge_select').val(onselect);
                                    if (Number(Buprice) <= Number(suprice)) {
                                        $('#surBu').text(suprice.toFixed(2));
                                        $('#surBuval').val(suprice.toFixed(2));
                                        $('#val_select').val(onselect);
                                    }
                                }
                            }else if(data.sur.sale_unit_type == 1){
                                var suprice = adult*data.sur.price - Number(surcharge);
                                if(!surcharge_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else if(onselect == val_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else{
                                    $('#surcharge_select').val(onselect);
                                    if (Number(Buprice) <= Number(suprice)) {
                                        $('#surBu').text(suprice.toFixed(2));
                                        $('#surBuval').val(suprice.toFixed(2));
                                        $('#val_select').val(onselect);
                                    }
                                }
                            }else if(data.sur.sale_unit_type == 2){
                                var suprice = (adult*data.sur.price)+(child*data.sur.price)- Number(surcharge);
                                if(suprice < 0){
                                  suprice = 0;
                                }
                                if(!surcharge_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else if(onselect == val_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else{
                                    $('#surcharge_select').val(onselect);
                                    if (Number(Buprice) <= Number(suprice)) {
                                        $('#surBu').text(suprice.toFixed(2));
                                        $('#surBuval').val(suprice.toFixed(2));
                                        $('#val_select').val(onselect);
                                    }
                                }
                            }else if(data.sur.sale_unit_type == 4){
                                var suprice = (adult*data.sur.price)+(child*data.sur.price)+(baby*data.sur.price)- Number(surcharge);
                                if(suprice < 0){
                                  suprice = 0;
                                }
                                if(!surcharge_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else if(onselect == val_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else{
                                    $('#surcharge_select').val(onselect);
                                    if (Number(Buprice) <= Number(suprice)) {
                                        $('#surBu').text(suprice.toFixed(2));
                                        $('#surBuval').val(suprice.toFixed(2));
                                        $('#val_select').val(onselect);
                                    }
                                }
                            }else if(data.sur.sale_unit_type == 3){
                                var suprice = child*data.sur.price-Number(surcharge);
                                if(suprice < 0){
                                  suprice = 0;
                                }
                                if(!surcharge_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else if(onselect == val_select){
                                    $('#surcharge_select').val(onselect);
                                    $('#surBu').text(suprice.toFixed(2));
                                    $('#surBuval').val(suprice.toFixed(2));
                                    $('#val_select').val(onselect);
                                }else{
                                    $('#surcharge_select').val(onselect);
                                    if (Number(Buprice) <= Number(suprice)) {
                                        $('#surBu').text(suprice.toFixed(2));
                                        $('#surBuval').val(suprice.toFixed(2));
                                        $('#val_select').val(onselect);
                                    }
                                }
                            }else{
                               layer.msg('售卖单位错误');
                            }
                        }else{
                           layer.msg('赔付不需要补差');
                        }
                        $('#buttomBu').show();
                    }else{
                        layer.msg('不能接送'); return;
                    }
                    if (onselect == 32) {
                        $('#26_a').val(data.sur.begin_time);
                        $('#26_b').val(data.sur.end_time);
                        $('#32').val(data.hotel_engname);
                        $('#35').val(data.tel);
                        $('#37').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 39) {
                        $('#39').val(data.hotel_engname);
                        $('#41').val(data.tel);
                        $('#42').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 43) {
                        $('#43').val(data.hotel_engname);
                        $('#44').val(data.tel);
                        $('#45').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 56) {
                        $('#56').val(data.hotel_engname);
                        $('#57').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 58) {
                        $('#58').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 59) {
                        $('#59').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 60) {
                        $('#60').val(data.hotel_engname);
                        $('#61').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 46) {
                        $('#46').val(data.hotel_engname);
                        $('#47').val(data.tel);
                        $('#48').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    // if (onselect == 102) {
                        // $('#102').val(data.hotel_engname);
                        // $('#99').val(data.tel);
                        // $('#48').val(data.address);
                        // $('#hotel_'+onselect).val(data.id);
                    // }
                    if (onselect == 164) {
                        $('#164').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 198) {
                        $('#198').val(data.hotel_engname);
                        $('#199').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 196) {
                        $('#196').val(data.hotel_engname);
                        $('#197').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 194) {
                        $('#194').val(data.hotel_engname);
                        $('#195').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 107) {
                        $('#107').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 105) {
                        $('#105').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 104) {
                        $('#104').val(data.hotel_engname);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 102) {
                        $('#102').val(data.hotel_engname);
                        $('#103').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 106) {
                        $('#106').val(data.hotel_engname);
                        $('#99').val(data.tel);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 238) {
                        $('#238').val(data.hotel_engname);
                        $('#240').val(data.tel);
                        $('#239').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 241) {
                        $('#241').val(data.hotel_engname);
                        $('#243').val(data.tel);
                        $('#242').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 225) {
                        $('#225').val(data.hotel_engname);
                        $('#226').val(data.tel);
                        $('#227').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 228) {
                        $('#228').val(data.hotel_engname);
                        $('#229').val(data.tel);
                        $('#230').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 231) {
                        $('#231').val(data.hotel_engname);
                        $('#232').val(data.tel);
                        $('#233').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 234) {
                        $('#234').val(data.hotel_engname);
                        $('#235').val(data.tel);
                        $('#236').val(data.address);
                        $('#hotel_'+onselect).val(data.id);
                    }

                    $('#hotel').hide();
                }else if(data.status == 2){

                }
            } else {
                layer.msg('出现错误');return;
            }
        }
    });
}
$(function () {
    $('#no_hotel').click(function (e) {
        // eventobj handler
        popfruit('addHotelPop');
        $('#hotel').hide();
    });
    $('#load_order').click(function (e) {
        // event handler
        var id = $('#order_id').val();
        var url = domain+"/api/confirmation/download_jpg/"+id;
        layer.load();
        $.ajax({
            type: "POST",
dataType : 'json',
            url : url,
            data : {},
            success: function(data) {
                layer.closeAll('loading');
                if(data){
                    if(data.status == 1){
                        window.location.href = data.attachment;
                    }else{
                        layer.msg('导出失败');
                    }
                }else{
                    layer.msg('导出失败');
                }
            }
        })
    });
    $('#addHotelButton').click(function (e) {
        var onselect =  $('#onselect').val();
        var surcharge_select = $('#surcharge_select').val();
        var val_select = $('#val_select').val();
        var Buprice = $('#surBu').text();
        var hotel_name = $('#hotel_name').val();
        var hotel_phone = $('#hotel_phone').val();
        var hotel_add = $('#hotel_add').val();
        var city_id = $('#city_id').val();
        if (hotel_name == '' || hotel_phone == '' || hotel_add == '' || city_id == '') {
            layer.msg('有值没填'); return;
        }
        if (Buprice == '') {
            Buprice = 0;
        }
        $.ajax({
            type: "POST",
dataType : 'json',
            url : domain+"/order/ajaxdata",
            data : {
                type : 'select_hotel',
                city_id : city_id,
                hotel_engname : hotel_name,
                type_h : 'add',
                tel : hotel_phone,
                address : hotel_add
            },
            success: function(data) {
                if (data) {
                    if (data.status == 1) {
                        var suprice = 0;
                        if(!surcharge_select){
                            $('#surcharge_select').val(onselect);
                            $('#surBu').text(0);
                            $('#surBuval').val(0);
                            $('#val_select').val(onselect);
                        }else if(onselect == val_select){
                            $('#surcharge_select').val(onselect);
                            $('#surBu').text(0);
                            $('#surBuval').val(0);
                            $('#val_select').val(onselect);
                        }else{
                            $('#surcharge_select').val(onselect);
                            if (Number(Buprice) <= Number(suprice)) {
                                $('#surBu').text(0);
                                $('#surBuval').val(0);
                                $('#val_select').val(onselect);
                            }
                        }
                        if (onselect == 32) {
                            $('#32').val(hotel_name);
                            $('#35').val(hotel_phone);
                            $('#37').val(hotel_add);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 39) {
                            $('#39').val(hotel_name);
                            $('#41').val(hotel_phone);
                            $('#42').val(hotel_add);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 43) {
                            $('#43').val(hotel_name);
                            $('#44').val(hotel_phone);
                            $('#45').val(hotel_add);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 56) {
                            $('#56').val(hotel_name);
                            $('#57').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 58) {
                            $('#58').val(hotel_name);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 59) {
                            $('#59').val(hotel_name);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 60) {
                            $('#60').val(hotel_name);
                            $('#61').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }
                        if (onselect == 46) {
                            $('#46').val(hotel_name);
                            $('#47').val(hotel_phone);
                            $('#48').val(hotel_add);
                            $('#hotel_'+onselect).val(data.id);
                            $('#addHotelPop').hide();
                        }

                        if (onselect == 198) {
                            $('#198').val(hotel_name);
                            $('#199').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 196) {
                            $('#196').val(hotel_name);
                            $('#197').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 194) {
                            $('#194').val(hotel_name);
                            $('#195').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 107) {
                            $('#107').val(hotel_name);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 105) {
                            $('#105').val(hotel_name);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 104) {
                            $('#104').val(hotel_name);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 102) {
                            $('#102').val(hotel_name);
                            $('#103').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                        }
                        if (onselect == 106) {
                            $('#106').val(hotel_name);
                            $('#99').val(hotel_phone);
                            $('#hotel_'+onselect).val(data.id);
                        }
                    if (onselect == 238) {
                        $('#238').val(hotel_name);
                        $('#240').val(hotel_phone);
                        $('#239').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 241) {
                        $('#241').val(hotel_name);
                        $('#243').val(hotel_phone);
                        $('#242').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 225) {
                        $('#225').val(hotel_name);
                        $('#226').val(hotel_phone);
                        $('#227').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 228) {
                        $('#228').val(hotel_name);
                        $('#229').val(hotel_phone);
                        $('#230').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 231) {
                        $('#231').val(hotel_name);
                        $('#232').val(hotel_phone);
                        $('#233').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }
                    if (onselect == 234) {
                        $('#234').val(hotel_name);
                        $('#235').val(hotel_phone);
                        $('#236').val(hotel_add);
                        $('#hotel_'+onselect).val(data.id);
                    }

                    }else{
                        layer.msg('添加失败');
                    }
                } else {
                    layer.msg('erro');
                }
            }
        });
    });
    $('#search_name').bind('input propertychange', function() {
        var city_id = $('#city_id').val();
        var search_name = $('#search_name').val();
        if (search_name != '') {
            $.ajax({
                type: "POST",
dataType : 'json',
                url : domain+"/order/ajaxdata",
                data : {
                    type : 'select_hotel',
                    city_id : city_id,
                    type_h : 'select',
                    hotel_engname : search_name
                },
                success: function(data) {
                    if (data) {
                        if (data.status == 1) {
                            $('#hotelResults').html(data.html);
                        }else{
                            $('#hotelResults').html('');
                            layer.msg('没有酒店');
                        }
                    } else {
                            layer.msg('erro');
                    }
                }
            });
        }
      });
  $('#form1').submit(function (e) {
      $('.btn-form').hide();
      e.preventDefault();
      // var surcharge = $('#surcharge').val();
      // var surchargeAll = $('#surBu').text();
      // if ( Number(surcharge) < Number(surchargeAll)) {
           // layer.msg('附加费不对');
           // return;
      // }
      var is_update = $('#is_update').val();
      if(is_update == 'no'){
          return;
      }
      $.post(domain+"/order/orderUpdate",
             $(this).serialize(),
             function(response){
                 if(response.status==0){
                     layer.msg(response.info);
                     $('.btn-form').show();
                 }else{
                     layer.msg(response.info);
                     window.location.reload();
                     // layer.alert(response.info,function(index){
                          // layer.close(index);
                     // });
                 }
             });
  });
  $('#unsubscribe').click(function (e) {
      // event handler
      layer.confirm('确定退订订单吗？', {
          btn: ['是','否'] //按钮
      }, function(index){
          var id = $('#order_id').val();
          var order_status = $('#order_status').val();
          $.ajax({
              type: "POST",
dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'unsubscribe',
                  id : id,
                  order_status : order_status
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          // layer.alert(data.info,function(index){
                              layer.msg(data.info);
                              window.location.reload();
                              // layer.close(index);
                          // });
                      }else{
                          layer.msg(data.info);
                      }
                  } else {
                      layer.msg('erro');
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });
  });
  $('#cancel_unsubscribe').click(function (e) {
      // event handler
      layer.confirm('确定取消退订订单吗？', {
          btn: ['是','否'] //按钮
      }, function(index){
          var id = $('#order_id').val();
          var order_status = $('#order_status').val();
          $.ajax({
              type: "POST",
dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'nounsubscribe',
                  id : id,
                  order_status : order_status
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          layer.alert(data.info,function(index){
                              window.location.reload();
                              layer.close(index);
                          });
                      }else{
                          layer.msg(data.info);
                      }
                  } else {
                      layer.msg('erro');
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });
  });

  $('#verify').click(function (e) {
      // event handler
      var editor_type = $('#editor_type').val();
      $('form input,form select').each(function (e) {
         var name =  $(this).attr('name');
              $(this).removeAttr('disabled');
      });
      if (editor_type == 3 || editor_type == 5 || editor_type == 4 ) {
         $('[name=2]').attr('readonly','readonly');
         $('[data_id=5]').attr('readonly','readonly');
      }

      // layer.confirm('确认审核通过吗？', {
          // btn: ['是','否'] //按钮
      // }, function(index){
      $.post(domain+"/order/orderUpdate",
             $('#form1').serialize(),
             function(response){
                 if(response.status==0){
                     layer.msg(response.info);
                     return;
                 }else{
                     var id = $('#order_id').val();
                     var order_status = $('#order_status').val();
                     $.ajax({
                         type: "POST",
                         dataType : 'json',
                         url : domain+"/order/ajaxdataverify",
                         data : {
                             type : 'verify',
                             id : id,
                             order_status : order_status
                         },
                         success: function(data) {
                             if (data) {
                                 if (data.status == 1) {
                                     layer.msg(data.info);
                                     // layer.alert(data.info,function(index){
                                     window.location.reload();
                                     // layer.close(index);
                                     // });
                                 }else{
                                     layer.msg(data.info);
                                 }
                             } else {
                                 layer.msg('erro');
                             }
                         }
                     });
                 }
             })
      // },function(index){
          // layer.close(index);
          // return;
      // });
  });

  $('#modify_audit').click(function (e) {
      // event handler

      var editor_type = $('#editor_type').val();
      $('form input,form select').each(function (e) {
         var name =  $(this).attr('name');
              $(this).removeAttr('disabled');
      });
      if (editor_type == 3 || editor_type == 5 || editor_type == 4 ) {
         $('[name=2]').attr('readonly','readonly');
         $('[data_id=5]').attr('readonly','readonly');
      }
      layer.confirm('确认审核通过吗？', {
          btn: ['是','否'] //按钮
      }, function(index){
          $.post(domain+"/order/orderUpdate",
                 $('#form1').serialize(),
                 function(response){
                     if(response.status==0){
                         layer.msg(response.info);
                         return;
                     }else{
                         var id = $('#order_id').val();
                         var order_status = $('#order_status').val();
                         $.ajax({
                             type: "POST",
                             dataType : 'json',
                             url : domain+"/order/ajaxdatamodify_audit",
                             data : {
                                 id : id,
                                 order_status : order_status
                             },
                             success: function(data) {
                                 if (data) {
                                     if (data.status == 1) {
                                           layer.msg(data.info);
                                         // layer.alert(data.info,function(index){
                                             window.location.reload();
                                             // layer.close(index);
                                         // });
                                     }else{
                                         layer.msg(data.info);
                                     }
                                 } else {
                                     layer.msg('erro');
                                 }
                             }
                         });
                     }
                 });
      },function(index){
          layer.close(index);
          return;
      });
  });

  $('#merge').click(function (e) {
      // event handler
      popfruit('mergePop');
      $('#mergePop table tbody').remove('.merge_tr');
      var id = $('#order_id').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
          dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'mergePop',
              id : id,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#mergePop table tbody tr.merge_tr').remove();
                      $('#mergePop table tbody').append(data.html);
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#additional').click(function (e) {
      // event handler
      popfruit('addPop');
      $('#addPop table tbody').remove('.additional_tr');
      var id = $('#order_id').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
          dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'additionalPop',
              id : id,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#addPop table tbody tr.additional_tr').remove();
                      $('#addPop table tbody').append(data.html);
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#modify').click(function (e) {
      var editor_type = $('#editor_type').val();
      $('form input,form select').each(function (e) {
         var name =  $(this).attr('name');
              $(this).removeAttr('disabled');
      });
      $('#is_update').val('ok');
      if (editor_type == 3 || editor_type == 5 || editor_type == 4 ) {
         $('[name=2]').attr('readonly','readonly');
         $('[data_id=5]').attr('readonly','readonly');
      }
  });
  $('#btnSignitems').click(function (e) {
      $('#btnSignitems').hide();
      var id = $('#order_id').val();
       $.ajax({
           type: "get",
           dataType : 'json',
           url : domain+"order/ajaxdatasign",
           data : {
               type : 'sign',
               ids : id
           },
           success: function(data) {
               if (data) {
                   if (data.status == 1) {
                       layer.msg('提交成功');
                       window.location.reload();
                   }else{
                       layer.msg(data.info);
                   }
               } else {
                   layer.msg('erro');
               }
           }
       });
  });

  $('#btn-bc').click(function (e) {
      // event handler
      var surBu = $('#surBu').text();
      // if (Number(surBu) === 0) {
          // layer.msg('不需要补差');
          // return;
      // }
      popfruit('bcPop');
      $('#bcPop table tbody').remove('.bc_tr');
      var id = $('#order_id').val();
      var bc_taobao = $('#bc_taobao').val();
      var bc_mall = $('#bc_mall').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'bcPop',
              id : id,
              // bc_taobao : bc_taobao,
              // bc_mall :  bc_mall,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#bcPop table tbody tr.bc_tr').remove();
                      $('#bcPop table tbody').append(data.html);
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#bc_button').live('click',function (e) {
      // event handler
      var attach_id = $(this).attr('data_id');
      layer.confirm('确认合并到当前订单吗？合并后不可撤销！请谨慎操作！', {
          btn: ['是','否'] //按钮
      }, function(index){
          $('#btn-bc_button').hide();
          var id = $('#order_id').val();
          var surval = $('#surBu').text();
          var surcharge = $('#surcharge').val();
          var val =  Number(surval);
          // if(val < 0){
             // layer.msg('不需要合并补差');
             // layer.close(index);
            // $('#bcPop').hide();
             // return;
          // }
          $.ajax({
              type: "POST",
              dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'surcharge',
                  id : id,
                  attach_id : attach_id,
                  surcharge_amount : val
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          $('#bcPop').hide();
                          $('#surBu').text('');
                          $('#surBuval').val('0');
                          $('#surcharge_show').text(Number(surcharge)+Number(val));
                          $('#surcharge').val(Number(surcharge)+Number(val));
                          window.location.reload();
                          layer.close(index);
                      }else{
                          layer.msg(data.info);
                          window.location.reload();
                          layer.close(index);
                      }
                  } else {
                      layer.msg('erro');
                      window.location.reload();
                      layer.close(index);
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });

  });
  $('#select_tra').live('click', function (e) {
      // event handler
      var id=$(this).attr('data-id');
      var types = $(this).attr('data-type');
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'select_tra',
              id : id,
              types : types
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      var obj = data.data;
                      for (var prop in obj) {
                          $(".bibi input[data='"+prop+"']").val(obj[prop]);
                          // alert(prop)
                          // alert(obj[prop])
                      }
                  }else{
                      layer.msg('出现错误');return;
                  }
              } else {
                  layer.msg('出现错误');return;
              }
          }
      })

  });

  $('#merge_button').live('click',function (e) {
      // event handler
      var merge_id = $(this).attr('data_id');
      var update_time = $('#update_time').val();
      layer.confirm('确认合并到当前订单吗？合并后不可撤销！请谨慎操作！', {
          btn: ['是','否'] //按钮
      }, function(index){
          var id = $('#order_id').val();
          $.ajax({
              type: "POST",
dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'merge',
                  id : id,
                  merge_id : merge_id,
                  update_time : update_time
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          // layer.msg(data.info);
                          window.location.reload();
                      }else{
                          layer.msg(data.info);
                          // window.location.reload();
                      }
                  } else {
                      layer.msg('erro');
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });

  });
  $('#quick-send').live('click',function (e) {
      // event handler
      layer.confirm('确定给用户重新发函吗?', {
          btn: ['是','否'] //按钮
      }, function(index){
          var id = $('#order_id').val();
          $.ajax({
              type: "POST",
dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'quick-send',
                  id : id
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          layer.msg(data.info);
                          window.location.reload();
                      }else{
                          layer.msg(data.info);
                      }
                  } else {
                      layer.msg('erro');
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });

  });

  $('#additional_button').live('click',function (e) {
      // event handler
      var additional_id = $(this).attr('data_id');
      var update_time = $('#update_time').val();
      layer.confirm('确认合并到当前订单吗？合并后不可撤销！请谨慎操作！', {
          btn: ['是','否'] //按钮
      }, function(index){
          var id = $('#order_id').val();
          $.ajax({
              type: "POST",
dataType : 'json',
              url : domain+"/order/ajaxdata",
              data : {
                  type : 'additional',
                  id : id,
                  additional_id : additional_id,
                  update_time :update_time
              },
              success: function(data) {
                  if (data) {
                      if (data.status == 1) {
                          $('#addPop').hide();
                          layer.msg(data.info);
                          window.location.reload();
                      }else{
                          layer.msg(data.info);
                      }
                  } else {
                      layer.msg('erro');
                  }
              }
          });
      },function(index){
          layer.close(index);
          return;
      });

  });
  $('#bc_search').click(function (e) {
      // event handler
      var id = $('#order_id').val();
      var bc_taobao = $('#bc_taobao').val();
      var bc_mall = $('#bc_mall').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
          dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'bcPop',
              id : id,
              bc_taobao : bc_taobao,
              bc_mall :  bc_mall,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#bcPop table tbody tr').remove('.bc_tr');
                      $('#bcPop table tbody').append(data.html);
                  }else{
                     layer.msg('此账号没补差');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#merge_search').click(function (e) {
      // event handler
      var id = $('#order_id').val();
      var merge_taobao = $('#merge_taobao').val();
      var merge_mall = $('#merge_mall').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'mergePop',
              id : id,
              merge_taobao : merge_taobao,
              merge_mall :  merge_mall,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#mergePop table tbody tr').remove('.merge_tr');
                      $('#mergePop table tbody').append(data.html);
                  }else{
                     layer.msg('此账号没可合并的订单');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#additional_search').click(function (e) {
      // event handler
      var id = $('#order_id').val();
      var additional_taobao = $('#additional_taobao').val();
      var additional_mall = $('#additional_mall').val();
      var source = $('#source').val();
      if (source == 3 || source == 4 ) {
          var form = 'tmall';
      }else{
          var form = 'shop';
      }
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'additionalPop',
              id : id,
              additional_taobao : additional_taobao,
              additional_mall :  additional_mall,
              source : form
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      $('#addPop table tbody tr').remove('.additional_tr');
                      $('#addPop table tbody').append(data.html);
                  }else{
                     layer.msg('此账号没可合并的订单');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });

  $('#format').change(function (e) {
      var sku_id = $('#format').val();
      var id = $('#order_id').val();
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'changeFormat',
              id : id,
              sku_id : sku_id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
  });
  //添加异常
 $('#unusualButton').click(function (e) {
     // event handler
     var unusualtext = $('#unusualtext').val();
     var id = $('#order_id').val();
     if(unusualtext == ''){
       layer.msg('异常原因不能为空');
       return;
     }
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'unusual',
              id : id,
              unusualtext : unusualtext
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });

 });

  //添加加急
 $('#urgentButton').click(function (e) {
     // event handler
     var id = $('#order_id').val();
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'urgent',
              id : id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });

 });

  //添加占位
 $('#occupyingButton').click(function (e) {
     // event handler
     var id = $('#order_id').val();
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'occupying',
              id : id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });

 });

  //添加测试
 $('#testButton').click(function (e) {
     // event handler
     var id = $('#order_id').val();
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'test',
              id : id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
 });
  //添加关闭
 $('#guanButton').click(function (e) {
     // event handler
     var id = $('#order_id').val();
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'guan',
              id : id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                      window.location.reload();
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
 });

 $(".ajax").live("click",function(e){
     e.preventDefault();
     var a 	= $(this);
     var url = a.attr("href");
     var id  = a.attr("id");
     $.get(url,{is_show_page:1},function(html){
         if(id == 'afterlist'){
             $("#afterListC").html(html);
         }else if(id == 'afteremark'){
             $("#tab").html(html);
         }else if(id == 'afterrefund'){
             $("#afterRefundC").html(html);
         }else if(id=='alter-simple'){
             $("#solveModal").modal({
                 keyboard: false
             });
             $("#solveModal").html('');
             $("#solveModal").html(html);
         }
         return;
     },'html');
 });

 //select表单
 $('#tag-item').change(function (e) {
     var id = $('#order_id').val();
     var selVal=$(this).val();
     if(selVal==1){
         popfruit('unusualPop');
     }else if(selVal==2){
         popfruit('urgentPop');
     }else if(selVal==3){
         popfruit('occupyingPop');
     }else if(selVal==4){
         var url = domain+'/after/after_sale/alterAddsimple/'+id+'?from=order';
         $.get(url,{},function(html){
             $("#solveModal").modal({
                 keyboard: false
             });
             $("#solveModal").html('');
             $("#solveModal").html(html);
             return;
         },'html');
     }else if(selVal==5){
         var url = domain+'/after/after_refund/alterAddsimple/'+id+'?from=order';
         $.get(url,{},function(html){
             $("#solveModal").modal({
                 keyboard: false
             });
             $("#solveModal").html('');
             $("#solveModal").html(html);
             return;
         },'html');
     }else if(selVal==6){
         popfruit('testPop');
     }else if(selVal==7){
         popfruit('guanPop');
     }
 });
 //发货
 $('.send_good').click(function (e) {
     layer.confirm('确认发货吗？', {
         btn: ['是','否'] //按钮
     }, function(index){
         var id = $(this).attr('data-id');
         $.get(domain+'/order/send_good/'+id,{},function(html){
             html = eval('(' + html + ')');
             layer.msg(html.info);
         },'html');
     },function(index){
         layer.close(index);
         return;
     });
 });
 //删除出行人信息
 $('.delc').click(function (e) {
     // event handler
     $(this).parents('.user-list').remove();
 });
 //删除司机信息
 $('.delct').click(function (e) {
     // event handler
     $(this).parents('.user-list').remove();
 });
   $('.del_v').live("click",function(e){
     // event handler
     $(this).parents('.label').remove();

 });
  $('#btnSys').live('click',function (e) {
      // event handler
      layer.prompt({
         title: '输入淘宝订单编号',
         formType: 2
        },function(pass){
            if(IsNum(pass)){
                $.ajax({
                    type: "POST",
dataType : 'json',
                    url : domain+"/order/ajaxdata",
                    data : {
                        type : 'importmall',
                        tid : pass
                    },
                    success: function(data) {
                        if (data) {
                            if (data.status == 1) {
                                layer.msg(data.info);
                                window.location.reload();
                            }else{
                                layer.msg(data.info);
                            }
                        } else {
                            layer.msg('erro');
                        }
                    }
                });
            }else{
                layer.msg('必须为数字');
            }
        });
  });
 //标签删除
 $('.tag_del').click(function (e) {
     // event handler
     $(this).parents('.label').remove();
     var id = $('#order_id').val();
     var tagid = $(this).attr('data-id');
      $.ajax({
          type: "POST",
dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'tag_del',
              id : id,
              tagid : tagid
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                     layer.msg('删除成功');
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
 });
 //同步联系人
 $('#synchronous').click(function (e) {
     // event handler
     var id = $('#order_id').val();
      $.ajax({
          type: "POST",
          dataType : 'json',
          url : domain+"/order/ajaxdata",
          data : {
              type : 'synchronous',
              id : id
          },
          success: function(data) {
              if (data) {
                  if (data.status == 1) {
                     layer.msg('同步成功');
                  }else{
                     layer.msg('操作失败');
                  }
              } else {
                  layer.msg('erro');
              }
          }
      });
 });

})

