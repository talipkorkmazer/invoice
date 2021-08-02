# INVOICE

composer install

npm install

### Create .env.local file content:

KERNEL_CLASS='App\Kernel'

APP_SECRET='$ecretf0rt3st'

SYMFONY_DEPRECATIONS_HELPER=999999

PANTHER_APP_ENV=panther

DATABASE_URL=mysql://talip:pass@127.0.0.1:3306/invoice?serverVersion=5.7


### php bin/console doctrine:database:create

### php bin/console doc:mig:mig

### npm run watch

## Start the project on 8000 port
### php -S localhost:8000 -t public/
