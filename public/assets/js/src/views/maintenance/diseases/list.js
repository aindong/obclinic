App.Views.Maintenance.Diseases = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {

            var self = this;

            $.get('/assets/templates/diseases/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                self.$el.html(template);
                self.triggerMethod('render');

                var elem = document.querySelector('#diseasesForm');
                elem.addEventListener('submit', _.bind(self.createDisease, self));

                App.Helpers.Loader.hide();

                return self;
            })
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

        createDisease: function(e) {
            e.preventDefault();

            var form = $('#diseasesForm');
            var url = '/api/v1/maintenance/diseases';
            var messages = {
                success: 'Successfully added a disease',
                failed: 'Failed to add a new disease'
            };

            var $http = App.Helpers.Http;
            $http.post(this, form, url, messages);
        }
    });

    return {
        List: List
    }
}(window.App));