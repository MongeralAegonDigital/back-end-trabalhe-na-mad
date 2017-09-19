module.exports = function(grunt) {
    
    /**
     * Grunt config.
     */
    grunt.initConfig({
        uglify: {
            js: {
                files: {
                    'web/js/scripts.min.js': ['web/js/scripts.js']
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: - 1
            },
            target: {
                files: {
                    'web/css/styles.min.css': ['web/css/styles.css']
                }
            }
        },
        concat: {
            css: {
                src: ['web/assets/css/**/*.css'],
                dest: 'web/css/styles.css',
            },
            js: {
                src: ['web/assets/js/**/*.js'],
                dest: 'web/js/scripts.js',
            }
        },
        watch: {
            css: {
                files: ['web/assets/css/**/*.css'],
                tasks: ['concat:css', 'cssmin']
            },
            js: {
                files: ['web/assets/js/**/*.js'],
                tasks: ['concat:js', 'uglify']
            }
        }
    });
    
    
    /**
     * Minify JS files.
     */
    grunt.loadNpmTasks('grunt-contrib-uglify');
    
    /**
     * Minify CSS files.
     */
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    
    /**
     * Concat files.
     */
    grunt.loadNpmTasks('grunt-contrib-concat');
    
    /**
     * Watch css and js files.
     * If any file changes, we concat and minify.
     */
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    /**
     * Dev task: concat and watch files.
     */
    grunt.registerTask('dev', ['concat', 'watch']);
    
    /**
     * Prod task: concat and minify.
     */
    grunt.registerTask('prod', ['concat', 'uglify', 'cssmin']);
    
};
