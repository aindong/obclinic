define(['underscore', 'backbone', 'marionette', 'helpers/tables'], function(_, Backbone, Marionette, Tables) {
    'use strict';

    var QueueListView = Marionette.View.extend({
        el: $('.section-body'),
        render: function() {
            var template = _.template($('#queue-table').html(), {});

            this.$el.html(template);

            return this;
        },
        onRender: function() {
            console.log(Tables);
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
        }
    });

    return QueueListView;
});