App.Views.Appointments = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#appointmentForm');
            elem.addEventListener('submit', _.bind(this.createAppointment, this));
        },

        render: function() {
            var template = _.template($('#appointment-table').html(), {});

            this.$el.html(template);

            return this;
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