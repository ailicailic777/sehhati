<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isPatient()) {
            $records = MedicalRecord::where('patient_id', $user->patient->id)
                ->with('doctor.user')
                ->orderBy('record_date', 'desc')
                ->get();
        } else {
            $records = MedicalRecord::where('doctor_id', $user->doctor->id)
                ->with('patient.user')
                ->orderBy('record_date', 'desc')
                ->get();
        }

        return response()->json($records);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'prescription' => 'nullable|string',
            'notes' => 'nullable|string',
            'record_date' => 'required|date',
        ]);

        $validated['doctor_id'] = $request->user()->doctor->id;

        return response()->json(MedicalRecord::create($validated), 201);
    }
}
