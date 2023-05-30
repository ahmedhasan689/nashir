<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $blogs = Blog::query()->paginate(8);

        if( $request->ajax() ) {
            return view('dashboard.blogs._table', compact('blogs'))->render();
        }

        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::query()->where('status', 1)->get();

        return view('dashboard.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $inputs = $request->all();
        $inputs['admin_id'] = Auth::guard('admin')->id();

        // Store Cover Image
        if( $request->hasFile('cover_image') ) {

            $file = $request->file('cover_image');

            $inputs['cover_image'] = $file->store('/uploads/cover_images', [
                'disk' => 'public'
            ]);
        }

        Blog::create($inputs);

        toastr()->success(__('lang.blog_created'));

        return redirect()->route('blog_dashboard.index');
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
        $blog = Blog::query()->findOrFail($id);
        $categories = Category::query()->where('status', 1)->get();

        return view('dashboard.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::query()->findOrFail($id);

        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $inputs = $request->all();
        $inputs['admin_id'] = Auth::guard('admin')->id();

        // Store Cover Image
        if( $request->hasFile('cover_image') ) {

            $file = $request->file('cover_image');

            $inputs['cover_image'] = $file->store('/uploads/cover_images', [
                'disk' => 'public'
            ]);
        }

        $blog->update($inputs);

        toastr()->success(__('lang.blog_created'));

        return redirect()->route('blog_dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $blog = Blog::query()->findOrFail($request->id)->delete();

        return response()->json([
            'status' => 'done',
        ]);
    }
}
