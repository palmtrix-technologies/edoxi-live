module.exports = function(grunt) {
grunt.initConfig({
pkg: grunt.file.readJSON('package.json'),
cssmin: {
  target: {
    files: [{
      expand: true,
      cwd: 'assets/css',
      src: ['*.css', '!*.min.css'],
      dest: 'assets/css',
      ext: '.min.css'
    }]
  }
},
uglify: {
    options: {
      mangle: true
    },
		my_target: {
		files: {
				'assets/js/home.min.js': ['assets/js/home.js'], // destination first and source second
				'assets/js/corporate-training.min.js': ['assets/js/corporate-training.js'], 
				'assets/js/courses.min.js': ['assets/js/courses.js'], // destination first and source second
				'assets/js/gallery.min.js': ['assets/js/gallery.js'], // destination first and source second
				'assets/js/globals.min.js': ['assets/js/globals.js'], // destination first and source second
		}
		}
}
});
grunt.loadNpmTasks('grunt-contrib-uglify-es'); // loading the ugify Task	
grunt.loadNpmTasks('grunt-contrib-cssmin');	// loading the cssmin Task
grunt.registerTask('default', ['cssmin','uglify']); // register both task together
};