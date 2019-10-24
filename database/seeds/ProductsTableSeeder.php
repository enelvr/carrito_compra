<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++) {
            DB::table('products')->insert([
                'precio' => 1000 * $i,
                'nombre' => 'Producto ' . $i,
                'descripcion' => 'Esta es la descripcion del producto ' . $i,
                'imagen' => 'https://via.placeholder.com/300?text=Producto+' . $i,
            ]);
        }
    }
}
