!(function () {
    'use strict';
    module.exports = function (grunt) {
         var cssFiles;
         const sass = require('node-sass'); 
        grunt.initConfig({
            pkg: grunt.file.readJSON('package.json'),
            sass: {
                options: {
                   implementation: sass,
                   sourceMap: true,
                   outputStyle: 'compressed', 
               },
                dist: {
                    files: [{
                        expand: true,
                        cwd: 'scss',
                        src: ['*.scss'],
                        dest: 'css',
                        ext: '.min.css'
                    }]
                   
                },             
            },
            watch: {
                scripts: {
                    files: [
                    'scss/***/*.scss','scss/**/*.scss','scss/*/*.scss',
                    ['Gruntfile.js']],
                    tasks: ['sass']

                }
            }

        });
        grunt.loadNpmTasks('grunt-contrib-cssmin');
        grunt.loadNpmTasks('grunt-sass');
        grunt.loadNpmTasks('grunt-contrib-watch');
        grunt.registerTask('default', ['sass','watch']);
    };
})();