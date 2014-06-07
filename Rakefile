#!usr/bin/env ruby
require 'rainbow'
require 'uglifier'
require 'open-uri'

namespace :build do
  desc 'Sass'
  task :sass do
    if system('sass --style compressed app/assets/stylesheets/application.scss:public/assets/application.css')
      puts Rainbow('Sass building success.').green
    else
      puts Rainbow('Failed').red
    end
  end
  desc 'Uglify'
  task :uglify do
    File.write(File.dirname(__FILE__) + '/public/assets/application.js', Uglifier.compile(File.read('public/assets/application.js')))
  end
  desc 'Component'
  task :component do
  end
  desc 'Test'
  task :test do
    system('./vendor/bin/phpunit')
  end
end

task :test do
  system('./vendor/bin/phpunit')
end
