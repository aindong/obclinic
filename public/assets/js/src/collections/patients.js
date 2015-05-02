App.Collections.Patients = (function(App) {
    'use strict';

    var Patients = Backbone.Collection.extend({
        model: App.Models.Patient,
        url: '/api/v1/patients',
        parse: function(response) {
            return response.data;
        }
    });

    return Patients;
}(window.App));