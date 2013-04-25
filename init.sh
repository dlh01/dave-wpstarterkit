#!/bin/bash

echo -n "
/**
 * Welcome. This script will:
 *   - Download core to \`./wordpress\`
 *   - Move \`*-config-sample.php\` to \`*-config.php\`
 *   - Remove the Starter Kit Git repository and initialize a new one
 *   - Remove the Starter Kit README
 *   - Remove this script
 */

Do you want to continue? "

select result in Yes No; do
if [[ $result == 'Yes' ]]; then
  echo ""
  wp core download --path=wordpress
  mv ./local-config-sample.php ./local-config.php
  mv ./wp-config-sample.php ./wp-config.php
  rm -rf ./.git
  git init
  rm README.markdown
  rm init.sh
  echo "
/* Finished setting up. Have fun! */"
   break;
else
  echo "Canceled."
  break;
fi
done
