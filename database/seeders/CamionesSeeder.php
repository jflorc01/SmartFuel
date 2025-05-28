<?php

namespace Database\Seeders;

use App\Models\Camion;
use Illuminate\Database\Seeder;

class CamionesSeeder extends Seeder
{
    public function run(): void
    {
        $camiones = [
            [
                'marca' => 'Volvo',
                'modelo' => 'FH16',
                'matricula' => '1234ABC',
                'descripcion' => 'Camión de gran tonelaje para largas distancias',
                'gastoPorKm' => 0.85,
            ],
            [
                'marca' => 'Mercedes-Benz',
                'modelo' => 'Actros',
                'matricula' => '5678DEF',
                'descripcion' => 'Camión versátil para repartos urbanos',
                'gastoPorKm' => 0.72,
            ],
            [
                'marca' => 'MAN',
                'modelo' => 'TGX',
                'matricula' => '9012GHI',
                'descripcion' => 'Eficiente en consumo para rutas nacionales',
                'gastoPorKm' => 0.78,
            ],
            [
                'marca' => 'Scania',
                'modelo' => 'R450',
                'matricula' => '3456JKL',
                'descripcion' => 'Alto rendimiento en autopista',
                'gastoPorKm' => 0.82,
            ],
            [
                'marca' => 'Iveco',
                'modelo' => 'Stralis',
                'matricula' => '7890MNO',
                'descripcion' => 'Ideal para repartos regionales',
                'gastoPorKm' => 0.68,
            ]
        ];

        foreach ($camiones as $camion) {
            Camion::create($camion);
        }
    }
}