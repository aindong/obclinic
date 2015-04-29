App.Models.Allergy = (function (App) {
    'use strict';

    var Allergy = Backbone.Model.extend({
        default: {
            'type': '',
            'name': ''
        }
    });

    return Allergy;
}(window.App));