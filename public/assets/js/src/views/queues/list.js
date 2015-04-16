define(['underscore', 'backbone', 'marionette', 'helpers/tables'],
    function(_, Backbone, Marionette, Tables) {
    'use strict';

    var QueueListView = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#createQueueForm');

            elem.addEventListener('submit', _.bind(this.createQueue, this));
        },

        render: function() {
            var template = _.template($('#queue-table').html(), {});

            this.$el.html(template);

            return this;
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

            Tables.initialize($('#datatable2'), $columns);
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

    return QueueListView;
});