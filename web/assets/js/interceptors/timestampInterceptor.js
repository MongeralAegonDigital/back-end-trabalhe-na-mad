app.factory('timestampInterceptor', function() {
    return {
        request: function (config) {
            var regexp = new RegExp('^templates');
            if (regexp.test(config.url)) {
                var time = new Date().getTime();
                config.url += '?timestamp=' + time;
            }
            return config;
        }
    };
});