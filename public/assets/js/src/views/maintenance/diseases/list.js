define(['underscore', 'backbone', 'marionette', 'helpers/tables'], function(_, Backbone, Marionette, Tables) {
    'use strict';

    var DiseaseListView = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#diseasesForm');
            elem.addEventListener('submit', _.bind(this.createDisease, this));
        },

        render: function() {
            var template = _.template($('#disease-table').html(), {});

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
                {"data": "updated"},
                {"data": "actions"}
            ];

            Tables.initialize($('#datatable2'), $columns);
        },

        createDisease: function(e) {
            e.preventDefault();
            var self = this;
            var form = $('#diseasesForm');

            $.ajax({
                url: '/api/v1/maintenance/diseases',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully added a disease', 'Success');
                        this.render();
                        this.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new disease', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new disease', 'Error');
                }
            });
        }
    });

    return DiseaseListView;
});