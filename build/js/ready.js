/*------------------------------*\

    #READY

\*------------------------------*/


var FOO = {
    common: {
        init: function() {    
            global_share();
            nav();

            if( $('body').hasClass('touch') ) {
                isMobile = true;
            }

            setTimeout(function(){
                $('.load').fadeOut(200, function(){
                    $('.load').remove();
                });
                $('body').removeClass('is-loading');
                $('.wrap-resume').addClass('animated bounceInUp');
            }, 1000);
        }
    },
    page_template_page_bd: {
        init: function() {
            isBD = true;
            init_share();
            pos_share();
            pos_bd();
            lazy();
            waypoints();
        }
    }
    
};

var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = FOO;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
          namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire('common');
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
          UTIL.fire(classnm);
        });
    }
};

$(document).ready(UTIL.loadEvents);




