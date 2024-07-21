<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::with('country')->get();
    }

    public function get(Request $request)
    {
        $posts = Company::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function store(CompanyRequest $request)
    {
        return Company::create($request->all());
    }

    public function show(Company $company)
    {
        return $company->load('country');
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        return $company;
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(null, 204);
    }
}
