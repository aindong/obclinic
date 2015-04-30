(function($, Backbone, Marionette ){
    'use strict';

    // Toastr Configuration
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };


    // Sidebar/Menubar active/inactive toggle
    $('#main-menu > li').click(function() {
        $(this).addClass('active')
            .siblings()
                .removeClass('active');
    });

    $('#main-menu li ul li').click(function() {
        var parent = $(this).parent().parent();
        if (!parent.hasClass('active')) {
            parent.addClass('active').siblings().removeClass('active');
        }
    });

    window.App =  {
        Helpers: {},
        Models: {},
        Views: {
            Maintenance: {}
        },
        Collections: {}
    };

}(jQuery, Backbone, Marionette));