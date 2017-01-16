/**
 * Converts a string to a formatted date according to the current locale.
 */
app.filter('localeDate', function () {
    return function (dateString) {
        if (dateString) {
            var date = new Date(dateString);
            return date.toLocaleDateString();
        } else {
            return '';
        }
    };
});