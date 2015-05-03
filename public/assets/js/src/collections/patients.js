App.Collections.Patients = (function(App) {
    'use strict';

    var Patients = Backbone.Collection.extend({
        model: App.Models.Patient,
        url: '/api/v1/patients',
        pagination: {
            current_page: 1,
            total_data: 0,
            per_page: 0,
            total_page: 0
        },
        parse: function(response) {
            this.pagination.current_page = response.current_page;
            this.pagination.total_data = response.total;
            this.pagination.per_page = response.per_page;
            this.pagination.total_page = response.total / response.per_page;

            return response.data;
        }
    });

    return Patients;
}(window.App));