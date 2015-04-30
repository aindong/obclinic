App.Helpers.Loader = (function() {

    // Initial object
    var c = {};

    c.show = function() {
        $('#loader').show();
    };

    c.hide = function () {
        $('#loader').hide();
    };

    return c;
}());