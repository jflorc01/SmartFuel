<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;

class CalculoRentabilidadController extends Controller
{
    /**
     * Muestra el formulario para calcular la rentabilidad
     */
    public function mostrarFormulario()
    {
        $camiones = Camion::orderBy('marca')->get();
        return view('rentabilidad.formulario', compact('camiones'));
    }

    /**
     * Calcula la rentabilidad del reparto
     */
    public function calcularRentabilidad(Request $request)
    {
        $request->validate([
            'kilometros' => 'required|numeric|min:0',
            'importe_pedido' => 'required|numeric|min:0',
            'camion_id' => 'required|exists:camiones,id'
        ]);

        $camion = Camion::findOrFail($request->camion_id);
        $costeTotal = $request->kilometros * $camion->gastoPorKm;
        $rentabilidad = $request->importe_pedido - $costeTotal;
        $esRentable = $rentabilidad > 0;

        return view('rentabilidad.resultado', [
            'camion' => $camion,
            'kilometros' => $request->kilometros,
            'importe_pedido' => $request->importe_pedido,
            'costeTotal' => $costeTotal,
            'rentabilidad' => $rentabilidad,
            'esRentable' => $esRentable
        ]);
    }
}