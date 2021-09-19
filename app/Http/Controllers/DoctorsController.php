<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorsRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class DoctorsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $doctors = DB::table('doctors')->paginate(5);

        return view('admin.doctor.index', [
            'doctors' => $doctors
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * @param DoctorsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DoctorsRequest $request)
    {
        Doctor::create(
            [
                'name' => $request->name,
                'crm' => $request->crm,
                'specialization' => $request->specialization,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        return redirect()->route('doctors.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $doctor = Doctor::find($id);

        return view('admin.doctor.show', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $doctor = Doctor::find($id);

        return view('admin.doctor.edit', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * @param DoctorsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DoctorsRequest $request, int $id)
    {
        $doctor = Doctor::find($id);

        $doctor->update(
            [
                'name' => $request->name,
                'crm' => $request->crm,
                'specialization' => $request->specialization,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        return redirect()->route('doctors.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        Doctor::destroy($id);

        return redirect()->route('doctors.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $doctors = Doctor::where('name', 'LIKE', "%{$request->search}%")->paginate('5');

        return view('admin.doctor.index', [
            'doctors' => $doctors,
            'filters' => $filters
        ]);
    }
}
