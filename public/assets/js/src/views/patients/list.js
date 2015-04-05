define(['marionette', 'models/patient', 'collections/patients', 'views/patients/create'],
    function(Marionette, PatientModel, PatientsCollection, PatientCreateForm) {
    'use strict';

        // Instance of the collection
        var patients = new PatientsCollection();

        // View
        var PatientListView = Marionette.View.extend({
            el: $('.section-body'),

            initialize: function() {
                this.collection.on('sync', this.render, this);

                var patientCreateForm = new PatientCreateForm({ collection: patients });
            },

            collection: patients,

            render: function() {
                var template = Handlebars.compile($('#patient-place').html());
                var html = template({ patients: this.collection.toJSON() });
                this.$el.html(html);

                return this;
            },

            onBeforeRender: function() {
                var self = this;
                this.collection.fetch().then(function() {
                    self.render();
                    self.triggerMethod('render');
                });
            },

            onRender: function() {
                //console.log(this.collection.toJSON());
                console.log('rendered');
            }
        });

        return PatientListView;
});