<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CamionController extends Controller
{
    public function create()
    {
        return view('camiones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'matricula' => 'required|string|max:20|unique:camiones',
            'descripcion' => 'nullable|string',
            'gastoPorKm' => 'required|numeric|min:0',
        ]);

        Camion::create($validated);

        return redirect()->route('rentabilidad.formulario')
                         ->with('success', 'Camión añadido correctamente');
    }
}