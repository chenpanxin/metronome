#!usr/bin/env ruby
require 'rainbow'
require 'uglifier'

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
    if Uglifier.new.compile(File.read('app/assets/javascripts/application.js'))
    else
    end
  end
end
