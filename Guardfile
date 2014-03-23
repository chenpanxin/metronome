# For Sass
guard 'sass',
  :style => :compressed,
  :input => 'app/assets/stylesheets',
  :output => 'public/assets'

# For Javascript
guard :concat,
  type: 'js',
  files: %w(jquery script),
  input_dir: 'app/assets/javascripts',
  output: 'public/assets/all'

guard 'uglify',
  :destination_file => 'public/javascripts/application.js' do
  watch (%r{app/assets/javascripts/application.js})
end