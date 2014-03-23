# A sample Guardfile
# More info at https://github.com/guard/guard#readme

# This will concatenate the javascript files specified in :files to public/js/all.js
guard :concat, type: "js", files: %w(), input_dir: "public/js", output: "public/js/all"

guard :concat, type: "css", files: %w(), input_dir: "public/css", output: "public/css/all"

guard 'sass', :input => 'sass', :output => 'css'

guard 'uglify', :destination_file => "public/javascripts/application.js" do
  watch (%r{app/assets/javascripts/application.js})
end
