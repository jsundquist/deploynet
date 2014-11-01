module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bower_concat: {
            all: {
                dest: 'build/_bower.js',
                cssDest: 'build/_bower.css',
                exclude: [
                    'jquery',
                    'modernizr'
                ],
                dependencies: {
                    'underscore': 'jquery',
                    'backbone': 'underscore',
                    'jquery-mousewheel': 'jquery'
                },
                bowerOptions: {
                    relative: false
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-bower-concat');

    // Default task(s).
    grunt.registerTask('default', ['bower_concat']);

};