<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isPatient()) {
            $appointments = Appointment::where('patient_id', $user->patient->id)
                ->with('doctor.user', 'doctor.specialty')
                ->orderBy('appointment_date', 'desc')
                ->paginate(20);
        } else {
            $appointments = Appointment::where('doctor_id', $user->doctor->id)
                ->with('patient.user')
                ->orderBy('appointment_date', 'desc')
                ->paginate(20);
        }

        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
            'type' => 'nullable|in:in_person,video,phone',
            'notes' => 'nullable|string',
        ]);

        $validated['patient_id'] = $request->user()->patient->id;
        $validated['status'] = 'pending';

        $appointment = Appointment::create($validated);

        return response()->json($appointment->load('doctor.user', 'doctor.specialty'), 201);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validated = $request->validate([
            'status' => 'in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($validated);

        return response()->json($appointment);
    }

    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validated = $request->validate([
            'cancel_reason' => 'nullable|string',
        ]);

        $appointment->update([
            'status' => 'cancelled',
            'cancel_reason' => $validated['cancel_reason'] ?? null,
        ]);

        return response()->json($appointment);
    }
}
