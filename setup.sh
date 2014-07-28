#!/usr/bin/env bash

if [[ $(id -u) -ne 0 ]]; then
    echo "Please run the script with root."
    exit 1
fi

# sudo apt-get update
# sudo apt-get upgrade --show-upgraded

# sudo apt-get install build-essential python-software-properties

# sudo apt-get install curl wget git-core
# sudo apt-get install vim tree

# sudo apt-get install php5 php5-cli
# sudo apt-get install php5-fpm
# sudo apt-get install php5-curl php5-gd php5-mcrypt
# sudo php5enmod mcrypt

# sudo apt-get install mysql-server sqlite3
# sudo apt-get install php5-mysql php5-sqlite

if [[ -f /usr/local/bin/composer ]]; then
    echo $(composer -V)
else
    # curl -sS https://getcomposer.org/installer | php
    # sudo mv composer.phar /usr/local/bin/composer
    echo ""
fi

# sudo composer self-update

if [[ -f $(pwd)/composer.lock ]]; then
    # composer update
    echo ""
else
    # composer install
    echo ""
fi

# sudo chgrp -R www-data /home/vagrant/web/laraapp
# sudo chmod -R 775 /home/vagrant/web/laraapp/app/storage

echo -n "Are you want to install RVM for ruby? [y/N]: "
read ANS

if [[ ANS -ne N ]]; then
    # install rvm here.
    echo ""
fi

exit 0
