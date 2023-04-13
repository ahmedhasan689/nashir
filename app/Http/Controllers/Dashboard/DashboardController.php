<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['advertisers'] = User::query()->where('user_type', 'advertiser')->orderBy('created_at')->limit(5)->get();
        $data['publishers'] = User::query()->where('user_type', 'publisher')->orderBy('created_at')->limit(5)->get();
        return view('dashboard.index', $data);
    }
}
