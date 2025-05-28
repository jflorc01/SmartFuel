<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function guardarBase(Request $request) {
        $data = $request->validate([
            'direccion' => 'required|string|max:255',
        ]);

        // Llamada a Geocoding API
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $data['direccion'],
            'key' => env('GOOGLE_MAPS_KEY'),
        ]);

        if ($response->successful() && isset($response['results'][0])) {
        $location = $response['results'][0]['geometry']['location'];

        // Guardar datos en el usuario autenticado
        $user = Auth::user();
        $user->base_direccion = $data['direccion'];
        $user->base_lat = $location['lat'];
        $user->base_lng = $location['lng'];
        $user->save();

        return redirect()->route('welcome')->with('success', 'Base actualizada correctamente.');
    }

    return redirect()->back()->with('error', 'No se pudo obtener la ubicación de la base.');

    }
}
