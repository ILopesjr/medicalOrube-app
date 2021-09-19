<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomsRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class RoomsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rooms = DB::table('rooms')->paginate('5');

        return view('admin.room.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.room.create');
    }


    /**
     * @param RoomsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoomsRequest $request)
    {
        Room::create($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $room = Room::find($id);

        return view('admin.room.show', [
            'room' => $room
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $room = Room::find($id);

        return view('admin.room.edit', [
            'room' => $room
        ]);
    }


    /**
     * @param RoomsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoomsRequest $request, int $id)
    {
        $room = Room::find($id);

        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        Room::destroy($id);

        return redirect()->route('rooms.index');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $rooms = Room::where('number', 'LIKE', "%{$request->search}%")->paginate('5');

        return view('admin.room.index', [
            'rooms' => $rooms,
            'filters' => $filters
        ]);
    }
}
