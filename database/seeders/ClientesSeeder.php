<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                "nombre" => "Servigordón",
                "telefono" => "987588471",
                "direccion" => "Poligono Industrial, 16, 24608 La Pola de Gordón, León",
                "latitud" => 42.86245940,
                "longitud" => -5.67365070,
            ],
            [
                "nombre" => "IES San Andrés",
                "telefono" => "987846315",
                "direccion" => "Av. el Romeral, 125, Villabalter",
                "latitud" => 42.61769940,
                "longitud" => -5.61957720,
            ],
            [
                "nombre" => "Vexiza",
                "telefono" => "678543221",
                "direccion" => "Vexiza, León",
                "latitud" => 42.60899680,
                "longitud" => -5.58226760,
            ],
            [
                "nombre" => "Miguel Ordóñez",
                "telefono" => "645321233",
                "direccion" => "Calle Teresa Monje, 1, León",
                "latitud" => 42.61402240,
                "longitud" => -5.58807480,
            ],
            [
                "nombre" => "Antonio Pérez",
                "telefono" => "987824125",
                "direccion" => "Calle Poeta Eduardo Álvarez, 36, La Pola de Gordón",
                "latitud" => 42.85689880,
                "longitud" => -5.67364400,
            ],
            [
                "nombre" => "Generadores Froilán",
                "telefono" => "666545434",
                "direccion" => "GRUPOS ELECTRÓGENOS J. FROILÁN, Villadangos del Páramo",
                "latitud" => 42.53428040,
                "longitud" => -5.74737880,
            ],
            [
                "nombre" => "Luciano",
                "telefono" => "67441232",
                "direccion" => "Av Florentino Agustín Díez, 45, León",
                "latitud" => 42.78422310,
                "longitud" => -5.79871660,
            ],
            
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
