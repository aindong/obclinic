define(['underscore',
    'backbone',
    'marionette',
    'views/queues/list',
    'views/patients/list'],
    function(_, Backbone, Marionette, QueueListView, PatientListView) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            '/users': 'showUsers',
            '/appointments': 'showAppointments',
            'patients': 'showPatients',

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
        },

        showPatients: function() {
            var patientListView = new PatientListView;
            patientListView.triggerMethod('before:render');
        }

    });

    return AppRouter;
});