<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador CRUD para recursos asociados a un documento.
 */
class RecursoController extends Controller
{
    public function index(Documento $documento)
    {
        $recursos = $documento->recursos;
        return Inertia::render('Resources/Index', [
            'documento' => $documento,
            'recursos' => $recursos,
        ]);
    }

    public function create(Documento $documento)
    {
        return Inertia::render('Resources/Create', ['documento' => $documento]);
    }

    public function store(Request $request, Documento $documento)
    {
        $data = $request->validate([
            'tipo' => 'required|in:imagen,video,ayuda',
            'url' => 'required|max:500',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $documento->recursos()->create($data);
        return redirect()->route('admin.documentos.recursos.index', $documento);
    }

    public function edit(Documento $documento, Recurso $recurso)
    {
        return Inertia::render('Resources/Edit', [
            'documento' => $documento,
            'recurso' => $recurso,
        ]);
    }

    public function update(Request $request, Documento $documento, Recurso $recurso)
    {
        $data = $request->validate([
            'tipo' => 'required|in:imagen,video,ayuda',
            'url' => 'required|max:500',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $recurso->update($data);
        return redirect()->route('admin.documentos.recursos.index', $documento);
    }

    public function destroy(Documento $documento, Recurso $recurso)
    {
        $recurso->delete();
        return redirect()->route('admin.documentos.recursos.index', $documento);
    }
}
