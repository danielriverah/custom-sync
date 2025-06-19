<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador CRUD para proyectos.
 */
class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return Inertia::render('Projects/Index', ['proyectos' => $proyectos]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    public function show(Proyecto $proyecto)
    {
        return Inertia::render('Projects/Show', ['proyecto' => $proyecto]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'slug' => 'required|unique:proyectos,slug',
        ]);
        Proyecto::create($data);
        return redirect()->route('admin.proyectos.index');
    }

    public function edit(Proyecto $proyecto)
    {
        $proyecto->load('modulos.submodulos.documentos.recursos');

        return Inertia::render('Projects/Edit', [
            'proyecto' => $proyecto,
        ]);
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'slug' => 'required|unique:proyectos,slug,' . $proyecto->proyecto_id . ',proyecto_id',
        ]);
        $proyecto->update($data);
        return redirect()->route('admin.proyectos.index');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('admin.proyectos.index');
    }
}
