# A sample Guardfile
# More info at https://github.com/guard/guard#readme

theme_folder = 'wp-content/themes/flask'

guard 'sass',
:input => "#{theme_folder}/sass",
:output => "#{theme_folder}/css",
:all_on_start => true,
:compass => true,
:compass => {
	:http_path => "/",
	:css_dir => "#{theme_folder}/css",
	:sass_dir => "#{theme_folder}/sass",
	:images_dir => "#{theme_folder}/img",
	:javascripts_dir => "#{theme_folder}/js",
	:output_style => :compressed,
	:environment => :development,
	:relative_assets => true,
	:line_comments => false,
	:color_output => false,
}

guard 'sprockets', :destination => "#{theme_folder}/js/public", :asset_paths => ["#{theme_folder}/js/", 'bower_components/'], :minify => true, :root_file => '#{theme_folder}/js/public/script.min.js' do
	watch(%r{#{theme_folder}/.+\.(js)$})
end

guard 'livereload' do
	watch(%r{#{theme_folder}/.+\.(erb|haml|slim|php|css|js)$})
end