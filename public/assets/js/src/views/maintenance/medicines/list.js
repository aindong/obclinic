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
            var self = this;

            $.ajax({
                url: '/api/v1/maintenance/medicines',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new medicine', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to create a new medicine', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to create a new medicine', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));