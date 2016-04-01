(function(){
 
    var special = jQuery.event.special,
        uid1 = 'D' + (+new Date()),
        uid2 = 'D' + (+new Date() + 1);
 
    special.scrollstart = {
        setup: function() {
 
            var timer,
                handler =  function(evt) {
 
                    var _self = this,
                        _args = arguments;
 
                    if (timer) {
                        clearTimeout(timer);
                    } else {
                        evt.type = 'scrollstart';
                        jQuery.event.handle.apply(_self, _args);
                    }
 
                    timer = setTimeout( function(){
                        timer = null;
                    }, special.scrollstop.latency);
 
                };
 
            jQuery(this).bind('scroll', handler).data(uid1, handler);
 
        },
        teardown: function(){
            jQuery(this).unbind( 'scroll', jQuery(this).data(uid1) );
        }
    };
 
    special.scrollstop = {
        latency: 300,
        setup: function() {
 
            var timer,
                    handler = function(evt) {
 
                    var _self = this,
                        _args = arguments;
 
                    if (timer) {
                        clearTimeout(timer);
                    }
 
                    timer = setTimeout( function(){
 
                        timer = null;
                        evt.type = 'scrollstop';
                        jQuery.event.handle.apply(_self, _args);
 
                    }, special.scrollstop.latency);
 
                };
 
            jQuery(this).bind('scroll', handler).data(uid2, handler);
 
        },
        teardown: function() {
            jQuery(this).unbind( 'scroll', jQuery(this).data(uid2) );
        }
    };
 
})();

(function($) {      
    $.fn.scrollSnap = function(snapInterval) {
        var mousedown = false;

        function nearestInterval(n, iv) {
            return Math.round(n / iv) * iv;
        }

        function snapToInterval() {
            if(mousedown) {
                $(window).one("mouseup", snapToInterval);
            } else {
                var $this = $(this),
                    snapLeft = nearestInterval($this.scrollLeft(), snapInterval);

                $(this).animate({scrollLeft: snapLeft});
            }
        }

        $(window).mousedown(function() { mousedown = true });
        $(window).mouseup(function() { mousedown = false });

        this.each(function() {
            $(this).bind("scrollstop", snapToInterval);
        });
    }
})(jQuery);