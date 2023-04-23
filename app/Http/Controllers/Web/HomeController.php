<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Country;
use App\Models\Share;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * ? Home Page
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['categories'] = Category::query()->withCount('advertisements')->where('status', 1)->get();

        $data['countries'] = Country::query()->where('status', 1)->get();

        $data['popular_ads'] = Share::query()->with('advertisements')->select('advertisement_id')->groupBy('advertisement_id')->orderByDesc('advertisement_id')->limit(4)->get();
        $data['recent_ads'] = Advertisement::query()->orderByDesc('created_at')->limit(4)->get();

        return view('web.home', $data);
    }
}
