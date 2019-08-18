<?php

namespace App\Http\Controllers;

use App\Models\AuthorizedCode;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleController extends Controller
{
    public function index($id = null)
    {
        $authenticated = request()
            ->session()
            ->get('authenticated', false);

        if (!$authenticated && $id == null) {
            return redirect('forbidden');
        }

        if (!$authenticated) {
            try {
                AuthorizedCode::query()
                    ->where('code', '=', $id)
                    ->firstOrFail();

                request()
                    ->session()
                    ->put('authenticated', true);
            } catch (ModelNotFoundException $e) {
                return redirect('forbidden');
            }
        }

        return view('home');
    }

    public function forbidden()
    {
        return view('forbidden');
    }

    public function register()
    {
    }

    public function store()
    {
    }

    public function vehicles()
    {
    }

    public function stats()
    {
    }
}
