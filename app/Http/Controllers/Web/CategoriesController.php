<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $categories = Category::query()->where('status', 1)->get();

        $countries = Country::query()->where('status', 1)->get();

        return view('web.category.index', compact('categories', 'countries'));
    }

    public function show($id)
    {
        //
    }
}
