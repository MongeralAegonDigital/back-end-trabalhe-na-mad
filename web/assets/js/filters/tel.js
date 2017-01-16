/**
 * Converts a formatted phone number to integer.
 */
app.filter('tel', function () {
    return function (phoneString) {
        if (phoneString) {
            return '+55' + phoneString.replace(/[^0-9]+/g, '');
        } else {
            return '';
        }
    };
});