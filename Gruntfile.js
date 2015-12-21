'use strict';

module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		project: {
			app      : [''],
			assets   : ['<%= project.app %>assets'],
			src      : ['<%= project.app %>src'],
			css      : ['<%= project.src %>/sass/style.scss'],
			vendorJS : [
				//'bower_components/fastclick/lib/fastclick.js',
				//'bower_components/jquery-placeholder/jquery.placeholder.js',
				//'bower_components/jquery-cookie/jquery.cookie.js',
				//'bower_components/modernizr/modernizr.js',
				//'bower_components/foundation/js/foundation.min.js',
				//'bower_components/fullscreener/src/jquery.fullscreener.min.js',
				//'bower_components/FlexSlider/jquery.flexslider-min.js',
				//'bower_components/fitvids/jquery.fitvids.js',
				//'bower_components/wow/dist/wow.min.js'
			]
		},

		sass: {
			dev: {
				options: {
					outputStyle: 'expanded',
					compass: false
				},
				files: {
					'style.css':'<%= project.css %>'
				}
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					compass: false
				},
				files: {
					'style.css':'<%= project.css %>'
				}
			}
		},

		uglify: {
			js: {
				src: '<%= project.vendorJS %>',
				dest: '<%= project.assets %>/javascripts/vendor.js',
			}
		},

		sync: {
			main: {
				files: [
					{
						expand: true,
						flatten: true,
						src: 'bower_components/fastclick/lib/fastclick.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/jquery-placeholder/jquery.placeholder.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/jquery.cookie/jquery.cookie.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/modernizr/modernizr.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/foundation/js/foundation.min.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/fullscreener/src/jquery.fullscreener.min.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/FlexSlider/jquery.flexslider-min.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/fitvids/jquery.fitvids.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
					{
						expand: true,
						flatten: true,
						src: 'bower_components/wow/dist/wow.min.js',
						dest: '<%= project.assets %>/javascripts/vendors/',
					},
				],
			}
		},

		watch: {
			gruntfile: {
				files: 'Gruntfile.js',
				tasks: ['uglify:js']
			},

			sass: {
				files: '<%= project.src %>/sass/**/*.{scss,sass}',
				tasks: ['sass:dev']
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-sync');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('build', ['sass:dist', 'uglify:js', 'sync:main']);

	grunt.registerTask('default', ['build', 'watch','sync:main']);
};