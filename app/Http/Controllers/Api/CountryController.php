<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Country::all();
    }

    public function store(CountryRequest $request)
    {
        return Country::create($request->all());
    }

    public function show(Country $country)
    {
        return $country;
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        return $country;
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json(null, 204);
    }
}
