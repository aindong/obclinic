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
            e.preventDefault();

            var form = $('#usersForm');
            var url = '/api/v1/maintenance/users';
            var messages = {
                success: 'Successfully created a new user',
                failed: 'Failed to create a new user'
            };

            var $http = App.Helpers.Http;
            $http.post(this, form, url, messages);
        }
    });

    return {
        List: List
    }
}(window.App));