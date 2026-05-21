<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        return response()->json(Specialty::withCount('doctors')->get());
    }

    public function show($id)
    {
        return response()->json(Specialty::with('doctors.user')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'name_fr' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
        ]);

        return response()->json(Specialty::create($validated), 201);
    }

    public function update(Request $request, $id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->update($request->only(['name_ar', 'name_en', 'name_fr', 'description', 'icon']));

        return response()->json($specialty);
    }

    public function destroy($id)
    {
        Specialty::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
