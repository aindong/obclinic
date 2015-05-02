App.Views.Patients = (function(App) {
    'use strict';

        // Instance of the collection
        var patients = new App.Collections.Patients();

        var Create = Marionette.View.extend({
            el: '#createForm',

            events: {
                'submit': 'createPatient'
            },

            createPatient: function(e) {
                e.preventDefault();

                var patient = this.collection.create({
                    patient_no: this.$('#patient_no').val(),
                    firstname: this.$('#firstname').val(),
                    lastname: this.$('#lastname').val(),
                    middlename: this.$('#middlename').val(),
                    address: this.$('#address').val(),
                    birthdate: this.$('#birthdate').val(),
                    contactno: this.$('#contactno').val(),
                    email: this.$('#email').val()
                }, { wait: true });

                console.log(patient);
                //this.collection.save();
            }
        });

        // View
        var List = Marionette.View.extend({
            el: $('#content'),

            initialize: function() {
                this.collection.on('sync', this.render, this);

                var patientCreateForm = new Create({ collection: patients });
            },

            collection: patients,

            render: function() {
                var self = this;

                $.get('/assets/templates/patients/index.tpl.html', function(data) {
                    var template = Handlebars.compile(data);
                    var html = template({ patients: self.collection.toJSON() });
                    self.$el.html(html);

                    App.Helpers.Loader.hide();
                    return self;
                });
            },

            onBeforeRender: function() {
                var self = this;
                this.collection.fetch().then(function() {
                    self.triggerMethod('render');
                });
            },

            onRender: function() {
                //console.log(this.collection.toJSON());
                console.log('rendered');
                this.render();
            }
        });

        return {
            List: List
        };
}(window.App));