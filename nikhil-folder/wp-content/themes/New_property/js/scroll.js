(function(a,b,c){a.fn.jScrollPane=function(d){function e(d,e){function U(b){var e,g,r,s,u,v,x=false,y=false;f=b;if(h===c){u=d.scrollTop();v=d.scrollLeft();d.css({overflow:"hidden",padding:0});i=d.innerWidth()+M;j=d.innerHeight();d.width(i);h=a('<div class="jspPane" />').css("padding",L).append(d.children());k=a('<div class="jspContainer" />').css({width:i+"px",height:j+"px"}).append(h).appendTo(d)}else{d.css("width","");x=f.stickToBottom&&qb();y=f.stickToRight&&rb();s=d.innerWidth()+M!=i||d.outerHeight()!=j;if(s){i=d.innerWidth()+M;j=d.innerHeight();k.css({width:i+"px",height:j+"px"})}if(!s&&N==l&&h.outerHeight()==m){d.width(i);return}N=l;h.css("width","");d.width(i);k.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()}h.css("overflow","auto");if(b.contentWidth){l=b.contentWidth}else{l=h[0].scrollWidth}m=h[0].scrollHeight;h.css("overflow","");n=l/i;o=m/j;p=o>1;q=n>1;if(!(q||p)){d.removeClass("jspScrollable");h.css({top:0,width:k.width()-M});tb();wb();yb();db()}else{d.addClass("jspScrollable");e=f.maintainPosition&&(t||w);if(e){g=ob();r=pb()}V();X();Z();if(e){mb(y?l-i:g,false);lb(x?m-j:r,false)}vb();sb();Bb();if(f.enableKeyboardNavigation){xb()}if(f.clickOnTrack){cb()}zb();if(f.hijackInternalLinks){Ab()}}if(f.autoReinitialise&&!K){K=setInterval(function(){U(f)},f.autoReinitialiseDelay)}else if(!f.autoReinitialise&&K){clearInterval(K)}u&&d.scrollTop(0)&&lb(u,false);v&&d.scrollLeft(0)&&mb(v,false);d.trigger("jsp-initialised",[q||p])}function V(){if(p){k.append(a('<div class="jspVerticalBar" />').append(a('<div class="jspCap jspCapTop" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragTop scrolltopimg" /><div class="bgscrolld">'),a('</div><div class="jspDragBottom scrollbotimg" />'))),a('<div class="jspCap jspCapBottom" />')));x=k.find(">.jspVerticalBar");y=x.find(">.jspTrack");r=y.find(">.jspDrag");if(f.showArrows){C=a('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp",ab(0,-1)).bind("click.jsp",ub);D=a('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp",ab(0,1)).bind("click.jsp",ub);if(f.arrowScrollOnHover){C.bind("mouseover.jsp",ab(0,-1,C));D.bind("mouseover.jsp",ab(0,1,D))}_(y,f.verticalArrowPositions,C,D)}A=j;k.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){A-=a(this).outerHeight()});r.hover(function(){r.addClass("jspHover")},function(){r.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",ub);r.addClass("jspActive");var c=b.pageY-r.position().top;a("html").bind("mousemove.jsp",function(a){fb(a.pageY-c,false)}).bind("mouseup.jsp mouseleave.jsp",eb);return false});W()}}function W(){y.height(A+"px");t=0;z=f.verticalGutter+y.outerWidth();h.width(i-z-M);try{if(x.position().left===0){h.css("margin-left",z+"px")}}catch(a){}}function X(){if(q){k.append(a('<div class="jspHorizontalBar" />').append(a('<div class="jspCap jspCapLeft" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragLeft" />'),a('<div class="jspDragRight" />'))),a('<div class="jspCap jspCapRight" />')));E=k.find(">.jspHorizontalBar");F=E.find(">.jspTrack");u=F.find(">.jspDrag");if(f.showArrows){I=a('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp",ab(-1,0)).bind("click.jsp",ub);J=a('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp",ab(1,0)).bind("click.jsp",ub);if(f.arrowScrollOnHover){I.bind("mouseover.jsp",ab(-1,0,I));J.bind("mouseover.jsp",ab(1,0,J))}_(F,f.horizontalArrowPositions,I,J)}u.hover(function(){u.addClass("jspHover")},function(){u.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",ub);u.addClass("jspActive");var c=b.pageX-u.position().left;a("html").bind("mousemove.jsp",function(a){hb(a.pageX-c,false)}).bind("mouseup.jsp mouseleave.jsp",eb);return false});G=k.innerWidth();Y()}}function Y(){k.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){G-=a(this).outerWidth()});F.width(G+"px");w=0}function Z(){if(q&&p){var b=F.outerHeight(),c=y.outerWidth();A-=b;a(E).find(">.jspCap:visible,>.jspArrow").each(function(){G+=a(this).outerWidth()});G-=c;j-=c;i-=b;F.parent().append(a('<div class="jspCorner" />').css("width",b+"px"));W();Y()}if(q){h.width(k.outerWidth()-M+"px")}m=h.outerHeight();o=m/j;if(q){H=Math.ceil(1/n*G);if(H>f.horizontalDragMaxWidth){H=f.horizontalDragMaxWidth}else if(H<f.horizontalDragMinWidth){H=f.horizontalDragMinWidth}u.width(H+"px");v=G-H;ib(w)}if(p){B=Math.ceil(1/o*A);if(B>f.verticalDragMaxHeight){B=f.verticalDragMaxHeight}else if(B<f.verticalDragMinHeight){B=f.verticalDragMinHeight}r.height(B+"px");s=A-B;gb(t)}}function _(a,b,c,d){var e="before",f="after",g;if(b=="os"){b=/Mac/.test(navigator.platform)?"after":"split"}if(b==e){f=b}else if(b==f){e=b;g=c;c=d;d=g}a[e](c)[f](d)}function ab(a,b,c){return function(){bb(a,b,this,c);this.blur();return false}}function bb(b,c,d,e){d=a(d).addClass("jspActive");var h,i,j=true,k=function(){if(b!==0){g.scrollByX(b*f.arrowButtonSpeed)}if(c!==0){g.scrollByY(c*f.arrowButtonSpeed)}i=setTimeout(k,j?f.initialDelay:f.arrowRepeatFreq);j=false};k();h=e?"mouseout.jsp":"mouseup.jsp";e=e||a("html");e.bind(h,function(){d.removeClass("jspActive");i&&clearTimeout(i);i=null;e.unbind(h)})}function cb(){db();if(p){y.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d=a(this),e=d.offset(),h=b.pageY-e.top-t,i,k=true,l=function(){var a=d.offset(),c=b.pageY-a.top-B/2,e=j*f.scrollPagePercent,o=s*e/(m-j);if(h<0){if(t-o>c){g.scrollByY(-e)}else{fb(c)}}else if(h>0){if(t+o<c){g.scrollByY(e)}else{fb(c)}}else{n();return}i=setTimeout(l,k?f.initialDelay:f.trackClickRepeatFreq);k=false},n=function(){i&&clearTimeout(i);i=null;a(document).unbind("mouseup.jsp",n)};l();a(document).bind("mouseup.jsp",n);return false}})}if(q){F.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d=a(this),e=d.offset(),h=b.pageX-e.left-w,j,k=true,m=function(){var a=d.offset(),c=b.pageX-a.left-H/2,e=i*f.scrollPagePercent,o=v*e/(l-i);if(h<0){if(w-o>c){g.scrollByX(-e)}else{hb(c)}}else if(h>0){if(w+o<c){g.scrollByX(e)}else{hb(c)}}else{n();return}j=setTimeout(m,k?f.initialDelay:f.trackClickRepeatFreq);k=false},n=function(){j&&clearTimeout(j);j=null;a(document).unbind("mouseup.jsp",n)};m();a(document).bind("mouseup.jsp",n);return false}})}}function db(){if(F){F.unbind("mousedown.jsp")}if(y){y.unbind("mousedown.jsp")}}function eb(){a("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp");if(r){r.removeClass("jspActive")}if(u){u.removeClass("jspActive")}}function fb(a,b){if(!p){return}if(a<0){a=0}else if(a>s){a=s}if(b===c){b=f.animateScroll}if(b){g.animate(r,"top",a,gb)}else{r.css("top",a);gb(a)}}function gb(a){if(a===c){a=r.position().top}k.scrollTop(0);t=a;var b=t===0,e=t==s,f=a/s,g=-f*(m-j);if(O!=b||Q!=e){O=b;Q=e;d.trigger("jsp-arrow-change",[O,Q,P,R])}jb(b,e);h.css("top",g);d.trigger("jsp-scroll-y",[-g,b,e]).trigger("scroll")}function hb(a,b){if(!q){return}if(a<0){a=0}else if(a>v){a=v}if(b===c){b=f.animateScroll}if(b){g.animate(u,"left",a,ib)}else{u.css("left",a);ib(a)}}function ib(a){if(a===c){a=u.position().left}k.scrollTop(0);w=a;var b=w===0,e=w==v,f=a/v,g=-f*(l-i);if(P!=b||R!=e){P=b;R=e;d.trigger("jsp-arrow-change",[O,Q,P,R])}kb(b,e);h.css("left",g);d.trigger("jsp-scroll-x",[-g,b,e]).trigger("scroll")}function jb(a,b){if(f.showArrows){C[a?"addClass":"removeClass"]("jspDisabled");D[b?"addClass":"removeClass"]("jspDisabled")}}function kb(a,b){if(f.showArrows){I[a?"addClass":"removeClass"]("jspDisabled");J[b?"addClass":"removeClass"]("jspDisabled")}}function lb(a,b){var c=a/(m-j);fb(c*s,b)}function mb(a,b){var c=a/(l-i);hb(c*v,b)}function nb(b,c,d){var e,g,h,l=0,m=0,n,o,p,q,r,s;try{e=a(b)}catch(t){return}g=e.outerHeight();h=e.outerWidth();k.scrollTop(0);k.scrollLeft(0);while(!e.is(".jspPane")){l+=e.position().top;m+=e.position().left;e=e.offsetParent();if(/^body|html$/i.test(e[0].nodeName)){return}}n=pb();p=n+j;if(l<n||c){r=l-f.verticalGutter}else if(l+g>p){r=l-j+g+f.verticalGutter}if(r){lb(r,d)}o=ob();q=o+i;if(m<o||c){s=m-f.horizontalGutter}else if(m+h>q){s=m-i+h+f.horizontalGutter}if(s){mb(s,d)}}function ob(){return-h.position().left}function pb(){return-h.position().top}function qb(){var a=m-j;return a>20&&a-pb()<10}function rb(){var a=l-i;return a>20&&a-ob()<10}function sb(){k.unbind(T).bind(T,function(a,b,c,d){var e=w,h=t;g.scrollBy(c*f.mouseWheelSpeed,-d*f.mouseWheelSpeed,false);return e==w&&h==t})}function tb(){k.unbind(T)}function ub(){return false}function vb(){h.find(":input,a").unbind("focus.jsp").bind("focus.jsp",function(a){nb(a.target,false)})}function wb(){h.find(":input,a").unbind("focus.jsp")}function xb(){function i(){var a=w,d=t;switch(b){case 40:g.scrollByY(f.keyboardSpeed,false);break;case 38:g.scrollByY(-f.keyboardSpeed,false);break;case 34:case 32:g.scrollByY(j*f.scrollPagePercent,false);break;case 33:g.scrollByY(-j*f.scrollPagePercent,false);break;case 39:g.scrollByX(f.keyboardSpeed,false);break;case 37:g.scrollByX(-f.keyboardSpeed,false);break}c=a!=w||d!=t;return c}var b,c,e=[];q&&e.push(E[0]);p&&e.push(x[0]);h.focus(function(){d.focus()});d.attr("tabindex",0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp",function(d){if(d.target!==this&&!(e.length&&a(d.target).closest(e).length)){return}var f=w,g=t;switch(d.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:b=d.keyCode;i();break;case 35:lb(m-j);b=null;break;case 36:lb(0);b=null;break}c=d.keyCode==b&&f!=w||g!=t;return!c}).bind("keypress.jsp",function(a){if(a.keyCode==b){i()}return!c});if(f.hideFocus){d.css("outline","none");if("hideFocus"in k[0]){d.attr("hideFocus",true)}}else{d.css("outline","");if("hideFocus"in k[0]){d.attr("hideFocus",false)}}}function yb(){d.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp")}function zb(){if(location.hash&&location.hash.length>1){var b,c,d=escape(location.hash.substr(1));try{b=a("#"+d+', a[name="'+d+'"]')}catch(e){return}if(b.length&&h.find(d)){if(k.scrollTop()===0){c=setInterval(function(){if(k.scrollTop()>0){nb(b,true);a(document).scrollTop(k.position().top);clearInterval(c)}},50)}else{nb(b,true);a(document).scrollTop(k.position().top)}}}}function Ab(){if(a(document.body).data("jspHijack")){return}a(document.body).data("jspHijack",true);a(document.body).delegate("a[href*=#]","click",function(c){var d=this.href.substr(0,this.href.indexOf("#")),e=location.href,f,g,h,i,j,k;if(location.href.indexOf("#")!==-1){e=location.href.substr(0,location.href.indexOf("#"))}if(d!==e){return}f=escape(this.href.substr(this.href.indexOf("#")+1));g;try{g=a("#"+f+', a[name="'+f+'"]')}catch(l){return}if(!g.length){return}h=g.closest(".jspScrollable");i=h.data("jsp");i.scrollToElement(g,true);if(h[0].scrollIntoView){j=a(b).scrollTop();k=g.offset().top;if(k<j||k>j+a(b).height()){h[0].scrollIntoView()}}c.preventDefault()})}function Bb(){var a,b,c,d,e,f=false;k.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp",function(g){var h=g.originalEvent.touches[0];a=ob();b=pb();c=h.pageX;d=h.pageY;e=false;f=true}).bind("touchmove.jsp",function(h){if(!f){return}var i=h.originalEvent.touches[0],j=w,k=t;g.scrollTo(a+c-i.pageX,b+d-i.pageY);e=e||Math.abs(c-i.pageX)>5||Math.abs(d-i.pageY)>5;return j==w&&k==t}).bind("touchend.jsp",function(a){f=false}).bind("click.jsp-touchclick",function(a){if(e){e=false;return false}})}function Cb(){var a=pb(),b=ob();d.removeClass("jspScrollable").unbind(".jsp");d.replaceWith(S.append(h.children()));S.scrollTop(a);S.scrollLeft(b);if(K){clearInterval(K)}}var f,g=this,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O=true,P=true,Q=false,R=false,S=d.clone(false,false).empty(),T=a.fn.mwheelIntent?"mwheelIntent.jsp":"mousewheel.jsp";L=d.css("paddingTop")+" "+d.css("paddingRight")+" "+d.css("paddingBottom")+" "+d.css("paddingLeft");M=(parseInt(d.css("paddingLeft"),10)||0)+(parseInt(d.css("paddingRight"),10)||0);a.extend(g,{reinitialise:function(b){b=a.extend({},f,b);U(b)},scrollToElement:function(a,b,c){nb(a,b,c)},scrollTo:function(a,b,c){mb(a,c);lb(b,c)},scrollToX:function(a,b){mb(a,b)},scrollToY:function(a,b){lb(a,b)},scrollToPercentX:function(a,b){mb(a*(l-i),b)},scrollToPercentY:function(a,b){lb(a*(m-j),b)},scrollBy:function(a,b,c){g.scrollByX(a,c);g.scrollByY(b,c)},scrollByX:function(a,b){var c=ob()+Math[a<0?"floor":"ceil"](a),d=c/(l-i);hb(d*v,b)},scrollByY:function(a,b){var c=pb()+Math[a<0?"floor":"ceil"](a),d=c/(m-j);fb(d*s,b)},positionDragX:function(a,b){hb(a,b)},positionDragY:function(a,b){fb(a,b)},animate:function(a,b,c,d){var e={};e[b]=c;a.animate(e,{duration:f.animateDuration,easing:f.animateEase,queue:false,step:d})},getContentPositionX:function(){return ob()},getContentPositionY:function(){return pb()},getContentWidth:function(){return l},getContentHeight:function(){return m},getPercentScrolledX:function(){return ob()/(l-i)},getPercentScrolledY:function(){return pb()/(m-j)},getIsScrollableH:function(){return q},getIsScrollableV:function(){return p},getContentPane:function(){return h},scrollToBottom:function(a){fb(s,a)},hijackInternalLinks:a.noop,destroy:function(){Cb()}});U(e)}d=a.extend({},a.fn.jScrollPane.defaults,d);a.each(["mouseWheelSpeed","arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){d[this]=d[this]||d.speed});return this.each(function(){var b=a(this),c=b.data("jsp");if(c){c.reinitialise(d)}else{c=new e(b,d);b.data("jsp",c)}})};a.fn.jScrollPane.defaults={showArrows:false,maintainPosition:true,stickToBottom:false,stickToRight:false,clickOnTrack:true,autoReinitialise:false,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:c,animateScroll:false,animateDuration:300,animateEase:"linear",hijackInternalLinks:false,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:0,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover:false,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation:true,hideFocus:false,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:.8}})(jQuery,this)