<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $testimonials = Testimonials::query()->paginate(8);

        if( $request->ajax() ) {
            return view('dashboard.testimonials._table', compact('testimonials'))->render();
        }

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.testimonials.create');
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
            'name' => 'required',
            'content' => 'required',
            'job' => 'required',
            'avatar' => 'required',
        ]);

        $inputs = $request->all();
        if(!isset($inputs['status'])) {
            $inputs['status'] = 0;
        }

        // Store Avatar
        if( $request->hasFile('avatar') ) {
            $file = $request->file('avatar');

            $inputs['avatar'] = $file->store('/uploads/avatars', [
                'disk' => 'public'
            ]);
        }

        Testimonials::create($inputs);

        toastr()->success(__('lang.testimonial_created'));

        return redirect()->route('testimonial.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $testimonial = Testimonials::query()->findOrFail($id);

        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonials::query()->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'job' => 'required',
            'avatar' => 'nullable',
        ]);

        $inputs = $request->all();

        if(!isset($inputs['status'])) {
            $inputs['status'] = 0;
        }
        // Store Avatar
        if( $request->hasFile('avatar') ) {

            $file = $request->file('avatar');

            $inputs['avatar'] = $file->store('/uploads/avatars', [
                'disk' => 'public'
            ]);
        }

        $testimonial->update($inputs);

        toastr()->success(__('lang.testimonial_created'));

        return redirect()->route('testimonial.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $testimonial = Testimonials::query()->findOrFail($request->id)->delete();

        return response()->json([
            'status' => 'done',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $testimonial = Testimonials::query()->where('id', $request->id)->first();

        $testimonial->update([
           'status' => !$testimonial->status,
        ]);
    }
}
