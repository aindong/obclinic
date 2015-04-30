App.Views.Maintenance.Medicines = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#medicinesForm');

            elem.addEventListener('submit', _.bind(this.createMedicine, this));
        },

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
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createMedicine: function(e) {
            e.preventDefault();

            var form = $('#medicinesForm');
            var url = '/api/v1/maintenance/medicines';
            var messages = {
                success: 'Successfully created a new medicine',
                failed: 'Failed to create a new medicine'
            };

            var $http = App.Helpers.Http;
            $http.post(this, form, url, messages);
        }
    });

    return {
        List: List
    }
}(window.App));