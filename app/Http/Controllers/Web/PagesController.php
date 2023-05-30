<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function packagePage()
    {
        $packages = Package::query()->get();

        return view('web.pages.package', compact('packages'));
    }

    public function contactUs()
    {
        return view('web.pages.contactUs');
    }

    public function aboutUs()
    {
        return view('web.pages.aboutUs');
    }

}
