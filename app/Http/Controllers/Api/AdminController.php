<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stats()
    {
        return response()->json([
            'users_count' => User::count(),
            'patients_count' => Patient::count(),
            'doctors_count' => Doctor::count(),
            'verified_doctors' => Doctor::where('is_verified', true)->count(),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
            'completed_appointments' => Appointment::where('status', 'completed')->count(),
        ]);
    }

    public function users()
    {
        return response()->json(User::with(['patient', 'doctor'])->paginate(20));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'phone', 'role', 'is_active']));

        return response()->json($user);
    }

    public function pendingDoctors()
    {
        $doctors = Doctor::with('user', 'specialty')
            ->where('is_verified', false)
            ->paginate(20);

        return response()->json($doctors);
    }

    public function verifyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update(['is_verified' => true]);

        return response()->json($doctor);
    }
}
