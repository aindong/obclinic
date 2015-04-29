App.Models.Patient = (function (App) {
    'use strict';

    var Patient = Backbone.Model.extend({
        defaults: {
            'patient_no': '',
            'firstname': 'Ann',
            'lastname': 'Laurens',
            'middlename': 'M',
            'address': '795 Folsom Ave, San Francisco, CA 94107',
            'birthdate': '',
            'contactno': '567-890-1234',
            'email': 'ann@laurens.com',
            'picture': 'avatar9463a.jpg'
        }

    });

    return Patient;
}(window.App));