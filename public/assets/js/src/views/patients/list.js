define(['marionette', 'models/patient', 'collections/patients'],
    function(Marionette, PatientModel, PatientsCollection) {
    'use strict';

        // Instance of the collection
        var patients = new PatientsCollection;

        // Test data
        patients.add(new PatientModel);
        patients.add(new PatientModel);

        // View
        var PatientListView = Marionette.View.extend({
            el: $('.section-body'),

            render: function() {
                var template = Handlebars.compile($('#patient-place').html());
                var html = template({ patients: patients.toJSON() });
                this.$el.html(html);

                return this;
            },

            onRender: function() {

                console.log(patients.toJSON());
                console.log('rendered');
            }
        });

        return PatientListView;
});