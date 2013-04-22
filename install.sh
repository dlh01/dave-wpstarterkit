#!/bin/bash

echo '
-----------------------------------------------------------
Installing wordpress to `./wordpress`
-----------------------------------------------------------'
wp core download --path=wordpress

echo '
-----------------------------------------------------------
Generating keys and salts
-----------------------------------------------------------'
curl http://api.wordpress.org/secret-key/1.1/salt