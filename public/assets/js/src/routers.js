(function(App) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            'maintenance/users': 'showUsers',
            'appointments': 'showAppointments',
            'patients': 'showPatients',
            'patients/:id/details': 'patientDetails',
            'patients/:page': 'showPatientsPage',
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
        },

        showPatients: function() {
            var patientListView = new App.Views.Patients.List;
            patientListView.triggerMethod('before:render');
        },

        patientDetails: function(id) {
            var patientDetail = new App.Views.Patients.Show({patient_no: id});
            patientDetail.triggerMethod('before:render');
        },

        showPatientsPage: function(page) {
            var patientListView = new App.Views.Patients.List({page: page});
            patientListView.triggerMethod('before:render');
        },

        showAllergies: function() {
            var allergyView = new App.Views.Maintenance.Allergies.List;
            allergyView.render();
        },

        showDiseases: function() {
            var diseaseView = new App.Views.Maintenance.Diseases.List;
            diseaseView.render();
        },

        showMedicines: function() {
            var medicineView = new App.Views.Maintenance.Medicines.List;
            medicineView.render();
        }

    });

    return new AppRouter;
}(window.App));