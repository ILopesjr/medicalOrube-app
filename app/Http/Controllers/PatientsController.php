<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientsRequest;
use App\Models\HealthPlan;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class PatientsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $patients = DB::table('patients')->paginate(5);

        return view('admin.patient.index', [
            'patients' => $patients
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $health_plans = HealthPlan::all();

        return view('admin.patient.create', [
            'health_plans' => $health_plans
        ]);
    }

    /**
     * @param PatientsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientsRequest $request)
    {
        Patient::create(
            [
                'id_health_plans' => $request->health_plans,
                'name' => $request->name,
                'cpf' => str_replace(['-', '.'], '', $request->cpf),
                'gender' => $request->gender,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        return redirect()->route('patient.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $patient = Patient::find($id);
        $health_plan = HealthPlan::find($patient->id_health_plans);

        return view('admin.patient.show', [
            'patient' => $patient,
            'health_plan' => $health_plan
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $patient = Patient::find($id);
        $health_plans = HealthPlan::all();

        return view('admin.patient.edit', [
            'patient' => $patient,
            'health_plans' => $health_plans
        ]);
    }


    /**
     * @param PatientsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientsRequest $request, int $id)
    {
        $patient = Patient::find($id);

        $patient->update(
            [
                'id_health_plans' => $request->health_plans,
                'name' => $request->name,
                'cpf' => $request->cpf,
                'gender' => $request->gender,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        return redirect()->route('patient.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        Patient::destroy($id);

        return redirect()->route('patient.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $patients = Patient::where('name', 'LIKE', "%{$request->search}%")->paginate('5');

        return view('admin.patient.index', [
            'patients' => $patients,
            'filters' => $filters
        ]);
    }
}
