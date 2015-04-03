define(['underscore',
    'backbone',
    'marionette',
    'views/queues/list'],
    function(_, Backbone, Marionette, QueueListView) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            '/users': 'showUsers',
            '/appointments': 'showAppointments',

            // Default
            '*action': 'showQueues'
        },
        initialize: function() {
            Backbone.history.start({ pushState: true });
        },
        index: function() {
            var queueListView = new QueueListView;
            queueListView.render();
            queueListView.triggerMethod('render');
        },
        showUsers: function() {

        },
        showAppointments: function() {
            alert('appointments');
        }

    });

    return AppRouter;
});