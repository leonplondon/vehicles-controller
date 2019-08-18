<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registeredBrands = Brand::all()->count();

        if ($registeredBrands == 0) {
            $brands = array('Mazda', 'Chevrolet', 'Toyota');

            for ($index = 0; $index < count($brands); $index++) {
                $brand = new Brand();
                $brand->fill(['name' => $brands[$index]]);
                $brand->save();
            }
        }
    }
}
