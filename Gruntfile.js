'use strict';
module.exports = function(grunt) {
  // load all tasks
  require('load-grunt-tasks')(grunt);
  // show elapsed time
  require('time-grunt')(grunt);
  // any vendor plugins added to list below must be
  // prefixed with '_' to be compiled into scripts.js
  var jsFileList = [
    'assets/js/concat/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/**/*.min.*'
      ]
    },
    sass: {
      dev: {
        options: {
          outputStyle: 'expanded',
          compass: true
        },
        files: {
          'assets/css/main.css': [
            'assets/scss/main.scss'
          ]
        }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          compass: true
        },
        files: {
          'assets/css/main.min.css': [
            'assets/scss/main.scss'
          ]
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/scripts.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [jsFileList]
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
          'assets/scss/**/*.scss'
        ],
        tasks: ['sass:dev']
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/main.css',
          'assets/js/scripts.js',
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
    'jshint',
    'concat'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify'
  ]);
};