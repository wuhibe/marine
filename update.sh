git pull
composer install
php artisan migrate --no-interaction
php artisan config:cache
php artisan config:clear
php artisan cache:clear
clear
echo "Setup completed successfully!"
