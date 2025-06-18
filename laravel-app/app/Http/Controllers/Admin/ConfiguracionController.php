<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuracion;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 * Controlador para la configuración visual de un proyecto.
 */
class ConfiguracionController extends Controller
{
    public function edit(Proyecto $proyecto)
    {
        $configuracion = $proyecto->configuracion;
        return Inertia::render('Settings/Edit', [
            'proyecto' => $proyecto,
            'configuracion' => $configuracion,
        ]);
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $data = $request->validate([
            'logo_url' => 'nullable|max:500',
            'color_primario' => 'nullable|max:7',
            'color_secundario' => 'nullable|max:7',
            'fuente' => 'nullable|max:100',
            'layout' => 'in:sidebar,topbar,minimal',
            'modo_dark' => 'boolean',
        ]);
        $proyecto->configuracion()->updateOrCreate([], $data);
        return redirect()->route('admin.configuracion.edit', $proyecto);
    }
}
