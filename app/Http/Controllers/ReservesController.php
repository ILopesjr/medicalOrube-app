<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservesRequest;
use App\Models\Doctor;
use App\Models\Reserves;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class ReservesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reserves = DB::table('reserves')->paginate(5);
        $doctors = Doctor::all();
        $rooms = Room::all();

        return view('admin.reserve.index', [
            'reserves' => $reserves,
            'doctors' => $doctors,
            'rooms' => $rooms
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $doctors = Doctor::all()->sortBy('name');
        $rooms = Room::all();

        return view('admin.reserve.create', [
            'doctors' => $doctors,
            'rooms' => $rooms
        ]);
    }

    /**
     * @param ReservesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReservesRequest $request)
    {
        Reserves::create(
            [
                'id_doctor' => $request->id_doctor,
                'id_room' => $request->id_room,
                'lease_date' => date('Y-m-d', strtotime($request->lease_date)),
                'available' => $request->available
            ]
        );

        return redirect()->route('reserves.index');
    }

    /**
     * @param Reserves $reservas
     */
    public function show(Reserves $reservas)
    {
        //
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $reserve = Reserves::find($id);
        $doctors = Doctor::all()->sortBy('name');
        $rooms = Room::all();

        return view('admin.reserve.edit', [
            'reserve' => $reserve,
            'doctors' => $doctors,
            'rooms' => $rooms
        ]);
    }


    /**
     * @param ReservesRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ReservesRequest $request, int $id)
    {
        $reserve = Reserves::find($id);

        $reserve->update(
            [
                'id_doctor' => $request->id_doctor,
                'id_room' => $request->id_room,
                'lease_date' => date('Y-m-d', strtotime($request->lease_date)),
                'available' => $request->available
            ]
        );

        return redirect()->route('reserves.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        Reserves::destroy($id);

        return redirect()->route('reserves.index');
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

            $idDoctors = [];
            foreach ($doctors as $doctor) {
                $idDoctors [] = $doctor['id'];
            }

            $idDoctors = implode(',', $idDoctors);

            $reserves = Reserves::where('id_doctor', '=', "{$idDoctors}")->paginate('5');
        } else{
            $reserves = DB::table('reserves')->paginate(5);
        }

        $rooms = Room::all();
        $doctors = Doctor::all();

        return view('admin.reserve.index', [
            'reserves' => $reserves,
            'doctors' => $doctors,
            'rooms' => $rooms,
            'filters' => $filters
        ]);
    }
}
