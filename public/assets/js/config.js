require.config({
    baseUrl: 'assets/js/src',
    deps: ['main'],
    paths: {
        'underscore': '../../../packages/underscore/underscore',
        'backbone': '../../../packages/backbone/backbone',
        'marionette': '../../../packages/marionette/backbone.marionette'
    },
    shim: {
        backbone: {
            deps: ['underscore'],
            exports: 'backbone'
        },
        marionette: {
            deps: ['backbone'],
            exports: 'marionette'
        }
    }
});