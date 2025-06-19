<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador CRUD para módulos.
 */
class ModuloController extends Controller
{
    public function index(Proyecto $proyecto)
    {
        $modulos = $proyecto->modulos()->get();
        return Inertia::render('Modules/Index', [
            'proyecto' => $proyecto,
            'modulos' => $modulos,
        ]);
    }

    public function create(Proyecto $proyecto)
    {
        return Inertia::render('Modules/Create', ['proyecto' => $proyecto]);
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $proyecto->modulos()->create($data);
        return redirect()->route('admin.proyectos.modulos.index', $proyecto);
    }

    public function edit(Proyecto $proyecto, Modulo $modulo)
    {
        return Inertia::render('Modules/Edit', [
            'proyecto' => $proyecto,
            'modulo' => $modulo,
        ]);
    }

    public function update(Request $request, Proyecto $proyecto, Modulo $modulo)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $modulo->update($data);
        return redirect()->route('admin.proyectos.modulos.index', $proyecto);
    }

    public function destroy(Proyecto $proyecto, Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('admin.proyectos.modulos.index', $proyecto);
    }
}
