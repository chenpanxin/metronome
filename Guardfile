#!usr/bin/env ruby

UI.info 'Guard is using PHP Artisan Command to concat files.'

watch %r{^app/assets/(.+)\.js$} do
  system('php artisan asset:concat')
  UI.info 'PHP Artisan Command concat files to application.js.'
end

guard 'sass',
  :style => :compressed,
  :input => 'app/assets/stylesheets',
  :output => 'public/assets'
