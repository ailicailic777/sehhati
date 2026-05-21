<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wilaya;
use App\Models\Commune;
use Illuminate\Http\Request;

class WilayaController extends Controller
{
    public function index()
    {
        return response()->json(Wilaya::orderBy('code')->get());
    }

    public function communes($id)
    {
        return response()->json(Commune::where('wilaya_id', $id)->orderBy('code')->get());
    }
}
