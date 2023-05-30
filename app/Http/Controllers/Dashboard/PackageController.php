<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $packages = Package::query()->orderByDesc('created_at')->get();

        return view('dashboard.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'views_number' => 'required|integer',
                'bonus_value' => 'required|integer',
                'price' => 'required|integer',
                'duration' => 'required|integer',
            ],
        );

        Package::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'views_number' => $request->views_number,
            'bonus_value' => $request->bonus_value,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        toastr()->success(__('lang.package_created'));

        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $package = Package::query()->findOrFail($id);

        return view('dashboard.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $package = Package::query()->findOrFail($id);

        $request->validate(
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'views_number' => 'required|integer',
                'bonus_value' => 'required|integer',
                'price' => 'required|integer',
                'duration' => 'required|integer',
            ],
        );

        $package->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'views_number' => $request->views_number,
            'bonus_value' => $request->bonus_value,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        toastr()->success(__('lang.package_updated'));

        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
