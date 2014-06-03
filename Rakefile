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
    if Uglifier.new.compile(File.read('app/assets/javascripts/application.js'))
    else
    end
  end
  desc 'Component'
  task :component do
    component = []
    ['jquery', 'jquery.timeago', 'jquery.autosize', 'underscore'].each do |name|
      open("https://raw.githubusercontent.com/Menglr/component/master/src/#{name}.js") { |f| component << f.read }
    end
    File.write(File.dirname(__FILE__) + '/public/assets/component.js', component.join("\n"))
  end
  desc 'Test'
  task :test do
    system('./vendor/bin/phpunit')
  end
end

task :test do
  system('./vendor/bin/phpunit')
end
