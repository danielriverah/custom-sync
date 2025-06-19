# custom-sync

Aplicación utilizada para sincronizar bases de datos y Git-FTP.

## Estructura del repositorio

- **laravel-app/**: proyecto principal en Laravel que incluye el panel administrativo para gestionar proyectos, módulos, submódulos, documentos y recursos.
- **db-sync/**: proyecto base de ejemplo generado con Laravel.

## Cómo agregar módulos y submódulos

Dentro de `laravel-app` encontrarás todo lo necesario para crear y administrar la documentación de un proyecto.

1. Instala las dependencias:
   ```bash
   cd laravel-app
   composer install
   npm install
   ```
2. Copia `.env.example` a `.env` y configura tu base de datos.
3. Ejecuta las migraciones y seeders para crear datos de ejemplo:
   ```bash
   php artisan migrate --seed
   ```
4. Levanta el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
5. Ingresa a `http://localhost:8000/admin` para crear proyectos, módulos, submódulos, documentos y recursos a través del panel.

La vista pública de la documentación está disponible en:
`/proyecto/{slug}/{modulo?}/{submodulo?}/{documento?}`.
