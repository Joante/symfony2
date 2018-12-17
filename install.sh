#1/bin/bash
/var/www/html/joan/composer install
/var/www/html/app/console doctrine:database:drop --force
/var/www/html/app/console doctrine:database:create
/var/www/html/app/console doctrine:schema:update --force
/var/www/html/app/console cache:clear 