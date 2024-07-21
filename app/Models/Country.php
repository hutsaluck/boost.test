<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'planned_weight'];

    public const COUNTRIES = [
        ['name' => 'Canada', 'planned_weight' => 10000],
        ['name' => 'USA', 'planned_weight' => 1000],
        ['name' => 'Germany', 'planned_weight' => 8000],
        ['name' => 'Australia', 'planned_weight' => 900],
    ];

    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function minings()
    {
        return $this->hasManyThrough(Mining::class, Company::class);
    }
}
