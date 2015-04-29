App.Models.Queue = (function (App) {
    'use strict';

    var Queue = Backbone.Model.extend({
        default: {
            'id': '',
            'arrival': '',
            'patient_no': '',
            'vitalsign_id': '',
            'reservation_type': ''
        }
    });

    return Queue;
}(window.App));