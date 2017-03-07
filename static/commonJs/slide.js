(function($){
    $.fn.ckSlide = function(opts){
        opts = $.extend({}, $.fn.ckSlide.opts, opts);
        this.each(function(){
            var slidewrap = $(this).find('.ck-slide-wrapper');
            var slide = slidewrap.find('.item');
            var count = slide.length;
            var that = this;
            var index = 0;
            var time = null;
            $(this).data('opts', opts);
            // next
            $(this).find(opts.next).on('click', function(){
                if(opts['isAnimate'] == true){
                    return;
                }
                if(opts.autoPlay){
                  clearInterval(time);
                }
                var old = index;
                if(index >= count - 1){
                    index = 0;
                }else{
                    index++;
                }
                change.call(that, index, old);
                if(opts.autoPlay){
                  startAtuoPlay();
                }
            });
            // prev
            $(this).find(opts.prev).on('click', function(){
                if(opts['isAnimate'] == true){
                    return;
                }
                if(opts.autoPlay){
                    clearInterval(time);
                }
                var old = index;
                if(index <= 0){
                    index = count - 1;
                }else{                                      
                    index--;
                }
                change.call(that, index, old);
                if(opts.autoPlay){
                  startAtuoPlay();
                }
            });
            $(this).find(opts.pageclassName).each(function(cindex){
                $(this).on('click.slidebox', function(){
                    if(opts.autoPlay){
                      clearInterval(time);
                    }
                    change.call(that, cindex, index);
                    index = cindex;
                    if(opts.autoPlay){
                      startAtuoPlay();
                    }
                });
            });
            
            // focus clean auto play
            $(this).on('mouseover', function(){
                if(opts.autoPlay){
                    clearInterval(time);
                }
                $(this).find('.ctrl-slide').css({opacity:0.6});
            });
            //  leave
            $(this).on('mouseleave', function(){
                if(opts.autoPlay){
                    startAtuoPlay();
                }
                $(this).find('.ctrl-slide').css({opacity:0.15});
            });
            startAtuoPlay();
            // auto play
            function startAtuoPlay(){
                if(opts.autoPlay){
                    time  = setInterval(function(){
                        var old = index;
                        if(index >= count - 1){
                            index = 0;
                        }else{
                            index++;
                        }
                        change.call(that, index, old);
                    }, opts.time);
                }
            }
            
            // 修正box
            var box = $(this).find('.ck-slidebox');
            box.css({
                //'margin-left':-(box.width() / 2)
            });
            // dir
            switch(opts.dir){
                case "x":
                    //opts['width'] = $(this).width();
                    slidewrap.css({
                        'width':count * opts['width']
                    });
                    slide.css({
                        //'float':'left',
                        'position':'relative'
                    });
                    slidewrap.wrap('<div class="ck-slide-dir"></div>');
                    slide.show();
                    break;
            }
        });
    };
    function change(show, hide){
      var opts = $(this).data('opts');
      if(opts.dir == 'x'){
          var x = show * opts['width'];
          $(this).find('.ck-slide-wrapper').stop().animate({'margin-left':-x},function(){opts['isAnimate'] = false;});
          opts['isAnimate'] = true;
      }else{
          //$(this).find('.ck-slide-wrapper .item').eq(hide).stop().animate({opacity:0},opts.pausetime);
          //$(this).find('.ck-slide-wrapper .item').eq(show).show().css({opacity:0}).stop().animate({opacity:1},opts.pausetime);
          $(this).find('.ck-slide-wrapper .item').eq(hide).fadeOut(opts.pausetime);
          $(this).find('.ck-slide-wrapper .item').eq(show).fadeIn(opts.pausetime);
      }
      $(this).find(opts.pageclassName).removeClass(opts.pagecurrent).eq(show).addClass(opts.pagecurrent);
  }
    $.fn.ckSlide.opts = {
        autoPlay: true,
        dir: null,
        isAnimate: false,
        time:5000,
        next:'.ck-next',
        prev:'.ck-prev',
        pausetime:2000,
        pagecurrent:'current',
        pageclassName:'.ck-slidebox span',
        width:387
    };
})(jQuery);