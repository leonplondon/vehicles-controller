<?php

use App\Models\AuthorizedCode;
use Illuminate\Database\Seeder;

class AuthorizedCodeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registeredCodes = AuthorizedCode::all()->count();

        if ($registeredCodes == 0) {
            $authorizedCode = new AuthorizedCode();
            $authorizedCode->fill(['code' => 'A765']);
            $authorizedCode->save();
        }
    }
}
