<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador para renderizar la documentación pública.
 */
class DocumentacionController extends Controller
{
    public function show(Proyecto $proyecto, $moduloId = null, $submoduloId = null, $documentoId = null)
    {
        // Carga opcional de módulos, submódulos y documentos
        $proyecto->load('modulos.submodulos.documentos.recursos', 'configuracion');
        return Inertia::render('Docs/Show', [
            'proyecto' => $proyecto,
            'moduloId' => $moduloId,
            'submoduloId' => $submoduloId,
            'documentoId' => $documentoId,
        ]);
    }
}
