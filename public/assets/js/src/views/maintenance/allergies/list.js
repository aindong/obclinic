define(['underscore', 'backbone', 'marionette', 'helpers/tables'], function(_, Backbone, Marionette, Tables) {
    'use strict';

    var AllergyListView = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#allergiesForm');
            elem.addEventListener('submit', _.bind(this.createAllergy, this));
        },

        render: function() {
            var template = _.template($('#allergy-table').html(), {});

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
                {"data": "type"},
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            Tables.initialize($('#datatable2'), $columns);
        },

        createAllergy: function(e) {
            var self = this;
            var form = $('#allergiesForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/maintenance/allergies',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new allergy', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new allergy', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new allergy', 'Error');
                }
            });
        }
    });

    return AllergyListView;
});