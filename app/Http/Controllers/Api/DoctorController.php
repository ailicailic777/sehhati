<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::with('user', 'specialty')->verified();

        if ($request->specialty_id) {
            $query->bySpecialty($request->specialty_id);
        }

        if ($request->wilaya) {
            $query->byWilaya($request->wilaya);
        }

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $doctors = $query->orderBy('rating', 'desc')->paginate(20);

        return response()->json($doctors);
    }

    public function featured()
    {
        $doctors = Doctor::with('user', 'specialty')
            ->verified()
            ->orderBy('rating', 'desc')
            ->take(6)
            ->get();

        return response()->json($doctors);
    }

    public function show($id)
    {
        $doctor = Doctor::with('user', 'specialty', 'schedules')->findOrFail($id);

        return response()->json($doctor);
    }

    public function schedules($id)
    {
        $doctor = Doctor::findOrFail($id);

        return response()->json($doctor->schedules()->where('is_active', true)->get());
    }

    public function reviews($id)
    {
        $doctor = Doctor::findOrFail($id);

        return response()->json($doctor->reviews()->with('patient.user')->get());
    }
}
