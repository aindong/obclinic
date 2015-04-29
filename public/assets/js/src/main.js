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

    window.App =  {
        Helpers: {},
        Models: {},
        Views: {
            Maintenance: {}
        },
        Collections: {}
    };

}(jQuery, Backbone, Marionette));