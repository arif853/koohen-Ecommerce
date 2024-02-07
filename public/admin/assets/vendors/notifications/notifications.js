!function($) {
    "use strict";

    var Notification = function() {};


    Notification.prototype.autoHideNotify = function (style, position, title, text) {
        var icon = "fa-solid fa-adjust";
        if(style == "danger"){
            icon = "fa-solid fa-exclamation";
        }else if(style == "warning"){
            icon = "fa-solid fa-warning";
        }else if(style == "success"){
            icon = "fa-solid fa-check";
        }else if(style == "info"){
            icon = "fa-solid fa-question";
        }else{
            icon = "fa-solid fa-adjust";
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
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 3300,
          timer: 2000,
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
