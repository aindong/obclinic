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

                this.$el.html(template);
                self.triggerMethod('render');

                var elem = document.querySelector('#diseasesForm');
                elem.addEventListener('submit', _.bind(self.createDisease, self));

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
            var self = this;
            var form = $('#diseasesForm');

            $.ajax({
                url: '/api/v1/maintenance/diseases',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully added a disease', 'Success');
                        self.render();
                        self.triggerMethod('render');
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

    return {
        List: List
    }
}(window.App));