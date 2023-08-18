<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Hamburguesa clásica',
                'descripcion' => 'Hamburguesa de carne de res, queso cheddar, lechuga, tomate y salsa especial',
                'precio' => 8.99,
            ],
            [
                'nombre' => 'Hamburguesa doble',
                'descripcion' => 'Dos hamburguesas de carne de res, queso cheddar, lechuga, tomate y salsa especial',
                'precio' => 11.99,
            ],
            [
                'nombre' => 'Hamburguesa vegetariana',
                'descripcion' => 'Hamburguesa de frijoles negros, aguacate, lechuga, tomate y aderezo de cilantro',
                'precio' => 9.99,
            ],
            [
                'nombre' => 'Hamburguesa con queso azul',
                'descripcion' => 'Hamburguesa de carne de res, queso azul, cebolla caramelizada y rúcula',
                'precio' => 10.99,
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}