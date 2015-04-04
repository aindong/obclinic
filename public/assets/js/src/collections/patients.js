define(['backbone', 'models/patient'], function(Backbone, PatientModel) {
    var Patients = Backbone.Collection.extend({
        model: PatientModel
    });

    return Patients;
});