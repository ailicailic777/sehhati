<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function profile(Request $request)
    {
        $patient = $request->user()->patient()->with('familyMembers')->firstOrFail();

        return response()->json($patient);
    }

    public function updateProfile(Request $request)
    {
        $patient = $request->user()->patient()->firstOrFail();

        $validated = $request->validate([
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'wilaya' => 'nullable|string',
            'commune' => 'nullable|string',
            'address' => 'nullable|string',
            'blood_type' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
        ]);

        $patient->update($validated);

        return response()->json($patient);
    }
}
