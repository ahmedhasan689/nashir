<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = Blog::query()->paginate(10);
        $settings = Setting::query()->get();
        $last_blogs = Blog::query()->orderByDesc('created_at')->limit(3)->get();

        return view('web.blogs.index', compact('blogs', 'settings', 'last_blogs'));
    }

    /**
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $settings = Setting::query()->get();
        $last_blogs = Blog::query()->orderByDesc('created_at')->limit(3)->get();

        return view('web.blogs.show', compact('blog', 'settings', 'last_blogs'));
    }


    public function search(Request $request)
    {
        $blogs = Blog::where('title_en', 'like', "%$request->search%")->paginate(10);

        $settings = Setting::query()->get();
        $last_blogs = Blog::query()->orderByDesc('created_at')->limit(3)->get();

        return view('web.blogs.index', compact('blogs', 'settings', 'last_blogs'));
    }
}
