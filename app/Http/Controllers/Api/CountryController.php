<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Country::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'planned_weight' => 'required|numeric',
        ]);

        return Country::create($request->all());
    }

    public function show(Country $country)
    {
        return $country;
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'planned_weight' => 'required|numeric',
        ]);

        $country->update($request->all());
        return $country;
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json(null, 204);
    }
}
