define(['backbone', 'marionette'], function (Backbone, Marionette) {
    var Queue = Marionette.Model.extend({
        default: {
            'id': '',
            'arrival': '',
            'patient_no': '',
            'vitalsign_id': '',
            'reservation_type': ''
        }
    });
});