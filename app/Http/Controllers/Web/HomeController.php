<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Country;
use App\Models\Setting;
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

        $data['ad_countries'] = Advertisement::query()->with('country', function($query) {
            $query->withCount('advertisements');
        })->select('country_id')->groupBy('country_id')->orderByDesc('country_id')->limit(5)->get();

        $data['blogs'] = Blog::query()->orderByDesc('created_at')->limit(5)->get();

        return view('web.home', $data);
    }

    public function search(Request $request)
    {
        $ads = Advertisement::where(function ($q) use($request){
            if( $request->search ) {
                $q->where('title', 'like', "%$request->search%");
            }

            if( $request->country ) {
                $q->where('country_id', $request->country);
            }

            if( $request->category ) {
                $q->where('category_id', $request->category);
            }
        })->where('status', 'accepted')->paginate(10);

        $categories = Category::query()->where('status', 1)->get();
        $countries = Country::query()->where('status', 1)->get();

        return view('web.ads.index', compact('ads', 'countries', 'categories'));
    }
}
