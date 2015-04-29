(function(App) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            'maintenance/users': 'showUsers',
            'appointments': 'showAppointments',
            'patients': 'showPatients',
            'maintenance/allergies': 'showAllergies',
            'maintenance/diseases': 'showDiseases',
            'maintenance/medicines': 'showMedicines',

            // Default
            '*action': 'showQueues'
        },

        initialize: function() {
            Backbone.history.start({ pushState: false });
        },

        index: function() {

            var queueListView = new App.Views.Queues.List;
            queueListView.render();
        },

        showUsers: function() {

            var usersView = new App.Views.Maintenance.Users.List;
            usersView.render();
        },

        showAppointments: function() {
            var appointments = new App.Views.Appointments.List;
            appointments.render();
            appointments.triggerMethod('render');
        },

        showPatients: function() {
            var patientListView = new App.Views.Patients.List;
            patientListView.triggerMethod('before:render');
        },

        showAllergies: function() {
            var allergyView = new App.Views.Maintenance.Allergies.List;
            allergyView.render();
            allergyView.triggerMethod('render');
        },

        showDiseases: function() {
            var diseaseView = new App.Views.Maintenance.Diseases.List;
            diseaseView.render();
            diseaseView.triggerMethod('render');
        },

        showMedicines: function() {
            var medicineView = new App.Views.Maintenance.Medicines.List;
            medicineView.render();
            medicineView.triggerMethod('render');
        }

    });

    return new AppRouter;
}(window.App));