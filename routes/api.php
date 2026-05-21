<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\SpecialtyController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\MedicalRecordController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\QuestionAnswerController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\WilayaController;
use App\Http\Controllers\Api\AdminController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/specialties', [SpecialtyController::class, 'index']);
Route::get('/specialties/{id}', [SpecialtyController::class, 'show']);
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/featured', [DoctorController::class, 'featured']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::get('/doctors/{id}/schedules', [DoctorController::class, 'schedules']);
Route::get('/doctors/{id}/reviews', [DoctorController::class, 'reviews']);

Route::get('/wilayas', [WilayaController::class, 'index']);
Route::get('/wilayas/{id}/communes', [WilayaController::class, 'communes']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);

Route::get('/qa', [QuestionAnswerController::class, 'index']);
Route::get('/qa/{id}', [QuestionAnswerController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);

    Route::get('/patient/profile', [PatientController::class, 'profile']);
    Route::put('/patient/profile', [PatientController::class, 'updateProfile']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
    Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel']);

    Route::get('/medical-records', [MedicalRecordController::class, 'index']);
    Route::post('/medical-records', [MedicalRecordController::class, 'store']);

    Route::post('/reviews', [ReviewController::class, 'store']);

    Route::get('/conversations', [ChatController::class, 'index']);
    Route::post('/conversations', [ChatController::class, 'store']);
    Route::get('/conversations/{id}/messages', [ChatController::class, 'messages']);
    Route::post('/conversations/{id}/messages', [ChatController::class, 'sendMessage']);

    Route::post('/qa', [QuestionAnswerController::class, 'store']);

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/stats', [AdminController::class, 'stats']);
        Route::get('/admin/users', [AdminController::class, 'users']);
        Route::put('/admin/users/{id}', [AdminController::class, 'updateUser']);
        Route::get('/admin/doctors/pending', [AdminController::class, 'pendingDoctors']);
        Route::put('/admin/doctors/{id}/verify', [AdminController::class, 'verifyDoctor']);
        Route::post('/admin/specialties', [SpecialtyController::class, 'store']);
        Route::put('/admin/specialties/{id}', [SpecialtyController::class, 'update']);
        Route::delete('/admin/specialties/{id}', [SpecialtyController::class, 'destroy']);
    });
});
