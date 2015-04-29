App.Helpers.Images = (function(App) {
    'use strict';

    function ImgToBase64(url, callback, outputFormat) {
        var canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d'),
            img = new Image;

            img.crossOrigin = 'Anonymous';
            img.onload = function() {
                canvas.height = img.height;
                canvas.width = img.width;
                ctx.drawImage(img,0,0);
                var dataURL = canvas.toDataURL(outputFormat || 'image/png');
                callback.call(this, dataURL);

                // Clean up
                canvas = null;
            };
        img.source = url;
    }

    return {
        ImgToBase64: ImgToBase64
    }
}(window.App));