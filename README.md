# Nombre del Proyecto

Sistema Academico

## Requisitos

- PHP 7.3 o superior
- Composer
- Laravel 8 o superior
- MySQL o el sistema de gestión de bases de datos de tu elección

## Instalación

1. Clona este repositorio en tu máquina local:

   ```bash
   git clone https://github.com/WaynerEP/sistemaAcademico.git

2. Navega al directorio del proyecto:

   ```bash
   cd tuproyecto

3. Instala las dependencias del proyecto utilizando Composer:

   ```bash
   composer install

4. Copia el archivo .env.example y renómbralo a .env. Luego, configura tu archivo .env con la información de tu base de datos y otras configuraciones relevantes.

5. Genera una nueva clave de aplicación:

   ```bash
   php artisan key:generate

6. Ejecuta las migraciones de la base de datos para crear las tablas necesarias:
    
   ```bash
   php artisan migrate
   php artisan db:seed

7. Inicia el servidor de desarrollo:
    
    ```bash
   npm run dev
   php artisan serve

8. Accede a tu aplicación en http://localhost:8000 

