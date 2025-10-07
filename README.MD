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

# usuario inicial

admin@admin.com
admin

# Migraciones

php artisan make:seeder SucursalSeeder
php artisan make:migration create_stock_table --create=
php artisan make:migration create_felplex_credentials_table
php artisan make:migration create_proveedores_table --create=proveedores
php artisan migrate:rollback --path=/database/migrations/2025_04_27_032325_create_log_table.php

# Seeder solo uno

php artisan db:seed --class=RolesSeeder
php artisan db:seed
php artisan migrate:fresh --seed
php artisan migrate --path=database/migrations/2025_08_12_044605_create_felplex_credential_table.php

# Carpetas estructura

php artisan make:livewire comentarios/index
php artisan make:livewire comentarios/tabla
php artisan make:livewire comentarios/crear
php artisan make:livewire comentarios/totales
php artisan make:livewire comentarios/graficos
php artisan make:livewire comentarios/ver

# Componentes con controlladores

php artisan make:livewire empresa
php artisan make:livewire usuarios
php artisan make:livewire clientes
php artisan make:livewire porveedores
php artisan make:livewire productos
php artisan make:livewire tickets
php artisan make:livewire facturas_compras
php artisan make:livewire facturas_ventas
php artisan make:livewire ventas
php artisan make:livewire comentarios
php artisan make:livewire notificacion
php artisan make:livewire log
php artisan make:livewire ver_ticket
php artisan make:livewire ver_producto
php artisan make:livewire ver_usuario
php artisan make:livewire ver_cliente
php artisan make:livewire ver_proveedor
php artisan make:livewire ver_compra
php artisan make:livewire ver_venta
php artisan make:livewire ver_servicio

# Modelos

php artisan make:model Empresa
php artisan make:model User //se crea en la instalacion
php artisan make:model Empleado
php artisan make:model Cliente
php artisan make:model Porveedor
php artisan make:model Producto
php artisan make:model Ticket
php artisan make:model facturas_compras
php artisan make:model facturas_ventas
php artisan make:model Venta
php artisan make:model Comentario
php artisan make:model Notificacion
php artisan make:model FacturaProducto

#backup

/bin/php artisan backup:run
