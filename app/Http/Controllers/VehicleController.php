<?php

namespace App\Http\Controllers;

class VehicleController extends Controller
{
    public function index($id = null)
    {
        $authenticated = request()
            ->session()
            ->get('authenticated', false);

        if (!$authenticated && ($id == null || $id != '123')) {
            return redirect('forbidden');
        }

        if (!$authenticated) {
            request()
                ->session()
                ->put('authenticated', true);
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
