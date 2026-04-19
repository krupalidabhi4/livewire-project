<?php
namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    public static function getCountries() {
        return Country::all();
    }

}
