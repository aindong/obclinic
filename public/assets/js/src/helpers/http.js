App.Helpers.Http = (function($) {
    'use strict';

    /**
     * Main Class
     * @type {{}}
     */
    var c = {};

    c.getTemplate = function (url) {
        
    };

    /**
     * Post HTTP helper
     *
     * @param context
     * @param $form
     * @param url
     * @param messages
     * @returns {c}
     */
    c.post = function (context, $form, url, messages) {
        var self = context;
        var form = $form;

        var btn = $('.btn-loading-state');

        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            beforeSend: function() {
                btn.button('loading');
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success(messages.success, 'Success');
                    self.triggerMethod('render');
                } else {
                    toastr.error(messages.failed, 'Error');
                }
            },
            error: function() {
                toastr.error(messages.failed, 'Error');
            },
            complete: function() {
                btn.button('reset');
            }
        });

        return this;
    };

    return c;
}(jQuery));