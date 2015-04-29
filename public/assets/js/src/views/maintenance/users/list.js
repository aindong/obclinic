App.Views.Maintenance.Users = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            //var template = _.template($('#user-table').html(), {});
            //
            //this.$el.html(template);
            //
            //return this;
            //
            var self = this;

            $.get('/assets/templates/users/users.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                $.get('/api/v1/maintenance/users/roles', function(res) {

                    self.$el.html(template({data: res}));
                    self.triggerMethod('render');

                    $('select').select2();

                    var elem = document.querySelector('#usersForm');
                    elem.addEventListener('submit', _.bind(self.createUser, self));

                    return self;
                });
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
                {"data": "username"},
                {"data": "name"},
                {"data": "role"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#usersTable'), $columns);
        },

        createUser: function(e) {
            var self = this;
            var form = $('#usersForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/maintenance/users',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new user', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new user', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new user', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));