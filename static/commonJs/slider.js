function slider(div){
    function bindPrevNext(){
        var left = parseInt($(div+' ul').css('left').split('px')[0]);
       
        var screen = $(div).width();
            leftright();
            nav();
    /*    $('.slide ').on('click', '.nav', function(){
        })*/

        function leftright(){
            if($(div + ' ul li').length<=5){
                $('span#prevTop').addClass('hidden');
                $('span#nextTop').addClass('hidden');
            }
            left = parseInt($(div+' ul').css('left').split('px')[0]);
            if(left>=0){
                if(!$('span#prevTop').hasClass('disabled')){
                    $('span#prevTop').addClass('disabled');
                }
            }else{
                $('span#prevTop').removeClass('disabled');
            }
            var right = $("#coupon_content li.cp_wraper ").last().offset().left;
            var top = $("#coupon_content li.cp_wraper ").last().offset().top;
            var floor = $("#coupon_content").offset().top + $("#coupon_content li").height();
            if(right>=$('#picBox').offset().left&&right<($("#picBox").offset().left+$('#picBox').width())&&top<floor){
                if(!$('span#nextTop').hasClass('disabled')){
                    $('span#nextTop').addClass('disabled');
                }
            }else{
                $('span#nextTop').removeClass('disabled');
            }
        }

        function nav(){
            left = parseInt($(div+' ul').css('left').split('px')[0]);
            $('span#prevTop').on('click', function(){
                if(!$('span#prevTop').hasClass('disabled')){
                    left = parseInt($('#picBox ul').css('left').split('px')[0]);
                    animate(div+' ul', left, (left+screen));
                    //$('#picBox ul').css('left', (left+screen) + 'px');
                    leftright();
                }
            });
            $('span#nextTop').on('click', function(){
                if(!$('span#nextTop').hasClass('disabled')){
                    left = parseInt($('#picBox ul').css('left').split('px')[0]);
                    animate(div+' ul', left, left-screen);
                    //$('#picBox ul').css('left', (left-screen) + 'px');
                    leftright();
                }
            });
        }

        function animate(div, begin, stop){
            var time = 500;
            var offset =(stop-begin);
            var timer = setInterval(function(){
                $(div).css('left', begin+offset + 'px');
                begin = begin+offset;
                if(begin==stop){
                    clearInterval(timer);
                    leftright();
                }
            },30)
        }
        function bindQhover(){
            $('span.question').hover(function(){
                $(this).addClass('used');
                $(this).closest('li.cp_wraper').addClass('hover');
                var dist =  $(this).closest('li.cp_wraper').offset().left+97;
                //$('#picBox ul').css('left', (left-dist) + 'px');
                $(this).closest('li.cp_wraper').find('.cp_detail').css('width', 296);
                //$(this).closest('li.cp_wraper').find('.cp_detail').css('border-right-width', '1px');
            },function(){
                $(this).removeClass('used');
                var dist =  $(this).closest('li.cp_wraper').offset().left-100;
                 //$('#picBox ul').css('left', (left+dist) + 'px');
                 $(this).closest('li.cp_wraper').find('.cp_detail').css('width', 0);
                //$(this).closest('li.cp_wraper').find('.cp_detail').css('border-right-width', '0px');
            })
        }
        bindQhover();
    }
    bindSelectCoupon();
    bindPrevNext();
}