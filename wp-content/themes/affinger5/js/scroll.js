(function(a){a(function(){var d=a("main");var g=a("#side aside");var e=a("#scrollad");if(d.length===0||g.length===0||e.length===0){return}var c=a(window);var b=function(){var k;var m;var l;k=a("<div />").css({visibility:"hidden"});e.before(k);m=k.offset().top;l={top:m,bottom:m+e.outerHeight()};k.remove();return l};var j=function(){if(window.matchMedia&&window.matchMedia("screen and (min-width: 960px)").matches){return true}return false};var f=function(m){var k=g.outerWidth();var l=g.offset().left;m=m||0;e.css({position:"fixed",width:k,top:m,left:l,margi:0});g.addClass("is-fixed")};var h=function(){e.css({position:"static",width:"",top:"",left:"",margin:""});g.removeClass("is-fixed")};var i=function(){var k=c.scrollTop();var l=b();var n=d.offset().top+d.outerHeight();var p=(k>l.top)&&(l.bottom<n);var m;var o;if(j()&&p){m=n-e.outerHeight();o=(k<m)?0:(m-k);f(o)}else{h()}};c.on("load",function(){i();setTimeout(function(){i()},1000)});c.on("scroll",function(){i()});c.on("resize",function(){i()})})})(jQuery);