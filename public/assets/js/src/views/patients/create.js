define(['marionette'], function(Marionette) {
    'use strict';

    var PatientForm = Marionette.View.extend({
        el: '#createForm',

        events: {
            'submit': 'createPatient'
        },

        createPatient: function(e) {
            e.preventDefault();

            var img = function(base64image) {
                console.log(base64image);
            };

            $.ajax({
                url: '/media',
                data: this.$el.serialise(),
                success: function(data) {
                    var patient = this.collection.create({
                        patient_no: this.$('#patient_no').val(),
                        firstname: this.$('#firstname').val(),
                        lastname: this.$('#lastname').val(),
                        middlename: this.$('#middlename').val(),
                        address: this.$('#address').val(),
                        birthdate: this.$('#birthdate').val(),
                        contactno: this.$('#contactno').val(),
                        email: this.$('#email').val(),
                        picture: data.name
                    }, { wait: true });

                    console.log(patient);
                }
            });
            //this.collection.save();
        }
    });

    return PatientForm;
});