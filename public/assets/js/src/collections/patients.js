define(['backbone', 'models/patient'], function(Backbone, PatientModel) {
    var Patients = Backbone.Collection.extend({
        model: PatientModel,
        url: '/api/v1/patients',
        parse: function(response) {
            return response.data;
        }
    });

    return Patients;
});