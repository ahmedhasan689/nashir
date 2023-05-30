<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $publishers = User::query()->where('user_type', 'publisher')->get();

        if($request->ajax()) {
            return view('dashboard.publishers.table', compact('publishers'));
        }

        return view('dashboard.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $packages = Package::query()->get();

        return view('dashboard.publishers.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'password' => 'required|min:8',
            'package_id' => 'required|exists:packages,id',
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        DB::beginTransaction();

        try{
            $user = User::create($input);

            $package = Package::query()->findOrFail($request->package_id);

            $ends_at = Carbon::now()->addMonths($package->duration)->format('Y-m-d H:i:s');

            PackageUser::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'ends_at' => $ends_at,
            ]);

            DB::commit();

            toastr()->success('Publisher Created Successfully');

            return redirect()->route('publisher.index');

        }catch (\Exception $e){
            DB::rollBack();

            return redirect()->back()->with($e);
        }


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
        $publisher = User::findOrFail($id);
        $packages = Package::query()->get();

        return view('dashboard.publishers.edit', compact('publisher', 'packages'));
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
        $publisher = User::query()->findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'password' => 'nullable|min:8',
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        DB::beginTransaction();

        try {

            $publisher->update($input);

            $package = Package::query()->findOrFail($request->package_id);

            $ends_at = Carbon::now()->addMonths($package->duration)->format('Y-m-d H:i:s');

            PackageUser::updateOrCreate(
                [
                    'user_id' => $publisher->id,
                ],[
                    'user_id' => $publisher->id,
                    'package_id' => $input['package_id'],
                    'ends_at' =>  $ends_at,
                ]
            );

            DB::commit();

            toastr()->success('Publisher Updated Successfully');

            return redirect()->route('publisher.index');

        }catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $publisher = User::query()->findOrFail($request->id)->delete();
    }
}
