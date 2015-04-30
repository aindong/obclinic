App.Views.Appointments = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {

            var self = this;

            $.get('/assets/templates/appointments/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                $.get('/api/v1/patients?q=all', function(res) {
                    self.$el.html(template({data: res}));

                    self.triggerMethod('render');

                    $('select').select2();

                    var elem = document.querySelector('#appointmentForm');
                    elem.addEventListener('submit', _.bind(self.createAppointment, self));

                    return self;
                });
            });
        },

        onRender: function() {
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "id"},
                {"data": "patient_no"},
                {"data": "name"},
                {"data": "appointment_date"},
                {"data": "status"},
                {"data": "created_by"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createAppointment: function(e) {
            e.preventDefault();

            var form = $('#appointmentForm');
            var url = '/api/v1/appointments';
            var messages = {
                success: 'Successfully created a new appointment',
                failed: 'Failed to add a new appointment'
            };

            var $http = App.Helpers.Http;
            $http.post(this, form, url, messages);
        }
    });

    return {
        List: List
    }
}(window.App));