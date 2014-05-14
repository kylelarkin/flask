# -*- mode: ruby -*-

# A sample Guardfile
# More info at https://github.com/guard/guard#readme

require 'coffee_script'

theme_folder = 'wp-content/themes/flask'

unless File.directory?(theme_folder)
	puts "\nTHEME FOLDER DOESN'T EXIST\n\n"
	exit
end

guard 'sass',
	:load_paths => ["#{theme_folder}/sass", "vendor/bourbon", "vendor/bower_components", "vendor/neat"],
	:input => "#{theme_folder}/sass",
	:output => "#{theme_folder}/css",
	:all_on_start => true,
	:quiet => true,
	:style => :nested

guard 'sprockets', :destination => "#{theme_folder}/js/public", :asset_paths => ["#{theme_folder}/js/", 'vendor/bower_components'], :minify => true do
	watch(%r{#{theme_folder}/.+\.(js|coffee)$}) { "#{theme_folder}/js/script.js" }
end

guard 'livereload' do
	watch(%r{#{theme_folder}/.+\.(erb|haml|slim|php|css|js)$})
end