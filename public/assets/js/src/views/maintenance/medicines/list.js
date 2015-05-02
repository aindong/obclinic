App.Views.Maintenance.Medicines = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            var self = this;

            $.get('/assets/templates/medicines/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                self.$el.html(template);
                self.triggerMethod('render');

                var elem = document.querySelector('#medicinesForm');
                elem.addEventListener('submit', _.bind(self.createMedicine, self));

                App.Helpers.Loader.hide();

                return self;
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