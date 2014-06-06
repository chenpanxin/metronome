guard 'sass',
  :style => :compressed,
  :input => 'app/assets/stylesheets',
  :output => 'public/assets'

watch(%r{^app/assets/(.+)\.js$}) do
  system('php artisan asset:concat')
  UI.info 'Concat files done.'
end
