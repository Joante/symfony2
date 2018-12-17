#1/bin/bash
sudo su
/var/www/html/joan/composer install
/var/www/html/joan/app/console doctrine:database:drop --force
/var/www/html/joan/app/console doctrine:database:create
/var/www/html/joan/app/console doctrine:schema:update --force
/var/www/html/joan/app/console cache:clear 