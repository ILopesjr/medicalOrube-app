<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\{
    PatientsController,
    HealthPlansController,
    DoctorsController,
    RoomsController,
    ReservesController,
    AppointmentsController
};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    //Patients
    Route::get('/pacientes', [PatientsController::class, 'index'])->name('patient.index');
    Route::get('/paciente/create', [PatientsController::class, 'create'])->name('patient.create');
    Route::post('/paciente', [PatientsController::class, 'store'])->name('patient.store');
    Route::get('/paciente/{id}', [PatientsController::class, 'show'])->name('patient.show');
    Route::get('/paciente/edit/{id}', [PatientsController::class, 'edit'])->name('patient.edit');
    Route::put('/paciente/{id}', [PatientsController::class, 'update'])->name('patient.update');
    Route::delete('/paciente/{id}', [PatientsController::class, 'destroy'])->name('patient.delete');
    Route::any('/pacientes/procurar', [PatientsController::class, 'search'])->name('patient.search');

    //Health_Plans
    Route::get('/planos_saude', [HealthPlansController::class, 'index'])->name('health_plans.index');
    Route::get('/plano_saude/create', [HealthPlansController::class, 'create'])->name('health_plans.create');
    Route::post('/plano_saude', [HealthPlansController::class, 'store'])->name('health_plans.store');
    Route::get('/plano_saude/{id}', [HealthPlansController::class, 'show'])->name('health_plans.show');
    Route::get('/plano_saude/edit/{id}', [HealthPlansController::class, 'edit'])->name('health_plans.edit');
    Route::put('/plano_saude/{id}', [HealthPlansController::class, 'update'])->name('health_plans.update');
    Route::delete('/plano_saude/{id}', [HealthPlansController::class, 'destroy'])->name('health_plans.delete');
    Route::any('/plano_saude/procurar', [HealthPlansController::class, 'search'])->name('health_plans.search');

    //Doctors
    Route::get('/medicos', [DoctorsController::class, 'index'])->name('doctors.index');
    Route::get('/medico/create', [DoctorsController::class, 'create'])->name('doctor.create');
    Route::post('/medico', [DoctorsController::class, 'store'])->name('doctor.store');
    Route::get('/medico/{id}', [DoctorsController::class, 'show'])->name('doctor.show');
    Route::get('/medico/edit/{id}', [DoctorsController::class, 'edit'])->name('doctor.edit');
    Route::put('/medico/{id}', [DoctorsController::class, 'update'])->name('doctor.update');
    Route::delete('/medico/{id}', [DoctorsController::class, 'destroy'])->name('doctor.delete');
    Route::any('/medico/procurar', [DoctorsController::class, 'search'])->name('doctor.search');

    //Rooms
    Route::get('/salas', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('/sala/create', [RoomsController::class, 'create'])->name('room.create');
    Route::post('/sala', [RoomsController::class, 'store'])->name('room.store');
    Route::get('/sala/{id}', [RoomsController::class, 'show'])->name('room.show');
    Route::get('/sala/edit/{id}', [RoomsController::class, 'edit'])->name('room.edit');
    Route::put('/sala/{id}', [RoomsController::class, 'update'])->name('room.update');
    Route::delete('/sala/{id}', [RoomsController::class, 'destroy'])->name('room.delete');
    Route::any('/sala/procurar', [RoomsController::class, 'search'])->name('room.search');

    //Reserves
    Route::get('/reservas', [ReservesController::class, 'index'])->name('reserves.index');
    Route::get('/reserva/create', [ReservesController::class, 'create'])->name('reserve.create');
    Route::post('/reserva', [ReservesController::class, 'store'])->name('reserve.store');
    Route::get('/reserva/{id}', [ReservesController::class, 'show'])->name('reserve.show');
    Route::get('/reserva/edit/{id}', [ReservesController::class, 'edit'])->name('reserve.edit');
    Route::put('/reserva/{id}', [ReservesController::class, 'update'])->name('reserve.update');
    Route::delete('/reserva/{id}', [ReservesController::class, 'destroy'])->name('reserve.delete');
    Route::any('/reserva/procurar', [ReservesController::class, 'search'])->name('reserve.search');

    //appointments
    Route::get('/consultas', [AppointmentsController::class, 'index'])->name('appointments.index');
    Route::get('/consulta/create', [AppointmentsController::class, 'create'])->name('appointment.create');
    Route::post('/consulta', [AppointmentsController::class, 'store'])->name('appointment.store');
    Route::get('/consulta_medica/{id}', [AppointmentsController::class, 'medicalAppointment'])->name(
        'appointment.medicalAppointment'
    );
    Route::get('/historico', [AppointmentsController::class, 'show'])->name('appointment.show');
    Route::get('/historico/{id}', [AppointmentsController::class, 'medicalHistory'])->name(
        'appointment.medicalHistory'
    );
    Route::any('/historico/procurar', [AppointmentsController::class, 'searchHistory'])->name(
        'appointment.searchHistory'
    );
    Route::get('/consulta/edit/{id}', [AppointmentsController::class, 'edit'])->name('appointment.edit');
    Route::put('/consulta/{id}', [AppointmentsController::class, 'update'])->name('appointment.update');
    Route::delete('/consulta/{id}', [AppointmentsController::class, 'destroy'])->name('appointment.delete');
    Route::any('/consulta/procurar', [AppointmentsController::class, 'search'])->name('appointment.search');
});

require __DIR__ . '/auth.php';
