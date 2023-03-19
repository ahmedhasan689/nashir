<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $categories  = Category::query()->tableFilters()->paginate(5);

        if( $request->ajax() ) {
            return view('dashboard.categories.table', compact('categories'))->render();
        }

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cover_image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image_path = null;

        if($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');

            $image_path = $file->store('uploads', [
                'disk' => 'public',
            ]);
        }

        Category::create([
            'name' => $request->name,
            'cover_image' => $image_path,
            'status' => $request->status ?? 0,
        ]);

        toastr()->success('Category Successfully Created');

        return redirect()->route('category_dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
        $category = Category::query()->findOrFail($id);

        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = Category::query()->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'cover_image' => 'nullable|mimes:jpeg,jpg,png',
        ]);

        $input = $request->all();

        if(!empty($input['cover_image'])){

            $image_path = null;

            if($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');

                $image_path = $file->store('uploads', [
                    'disk' => 'public',
                ]);
            }

            $input['cover_image'] = $image_path;
        }else{
            $input = Arr::except($input,array('cover_image'));
        }

        $category->update($input);

        toastr()->success('Category Successfully Updated');

        return redirect()->route('category_dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $category = Category::query()->findOrFail($request->id)->delete();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function changeStatus(Request $request)
    {
        $category = Category::query()->findOrFail($request->id);

        $category->update([
            'status' => !$category->status,
        ]);
    }
}
