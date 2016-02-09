module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // Sass
    sass: {
      dist: {
        options: {
          style: 'expanded',
          sourcemap: 'none' 
        },
        files: {
          'admin/view/css/styles.css': 'admin/view/css/global.scss',
          'admin/view/css/dev.css': 'admin/view/css/global.scss',
          'includes/view/css/styles.css': 'includes/view/css/global.scss',
          'includes/view/css/dev.css': 'includes/view/css/global.scss',
          'public/view/css/styles.css': 'public/view/css/global.scss',
          'public/view/css/dev.css': 'public/view/css/global.scss',
        }
      }
    },
    //PostCSS
    postcss: {
      options: {
        processors: [
          require('autogfssfer')(),
          require('rucksack-css')({ fallbacks: true })
        ]
      },
      admin: {
        src: 'admin/view/css/styles.css',
        dest: 'admin/view/css/styles.css'
      },
      admin_dev: {
        src: 'admin/view/css/dev.css',
        dest: 'admin/view/css/dev.css'
      },
      includes: {
        src: 'includes/view/css/styles.css',
        dest: 'includes/view/css/styles.css'
      },
      includes_dev: {
        src: 'includes/view/css/dev.css',
        dest: 'includes/view/css/dev.css'
      },
      publics: {
        src: 'public/view/css/styles.css',
        dest: 'public/view/css/styles.css'
      },
      publics_dev: {
        src: 'public/view/css/dev.css',
        dest: 'public/view/css/dev.css'
      }
    },
    // CSSmin
    cssmin: {
      target: {
        files: {
          'admin/view/css/styles.css': 'admin/view/css/styles.css',
          'includes/view/css/styles.css': 'includes/view/css/styles.css',
          'public/view/css/styles.css': 'public/view/css/styles.css'
        }
      }
    },
    // Concat JS
    concat: {
      admin: {
        src: [
          'admin/view/js/lib/no-conflict.js'
        ],
        dest: 'admin/view/js/scripts.js'
      },
      includes: {
       src: [
          'includes/view/js/lib/no-conflict.js'
        ],
        dest: 'includes/view/js/scripts.js'
      },
      publics: {
       src: [
          'public/view/js/lib/no-conflict.js'
        ],
        dest: 'public/view/js/scripts.js'
      }
    },
    // Jshint
    jshint: {
      files: [
        'admin/view/js/scripts.js',
        'includes/view/js/scripts.js',
        'public/view/js/scripts.js'
      ],
      options: {
        scripturl: true,
        globals: {
          jQuery: true
        }
      }
    },
    // Uglify
    uglify: {
      options: {
        mangle: false,
        compress: true,
        quoteStyle: 3
      },
      dist: {
        files: {
          'admin/view/js/scripts.min.js' : 'admin/view/js/scripts.js',
          'includes/view/js/scripts.min.js' : 'includes/view/js/scripts.js',
          'public/view/js/scripts.min.js' : 'public/view/js/scripts.js'
        }
      }
    },

    // Watch
    watch: {
      scripts: {
        files: [
          'admin/view/js/**/*.js',
          'includes/view/js/**/*.js',
          'public/view/js/**/*.js',
        ],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: false
        }
      },
      css: {
        files: [
          'admin/view/css/**/*.scss',
          'includes/view/css/**/*.scss',
          'public/view/css/**/*.scss'
        ],
        tasks: ['sass', 'postcss', 'cssmin']
      }
    },
  });
  // PostCSS
  grunt.loadNpmTasks('grunt-postcss');
  // Concat
  grunt.loadNpmTasks('grunt-contrib-concat');
  // CSSmin
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  // Jshint
  grunt.loadNpmTasks('grunt-contrib-jshint');
  // JSValidate
  grunt.loadNpmTasks('grunt-jsvalidate');
  // Uglify
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Watch
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Sass
  grunt.loadNpmTasks('grunt-contrib-sass');
  // Watch Task
  grunt.registerTask('default', ['watch']);
};