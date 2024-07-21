<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\Mining;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function generateData()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            $companies = Company::where('country_id', $country->id)->get();
            foreach ($companies as $company) {
                for ($i = 0; $i < rand(50, 500); $i++) {
                    Mining::create([
                        'company_id' => $company->id,
                        'date' => Carbon::now()->subMonths(rand(1, 6))->addDays(rand(0, 30)),
                        'weight' => rand(100, 10000) / 1000,
                    ]);
                }
            }
        }
        return response()->json(['message' => 'Data generated successfully']);
    }

    public function generateReport(Request $request)
    {
        $month = $request->query('month');
        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();

        $countries = Country::with(['minings' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }])->get();

        $report = $countries->map(function($country) {
            $totalMined = $country->minings->sum('weight');
            return [
                'country' => $country->name,
                'mined' => $totalMined,
                'plan' => $country->planned_weight
            ];
        })->filter(function($item) {
            return $item['mined'] > $item['plan'];
        })->values();

        return response()->json($report);
    }
}
