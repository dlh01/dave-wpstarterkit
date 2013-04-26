#!/bin/bash

echo -n "
/**
 * Welcome. This script will:
 *   - Download core to \`./wordpress\`
 *   - Copy files in \`./wordpress/wp-content/\` to \`./content\`
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
  /bin/cp -r ./wordpress/wp-content/* content
  /bin/mv ./local-config-sample.php ./local-config.php
  /bin/mv ./wp-config-sample.php ./wp-config.php
  /bin/rm -rf ./.git
  git init
  /bin/rm README.markdown
  /bin/rm setup.sh
  echo "
/* Finished setting up. Have fun! */
"
   break;
else
  echo "Canceled."
  break;
fi
done
