

/**
 * gmsg.js 消息提示框
 * @param 看下的settings设置
 * @return 用户设置参数和消息框实例
 * @author liuxg
 */
(function(jQuery) {
$.gmsg = function(options){

   var settings = initSettings(options);
   var instance =  newMsg();

    /**
	 * 新建一个实例
	*/
   function newMsg(){
     $("div[class='gmsg shadow']").remove();  //保证单例
     $(".gmsg-mask-layer").remove();
     var msg = $('<div class = "gmsg shadow"></div>') ;
	 newTitle(msg);
     newBody(msg);
	 newFooter(msg);
	 if(settings.maskLayer) $("body").append($("<div class = 'gmsg-mask-layer'></div>")); //插入遮罩层
	 $("body").append(msg);
	 posHandler(msg);
	 return msg;
   }
   /**
     * 处理位置
	 */
   function posHandler(msg){
      var left = 0 ;
	  var top = 0 ;
      switch(settings.position){
	     case "center" :
		   left = ($(window).outerWidth() - msg.outerWidth()) / 2 + "px" ;
		   top = ($(window).outerHeight() - msg.outerHeight()) * 0.382 + "px";
		 break ;
		 case "center-top" :
		   left = ($(window).outerWidth() - msg.outerWidth()) / 2 + "px" ;
		   top = "0px";
		 break ;
		 case "bottom-right" :
		   left = $(window).outerWidth() - msg.outerWidth() - 5 +  "px" ;
		   top = $(window).outerHeight() - msg.outerHeight() - 5 +  "px";
		 break ;
	  }

	  if(settings.top) top = settings.top;   //用户传top，则修改top
	  if(settings.left) left = settings.left;   //用户传left，则修改left

	  if(settings.maskLayer) $(".gmsg-mask-layer").show(); //启动遮罩层
	  msg.css("left" , left).css("top" ,top).fadeIn();
	  settings.left = left ;
	  settings.top = top ;
   }

   /**
     * 初始化设置
     */
   function initSettings(options){
	  var settings = {
         "showTitle" : options == null || options.titleText == null || options.titleText == "" ? false : true ,  //是否显示标题
		 "titleText" : "Title",                //标题，不传默认不显示标题栏
		 "titleIcon" : "fa-leaf",            //标题图标，传入font-awesome的图标样式
		 "contentHtml" : null,               //消息内容
		 "contentIcon" : "fa-info-circle",   //内容旁边的图标，传入font-awesome的图标样式
		 "delayTime" : 1000 ,                //多少秒关闭，默认是俩秒，出入-1时，不关闭，可以通过show和hide方法控制打开和关闭
		 "theme" : "info",                   //样式主题，当样式是confirm时，生成确定和取消按钮的底部按钮
		 "confirm" : null ,                  //确定按钮的回调函数
		 "position" : "center" ,             //消息框显示的位置
		 "left" : null ,                     //消息框具体的左边位置
		 "top"  : null ,                     //消息框具体的右边位置
		 "maskLayer" : true                  //显示遮罩层
	  }
	  if(options != null ) settings =  initTheme(options.theme,settings);
	  $.extend(settings,options);
	  return settings ;
   }

   /**
    * 初始化主题样式
    */
   function initTheme(theme,settings){

	  var  contentHtml = null ;
	  var  contentIcon = "fa-info-circle info" ;

      switch(theme){
      case "confirm":
    	 // settings.showTitle = true ;
		 // settings.titleText = settings.titleText == "标题" ? "提醒" : settings.titleText ;
		 // settings.titleIcon = settings.titleIcon == "fa-leaf" ? "fa-question-circle" : settings.titleIcon ;
		  contentHtml = "Are You Sure?" ;
		  contentIcon = "fa-question-circle info" ;
    	  break ;
      case "success":
    	  contentHtml = "Success" ;
    	  contentIcon = "fa-check-circle success" ;
    	  break ;
      case "warning":
    	  contentHtml = "Warning" ;
    	  contentIcon = "fa-exclamation-triangle warning" ;
    	  break ;
      case "danger":
    	  contentHtml = "Fail" ;
    	  contentIcon = "fa-frown-o danger" ;
    	  break ;
      case "loading":
    	  contentHtml = "Loading" ;
    	  contentIcon = "fa-spinner fa-spin" ;
    	  break ;
      }

      settings.contentHtml = contentHtml ;
      settings.contentIcon = contentIcon ;
      return settings ;
   }


   /**
     * 新建一个title
	 */
   function newTitle(msg){
	   if(settings.showTitle){  //标题
		 var title =  '<div class = "gheader">'+
						 '<span class = "title">'+
							'<span class= "icon"><i class = "fa '+settings.titleIcon+'"></i></span> '+
							'<span class = "text">'+settings.titleText+'</span>'+
						 '</span>'+
						 '<span class = "tool">'+
							'<span class = "gclose"><i class = "fa fa-times"></i></span>'+
						 '</span>'+
					  '</div>';
		 $(title).appendTo(msg);
		 //注册关闭窗口事件
         msg.find(".gclose").on("click",function(){
		      //msg.fadeOut();
			  hideMsg(msg);
		 });
	 }
   };
   /**
     * 显示窗口
     */
   function showMsg(msg){
      if(settings.maskLayer) $(".gmsg-mask-layer").show();
	  msg.fadeIn();
   };

	/**
	* 关闭窗口
	*/
   function hideMsg(msg){
      if(settings.maskLayer) $(".gmsg-mask-layer").hide();
	  msg.fadeOut();
   };

    /**
     * 新建一个body
	 */
   function newBody(msg){
      var body = '<div class = "body">'+   //body
				  '<i class = "fa '+settings.contentIcon+'"></i>'+
				  (settings.contentHtml == null || settings.contentHtml == "" ? "" : '<span class = "content">'+settings.contentHtml+'</span>') +
			    '</div>';
      var $body = $(body);
      if(settings.theme == "confirm"){
    	  $body.addClass("padding20");
	  }
      $body.appendTo(msg);
   }

   /**
     * 新建一个footer
	 */
   function newFooter(msg){
      if(settings.theme == "confirm"){   //主题是确定框的时候，添加footer
	    var footer = '<div class = "gfooter">Ok</div>';
	    $(footer).appendTo(msg);
        msg.find(".gfooter").on("click",function(){//注册确定事件，用户传confirm的回调函数
		   if(settings.confirm){
		      settings.confirm();
		   }
		   //msg.fadeOut();
		   hideMsg(msg);
		});
	 }else if(settings.delayTime != -1){ //当传入的延时关闭的时间是-1时，不关闭窗口，可以通过代码调用show和hide方法
		 setTimeout(function(){ //当主题不是confirm时，默认是俩秒关闭窗口
		    hideMsg(msg);
		 },settings.delayTime);
	 }
   }

   return {
	    "settings" :  settings ,
        "instance" : instance ,
		"show" : function(){    //打开窗口
			showMsg(instance);
		},
		"hide" : function(){   //关闭窗口
		    hideMsg(instance);
		}
   }

}


/**
 * 显示实例
 */
$.showGmsg = function(){
	if($(".gmsg").length > 0){
		 if($(".gmsg-mask-layer").length > 0) $(".gmsg-mask-layer").show();
		   $(".gmsg").fadeIn();
	}
}
/**
 * 显示实例
 */
$.hideGmsg = function(){
	if($(".gmsg").length > 0){
		 if($(".gmsg-mask-layer").length > 0) $(".gmsg-mask-layer").hide();
		   $(".gmsg").fadeOut();
	}
}

})(jQuery)

