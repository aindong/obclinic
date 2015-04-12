define(['underscore', 'backbone', 'marionette', 'helpers/tables'], function(_, Backbone, Marionette, Tables) {
    'use strict';

    var MedicineListView = Marionette.View.extend({
        el: $('.section-body'),
        render: function() {
            var template = _.template($('#medicine-table').html(), {});

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
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"}
            ];

            Tables.initialize($('#datatable2'), $columns);
        }
    });

    return MedicineListView;
});