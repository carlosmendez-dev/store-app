# Hola, este es el script de instalacion de el proyecto
# Para ejecutar este script usa: 'sh install.sh'
composer install # instalar las dependencias de php
npm install # instalar las dependencias de javascript

cp .env.example .env # crear el .env apartir de la copia de .env.example
php artisan key:generate # generar la clave de seguridad

php artisan migrate # hacer la migracion de la base de datos

composer run dev # ejecutar el proyecto