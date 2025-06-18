<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Submodulo;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador CRUD para submódulos.
 */
class SubmoduloController extends Controller
{
    public function index(Modulo $modulo)
    {
        $submodulos = $modulo->submodulos()->get();
        return Inertia::render('Submodules/Index', [
            'modulo' => $modulo,
            'submodulos' => $submodulos,
        ]);
    }

    public function create(Modulo $modulo)
    {
        return Inertia::render('Submodules/Create', ['modulo' => $modulo]);
    }

    public function store(Request $request, Modulo $modulo)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $modulo->submodulos()->create($data);
        return redirect()->route('admin.submodulos.index', $modulo);
    }

    public function edit(Modulo $modulo, Submodulo $submodulo)
    {
        return Inertia::render('Submodules/Edit', [
            'modulo' => $modulo,
            'submodulo' => $submodulo,
        ]);
    }

    public function update(Request $request, Modulo $modulo, Submodulo $submodulo)
    {
        $data = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'orden' => 'integer',
        ]);
        $submodulo->update($data);
        return redirect()->route('admin.submodulos.index', $modulo);
    }

    public function destroy(Modulo $modulo, Submodulo $submodulo)
    {
        $submodulo->delete();
        return redirect()->route('admin.submodulos.index', $modulo);
    }
}
