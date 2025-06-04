<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function autocomplete_city(Request $request) {
        $valueToSearch = $request->get('q');
        $ciudades = Ciudad::where('nombre', 'like', "%{$valueToSearch}%")
                    ->take(10)
                    ->get();

        return response()->json($ciudades);            
    }
}
