var windowSize=Array(0,0),rotators=null,iamnavbgs=null,contentAreaHeight=0,cNav=null,debug=!0,showSize=!0,sizeBreak=900,isSafari=/safari/i.test(navigator.userAgent),currentPanel=0,panelCount=3,windowWidth=null,offset=0;!function(e,$,n){"use strict";$(function(){function e(){contentAreaHeight=parseInt($(window).height())-parseInt($("header").outerHeight())}function n(){e(),$("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),$("body").hasClass("search")&&$("#nu__search section").css({"min-height":contentAreaHeight})}function t(){windowSize[0]=$(window).height(),windowSize[1]=$(window).width(),$.post("/wp-content/themes/nudev/src/windowsize.php",{height:windowSize[0],width:windowSize[1]},function(e){})}function i(){$("#nu__supernav > section > div > ul > li.active").removeClass("active"),$("#nu__iamnav > section > div > ul > li.active").removeClass("active"),windowSize[1]>740&&($("#nu__supernav > section > div > ul > li:first-child").addClass("active"),$("#nu__iamnav > section > div > ul > li:first-child").addClass("active"))}function a(){$("input#nu__search-toggle").prop("checked")||$("input#nu__iamnav-toggle").prop("checked")||$("input#nu__supernav-toggle").prop("checked")?$("html").css({"overflow-y":"hidden"}):$("html").css({"overflow-y":"scroll"})}if(showSize){var r=$(window).width();$("p.testp").text("Screen width is currently: "+r+"px."),$(window).resize(function(){var e=$(window).width();e<=576?$("p.testp").text("Screen width is less than or equal to 576px. Width is currently: "+e+"px."):e<=680?$("p.testp").text("Screen width is between 577px and 680px. Width is currently: "+e+"px."):e<=1024?$("p.testp").text("Screen width is between 681px and 1024px. Width is currently: "+e+"px."):e<=1500?$("p.testp").text("Screen width is between 1025px and 1499px. Width is currently: "+e+"px."):$("p.testp").text("Screen width is greater than 1500px. Width is currently: "+e+"px.")})}$("main").css({"margin-top":$("header").outerHeight()}),$("body").addClass("nu-js"),parseInt($("form#nu__searchbar-form > div > label").css("left"))>0&&($("#nu__searchbar").on("focus","form#nu__searchbar-form > div > input",function(e){$("form#nu__searchbar-form > div > label").addClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,1.0)","pointer-events":"auto"})}),$("#nu__searchbar").on("blur","form#nu__searchbar-form > div > input",function(e){""==$(this).val()&&($("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"}))})),$("form#nu__searchbar-form").on("click","div > button[type=reset]",function(e){$("form#nu__searchbar-form > div > input").val(""),$("form#nu__searchbar-form > div > input").attr("value",""),$("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"})}),t(),windowSize[1]<740&&i(),$.post("/wp-content/themes/nudev/src/iamnavbgs.php",function(e){iamnavbgs=JSON.parse(e),console.log(iamnavbgs)}),$("nav").on("click","input#nu__supernav-toggle,input#nu__iamnav-toggle,input#nu__search-toggle",function(){null==cNav?($(this).prop("checked",!0),cNav=$(this).attr("id")):$(this).attr("id")==cNav?($(this).prop("checked",!1),cNav=null):($("nav input").prop("checked",!1),$(this).prop("checked",!0),cNav=$(this).attr("id")),i(),$("body").hasClass("search")&&$("input#nu__search-toggle").prop("checked",!1),$("body").hasClass("home")&&!$("footer#nu__global-footer").hasClass("collapse")&&$("footer#nu__global-footer").addClass("collapse"),$("body").hasClass("home")||a()}),$("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(e){["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(e.target.id)>=0&&($("nav input").prop("checked",!1),cNav=null)}),$("div.navigational > section > div > ul").on("click","li:not(.featured)",function(e){"nu__iamnav"==$(this).parent().parent().parent().parent().attr("id")&&iamnavbgs.length>0&&$("div#nu__iamnav").attr("style","background-image: url("+iamnavbgs[$(this).index()]+");"),$("div.navigational > section > div > ul li").removeClass("active"),$(this).addClass("active")}),$(window).on("resize",function(){if(t(),n(),i(),$("main").css({"margin-top":$("header").outerHeight()}),parseInt($("#nu__alerts").height())>0&&$("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt($("header").outerHeight())}),$("body").hasClass("home")){if(parseInt($("#nu__alerts").height())>0){var e=parseInt($(window).height())-parseInt($("header").outerHeight())-parseInt($("footer").height());$("main#nu__homepage").css({height:e,"min-height":e})}windowSize[1]<sizeBreak?($("#nu__stories").css({"margin-left":"0"}),currentPanel=0,offset=0,$("#next,#prev").fadeOut(200)):"none"==$("#next").css("display")&&$("#next").fadeIn(200);var a=-1*windowSize[1],r=windowWidth-a;if(currentPanel>0){var s=offset-r*currentPanel;$("#nu__stories").css({"margin-left":s}),offset=s}windowWidth=a}})})}(this,jQuery);