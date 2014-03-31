module.exports = (grunt) ->
  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')
    uglify:
      options:
        banner: '/*! <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      build:
        src: 'app/assets/javascripts/application.js'
        dest: 'public/assets/application.js'
  grunt.loadNpmTasks 'grunt-contrib-uglify'
  grunt.registerTask 'default', ['uglify']
