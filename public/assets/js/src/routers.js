define(['underscore',
    'backbone',
    'marionette',
    'views/queues/list',
    'views/patients/list',
    'views/maintenance/allergies/list'],
    function(_, Backbone, Marionette, QueueListView, PatientListView, AlleryListView) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            'users': 'showUsers',
            'appointments': 'showAppointments',
            'patients': 'showPatients',
            'maintenance/allergies': 'showAllergies',
            'maintenance/diseases': 'showDiseases',
            'maintenance/medicines': 'showMedicines',

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
        },

        showAllergies: function() {
            var allergyView = new AlleryListView;
            allergyView.render();
            allergyView.triggerMethod('render');
        }

    });

    return AppRouter;
});