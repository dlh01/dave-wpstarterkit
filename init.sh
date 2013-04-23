#!/bin/bash

read -p "
=> Create new Git repository? (y/N)
> " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo -e "\n"
    rm -rf ./.git
    git init
fi

read -p "
=> Remove Starter Kit README? (y/N)
> " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo -e "\n"
    rm README.markdown
fi

echo '=> Moving `*-config-sample.php` to `*-config.php`'
mv ./local-config-sample.php ./local-config.php
mv ./wp-config-sample.php ./wp-config.php
echo 'Done'

echo '=> Installing core to `./wordpress`'
wp core download --path=wordpress
echo 'Done'

read -p "
=> Remove this installation script? (y/N)
> " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo -e "\n"
    rm init.sh
fi

echo -e "\n"
echo '=> Getting keys and salts from wordpress.org'
curl http://api.wordpress.org/secret-key/1.1/salt