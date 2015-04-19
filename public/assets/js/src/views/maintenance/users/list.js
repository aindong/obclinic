define(['underscore', 'backbone', 'marionette', 'helpers/tables'], function(_, Backbone, Marionette, Tables) {
    'use strict';

    var UserListView = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#usersForm');
            elem.addEventListener('submit', _.bind(this.createUser, this));
        },

        render: function() {
            var template = _.template($('#user-table').html(), {});

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
                {"data": "username"},
                {"data": "name"},
                {"data": "role"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            Tables.initialize($('#datatable2'), $columns);
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

    return UserListView;
});