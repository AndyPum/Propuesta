# Instalar un nuevo Repositorio :

# Paso 1

composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build

# Paso 2

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=yodapp
DB_USERNAME=root
DB_PASSWORD=

# Paso 3

php artisan storage:link
php artisan migrate
php artisan db:seed

# Paso 4

php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan view:clear
php artisan serve

########################################
SE NECESITA CREAR UN USUARIO MANUALMENTE
########################################