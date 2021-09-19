<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthPlansRequest;
use App\Models\HealthPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class HealthPlansController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $health_plans = DB::table('health_plans')->paginate(5);

        return view('admin.health_plan.index', [
            'health_plans' => $health_plans
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.health_plan.create');
    }


    /**
     * @param HealthPlansRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HealthPlansRequest $request)
    {
        HealthPlan::create($request->all());

        return redirect()->route('health_plans.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $health_plan = HealthPlan::find($id);

        return view('admin.health_plan.show', [
            'health_plan' => $health_plan
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $health_plan = HealthPlan::find($id);

        return view('admin.health_plan.edit', [
            'health_plan' => $health_plan
        ]);
    }


    /**
     * @param HealthPlansRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HealthPlansRequest $request, int $id)
    {
        $health_plan = HealthPlan::find($id);

        $health_plan->update($request->all());

        return redirect()->route('health_plans.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        HealthPlan::destroy($id);

        return redirect()->route('health_plans.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $health_plans = HealthPlan::where('name', 'LIKE', "%{$request->search}%")->paginate('5');

        return view('admin.health_plan.index', [
            'health_plans' => $health_plans,
            'filters' => $filters
        ]);
    }
}
