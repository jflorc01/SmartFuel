<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;
use App\Services\RouteOptimizationService;

class ClienteController extends Controller
{
    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nombre' => 'required|string|max:50',
            'telefono' => 'required|string|max:9',
            'direccion' => 'required|string|max:150',
        ]);

        // Llamada a Geocoding API
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $data['direccion'],
            'key' => env('GOOGLE_MAPS_KEY'),
        ]);

        if ($response->successful() && isset($response['results'][0])) {
            $location = $response['results'][0]['geometry']['location'];
            $data['latitud'] = $location['lat'];
            $data['longitud'] = $location['lng'];
        } else {
            return back()->with('error', 'No se pudo obtener la ubicación.');
        }

        Cliente::create($data);

        return redirect()->route('clientes.create')->with('success', 'Cliente guardado correctamente');
    }

    public function index(){
        $clientes = Cliente::orderBy('nombre')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function calcularRuta(Request $request, RouteOptimizationService $opt){
        $request->validate(['clientes'=>'required|array|min:1']);
        $clientes = Cliente::whereIn('id', $request->clientes)->get();

        $paradas = $clientes->map(fn($c)=>[(float)$c->latitud, (float)$c->longitud])->toArray();
        // $base = [42.86156320, -5.67507220];
        $usuario = auth()->user();
        $base = [(float)$usuario->base_lat, (float)$usuario->base_lng];

        if(!$usuario->base_lat){
            return redirect()->route('usuario.cambiar-base')->with('error', 'No hay una base guardada. Añádala antes de calcular la ruta.');
        }

        $result = $opt->optimize($base, $paradas);
        $indices = $result['order'];
        $poly = $result['polyline'];

        // Reordena los clientes según el índice optimizado
        $clientesOrdenados = collect($indices)->map(fn($i)=> $clientes[$i]);

        return view('clientes.ruta', [
            'clientesOrdenados' => $clientesOrdenados,
            'polyline' => $poly,
            'base' => $base,
        ]);
    }

    public function edit(Cliente $cliente){
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente){

        $data = $request->validate([
            'nombre'    => 'required|string|max:50',
            'telefono'  => 'nullable|string|max:9',
        ]);

        $cliente->update($data);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function confirmDelete(Cliente $cliente){
        return view('clientes.confirm-delete', compact('cliente'));
    }
    public function destroy(Cliente $cliente){
        $cliente->delete();
        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }

}
