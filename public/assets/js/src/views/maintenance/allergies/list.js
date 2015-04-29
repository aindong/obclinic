App.Views.Maintenance.Allergies = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            var self = this;
            $.get('/assets/templates/allergies/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                self.$el.html(template);
                self.triggerMethod('render');
                $('select').select2();

                var elem = document.querySelector('#allergiesForm');
                elem.addEventListener('submit', _.bind(self.createAllergy, self));

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
                {"data": "type"},
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
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

    return {
        List: List
    }
}(window.App));