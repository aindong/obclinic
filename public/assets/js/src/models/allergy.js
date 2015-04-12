define(['backbone', 'marionette'], function (Backbone, Marionette) {
    var Allergy = Marionette.Model.extend({
        default: {
            'type': '',
            'name': ''
        }
    });

    return Allergy;
});