<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador CRUD para documentos.
 */
class DocumentoController extends Controller
{
    public function index(Modulo $modulo)
    {
        $documentos = $modulo->documentos;
        return Inertia::render('Documents/Index', [
            'modulo' => $modulo,
            'documentos' => $documentos,
        ]);
    }

    public function create(Modulo $modulo)
    {
        return Inertia::render('Documents/Create', [
            'modulo' => $modulo,
        ]);
    }

    public function store(Request $request, Modulo $modulo)
    {
        $data = $request->validate([
            'titulo' => 'required|max:150',
            'contenido' => 'nullable',
            'orden' => 'integer',
        ]);
        $data['modulo_id'] = $modulo->modulo_id;
        Documento::create($data);
        return redirect()->route('admin.modulos.documentos.index', $modulo);
    }

    public function edit(Modulo $modulo, Documento $documento)
    {
        return Inertia::render('Documents/Edit', [
            'modulo' => $modulo,
            'documento' => $documento,
        ]);
    }

    public function update(Request $request, Modulo $modulo, Documento $documento)
    {
        $data = $request->validate([
            'titulo' => 'required|max:150',
            'contenido' => 'nullable',
            'orden' => 'integer',
        ]);
        $documento->update($data);
        return redirect()->route('admin.modulos.documentos.index', $modulo);
    }

    public function destroy(Modulo $modulo, Documento $documento)
    {
        $documento->delete();
        return redirect()->route('admin.modulos.documentos.index', $modulo);
    }
}
