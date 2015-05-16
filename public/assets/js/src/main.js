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
    $('#main-menu > li').not('.gui-folder').click(function() {
        App.Helpers.Loader.show();

        $(this).addClass('active')
            .siblings()
                .removeClass('active');
    });

    $('#main-menu li ul li').click(function() {
        App.Helpers.Loader.show();

        var parent = $(this).parent().parent();
        if (!parent.hasClass('active')) {
            parent.addClass('active').siblings().removeClass('active');
        }
    });

    $('#main-menu a').on('click', function(e) {
        Backbone.history.loadUrl(Backbone.history.fragment);
    });

    Handlebars.registerHelper('years', function(block) {
        var accum = '';
        var today = new Date();

        for(var i = 1950; i <= today.getFullYear(); ++i)
            accum += block.fn(i);
        return accum;
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