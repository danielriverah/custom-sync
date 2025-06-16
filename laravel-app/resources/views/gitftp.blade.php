<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git FTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>
<body class="p-8">
    <h1 class="text-2xl mb-4">Servicio Git-FTP</h1>
    <form class="mb-4">
        <label class="block">Ruta local del repositorio</label>
        <input type="text" class="border p-2 w-full" placeholder="/ruta/a/proyecto" />
    </form>

    <div class="mb-4">
        <label class="block">Selecciona una rama</label>
        <select class="border p-2 w-full">
            <option>main</option>
            <!-- Otras ramas -->
        </select>
    </div>

    <div class="mb-4">
        <h2 class="text-xl">Cambios por subir</h2>
        <ul class="list-disc ml-6">
            <!-- Lista de archivos diferentes -->
            <li>example.txt</li>
        </ul>
    </div>

    <div>
        <h2 class="text-xl">Configuraci&oacute;n FTP de la rama</h2>
        <form>
            <label class="block">FTP URL</label>
            <input type="text" class="border p-2 w-full" placeholder="ftp://example.com" />
        </form>
    </div>
</body>
</html>
