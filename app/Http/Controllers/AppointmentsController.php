<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentsRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class AppointmentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $appointments = DB::table('appointments')->where('visible', '=', '1')->paginate('5');
        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.index', [
            'appointments' => $appointments,
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.create', [
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }


    /**
     * @param AppointmentsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AppointmentsRequest $request)
    {
        Appointment::create(
            [
                'id_doctor' => $request->id_doctor,
                'id_patient' => $request->id_patient,
                'gender' => $request->gender,
                'service_date' => date('Y-m-d', strtotime($request->service_date))
            ]
        );

        return redirect()->route('appointments.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $histories = DB::table('appointments')
            ->where('visible', '=', '0')
            ->paginate(5);
        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.list_history', [
            'histories' => $histories,
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $appointment = Appointment::find($id);
        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.edit', [
            'appointment' => $appointment,
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }


    /**
     * @param AppointmentsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AppointmentsRequest $request, int $id)
    {
        $apppointment = Appointment::find($id);

        $apppointment->update(
            [
                'id_doctor' => $request->id_doctor,
                'id_patient' => $request->id_patient,
                'initial_time_attendance' => $request->initial_time_attendance,
                'end_time_attendance' => $request->end_time_attendance,
                'complaint_disease' => $request->complaint_disease,
                'proceedings' => $request->proceedings,
                'height' => isset($request->height) ? number_format(str_replace(',', '.', $request->height), 2) : null,
                'weight' => isset($request->weight) ? number_format(str_replace(',', '.', $request->weight), 2) : null,
                'age' => $request->age,
                'gender' => $request->gender,
                'service_date' => date('Y-m-d', strtotime($request->service_date)),
                'visible' => $request->visible ?? '1'
            ]
        );

        return redirect()->route('appointments.index');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, int $id)
    {
        Appointment::destroy($id);

        if (isset($request->delete_history)) {
            return redirect()->route('appointment.show');
        }

        return redirect()->route('appointments.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function medicalAppointment(int $id)
    {
        $appointment = Appointment::find($id);
        $doctor = Doctor::find($appointment->id_doctor);
        $patient = Patient::find($appointment->id_patient);

        return view('admin.appointment.appointment', [
            'appointment' => $appointment,
            'doctor' => $doctor,
            'patient' => $patient
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function medicalHistory(int $id)
    {
        $history = Appointment::find($id);
        $doctor = Doctor::find($history->id_doctor);
        $patient = Patient::find($history->id_patient);

        return view('admin.appointment.medical_history', [
            'history' => $history,
            'doctor' => $doctor,
            'patient' => $patient
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        if (isset($filters) && $filters['search']) {
            $doctors = Doctor::where('name', 'LIKE', "%{$request->search}%")->get();
            $patients = Patient::where('name', 'LIKE', "%{$request->search}%")->get();

            $idDoctors = [];
            foreach ($doctors as $doctor) {
                $idDoctors [] = $doctor['id'];
            }

            $idPatients = [];
            foreach ($patients as $patient) {
                $idPatients [] = $patient['id'];
            }

            $idDoctors = implode(',', $idDoctors);
            $idPatients = implode(',', $idPatients);

            $appointments = Appointment::where('visible', '=', '1')
                ->where('id_doctor', '=', "{$idDoctors}")
                ->orWhere('id_patient', '=', "{$idPatients}")
                ->paginate('5');
        } else{
            $appointments = DB::table('appointments')
                ->where('visible', '=', '1')
                ->paginate('5');
        }

        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.index', [
            'appointments' => $appointments,
            'doctors' => $doctors,
            'patients' => $patients,
            'filters' => $filters
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchHistory(Request $request)
    {
        $filters = $request->except('_token');

        if (isset($filters) && $filters['search']) {
            $patients = Patient::where('name', 'LIKE', "%{$request->search}%")->get();

            $idPatients = [];
            foreach ($patients as $patient) {
                $idPatients [] = $patient['id'];
            }

            $idPatients = implode(',', $idPatients);

            $histories = Appointment::where('id_patient', '=', "{$idPatients}")
                ->where('visible', '=', '0')
                ->paginate('5');
        } else{
            $histories = DB::table('appointments')
                ->where('visible', '=', '0')
                ->paginate(5);
        }

        $doctors = Doctor::all()->sortBy('name');
        $patients = Patient::all()->sortBy('name');

        return view('admin.appointment.list_history', [
            'histories' => $histories,
            'doctors' => $doctors,
            'patients' => $patients,
            'filters' => $filters
        ]);
    }
}
