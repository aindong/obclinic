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
            var self = this;
            var form = $('#appointmentForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/appointments',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new appointment', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new appointment', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new appointment', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));