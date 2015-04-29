App.Views.Queues = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            var self = this;

            $.get('/assets/templates/queues/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                $.get('/api/v1/patients?q=all', function(res) {

                    self.$el.html(template({data: res}));
                    self.triggerMethod('render');

                    $('select').select2();

                    var elem = document.querySelector('#createQueueForm');
                    elem.addEventListener('submit', _.bind(self.createQueue, self));

                    return self;
                });
            });
        },

        onRender: function() {
            //console.log(Tables);
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "queue_no"},
                {"data": "arrival"},
                {"data": "patient_id"},
                {"data": "patient_name"},
                {"data": "vitalsign"},
                {"data": "type"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createQueue: function(e) {
            e.preventDefault();
            var self = this;

            var form = $('#createQueueForm');

            $.ajax({
                url: '/api/v1/queues',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    console.log(data);

                    if (data.status == 'success') {
                        toastr.success('Successfully added a new queue', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Opps! Theres something wrong', 'Error');
                    }
                },
                error: function(xhr, data, status) {
                    toastr.error('Opps! Theres something wrong', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));