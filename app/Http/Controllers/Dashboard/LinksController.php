<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(Request $request)
    {
        $links = Link::query()->get();

        if( $request->ajax() ) {
            return view('dashboard.links._table', compact('links'))->render();
        }

        return view('dashboard.links.index', compact('links'));
    }

    public function changeStatus(Request $request)
    {
        $link = Link::query()->findOrFail($request->id);

        $link->update([
            'status' => !$link->status,
        ]);
    }
}
