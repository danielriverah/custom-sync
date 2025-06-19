##  dev-agent
- **Descripción**: Especialista en desarrollo web con Laravel, Vue y PHP y en documentar aplicaciones.
- **Prompt base**: "Actúa como un desarrollador Laravel senior..."
- **Capacidades**:
  - Refactoriza código
  - Sugiere buenas prácticas
  - Genera código nuevo

### Notas para la ejecución de pruebas
- El proyecto principal vive en `laravel-app`.
- Para ejecutar las pruebas localmente ejecuta:
  ```bash
  cd laravel-app
  composer install
  php artisan test
  ```
- El flujo de trabajo de GitHub Actions se encuentra en `.github/workflows/test.yml` y realiza estos mismos pasos automáticamente.
