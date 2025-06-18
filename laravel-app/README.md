# Laravel Git-FTP Skeleton

Este es un esqueleto de proyecto que ilustra la estructura básica para un servicio de Git-FTP.

Debido a las limitaciones del entorno actual, no se ejecutó `composer` ni `npm` para instalar Laravel, Jetstream o Vue. Se recomienda ejecutar `composer install` y seguir la documentación oficial de Laravel para configurar un proyecto real.

## Estructura inicial para Documentación de Proyectos

Este proyecto incluye modelos, controladores, migraciones y rutas básicas para un sistema de documentación de proyectos con módulos y submódulos. Se utiliza Laravel con Inertia.js y Vue 3.

### Rutas principales
- Panel administrativo bajo `/admin` con CRUD para proyectos, módulos, submódulos, documentos y recursos.
- Vista pública de la documentación: `/proyecto/{slug}/{modulo?}/{submodulo?}/{documento?}`.

### Ejecución inicial
1. Ejecuta `composer install` y `npm install` si es necesario.
2. Configura la base de datos en `.env` y ejecuta `php artisan migrate --seed` para crear tablas y datos de ejemplo.

Las vistas de Vue están en `resources/js/Pages` para que puedas personalizarlas fácilmente.
