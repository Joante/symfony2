#1/bin/bash
sudo /var/www/html/joan/composer install
sudo /var/www/html/joan/app/console doctrine:database:drop --force
sudo /var/www/html/joan/app/console doctrine:database:create
sudo /var/www/html/joan/app/console doctrine:schema:update --force
sudo /var/www/html/joan/app/console cache:clear 