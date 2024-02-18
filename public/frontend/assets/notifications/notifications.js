!function($) {
    "use strict";

    var Notification = function() {};


    Notification.prototype.autoHideNotify = function (style, position, title, text) {
        var icon = "far fa-adjust";
        if(style == "danger"){
            icon = "far fa-exclamation";
        }else if(style == "warning"){
            icon = "far fa-warning";
        }else if(style == "success"){
            icon = "far fa-check";
        }else if(style == "info"){
            icon = "far fa-question";
        }else{
            icon = "far fa-adjust";
        }
        $.notify({
          // options
            title: title+"<br>",
            message: text,
            icon: ""+icon+"",
      },{
          // settings
          element: 'body',
          position: null,
          type: style,
          allow_dismiss: false,
          newest_on_top: true,
          showProgressbar: false,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 1000,
          timer: 1000,
          url_target: '_blank',
          mouse_over: null,
          animate: {
              enter: 'animated lightSpeedIn',
              exit: 'animated lightSpeedOut'
          },
          onShow: null,
          onShown: null,
          onClose: null,
          onClosed: null,
          icon_type: 'class',
        });
    }

    //init - examples
    Notification.prototype.init = function() {

    },
    //init
    $.Notification = new Notification, $.Notification.Constructor = Notification
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Notification.init()
}(window.jQuery);
