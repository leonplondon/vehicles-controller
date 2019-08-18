<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\AuthorizedCode;
use App\Models\Brand;
use App\Models\Person;
use App\Models\Vehicle;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

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
        $brands = Brand::all();

        return view('register', [
            'brands' => $brands,
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['plate'] = strtoupper($validatedData['plate']);

        $person = new Person();
        $person->fill($validatedData);

        $vehicle = new Vehicle();
        $vehicle->fill($validatedData);

        DB::beginTransaction();

        try {
            $person->save();

            $person
                ->vehicle()
                ->save($vehicle);
        } catch (Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with([
                    'message' => 'Ocurrió un error, intenta más tarde',
                    'success' => false,
                ]);
        }

        DB::commit();
        return back()->with([
            'message' => 'El vehiculo se ha registrado correctamente',
            'success' => true,
        ]);
    }

    public function vehicles()
    {
        $vehicles = Vehicle::with('people', 'brand')
            ->get();

        return view('vehicles', [
            'vehicles' => $vehicles,
        ]);
    }

    public function stats()
    {
        $stats = DB::select('SELECT count(plate) AS amount, brands.name as brand FROM vehicles INNER JOIN brands on vehicles.brand_id = brands.id GROUP BY brands.id');
        
        return view('stats', [
            'stats' => $stats
        ]);
    }
}
