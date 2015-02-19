'use strict';
module.exports = function(grunt) {
  // load all tasks
  require('load-grunt-tasks')(grunt);
  // show elapsed time
  require('time-grunt')(grunt);

  grunt.initConfig({
    sass: {
      dev: {
        options: {
          outputStyle: 'nested'
        },
        files: {
          'assets/css/main.css': [
            'assets/sass/main.scss'
          ]
        }
      },
      build: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'assets/css/main.min.css': [
            'assets/sass/main.scss'
          ]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        options: {
          map: {
            prev: 'assets/css/'
          }
        },
        src: 'assets/css/main.css'
      },
      build: {
        src: 'assets/css/main.min.css'
      }
    },
    watch: {
      sass: {
        files: [
          'assets/sass/*.scss',
          'assets/sass/**/*.scss'
        ],
        tasks: ['sass:dev']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/main.css',
          'page-templates/*.php',
          'templates/**/*.php',
          '*.php'
        ]
      }
    },
  });

  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);
  grunt.registerTask('build', [
    'sass:build',
    'autoprefixer:build'
  ]);
};