<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Share;
use App\Models\Visitor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShareController extends Controller
{
    public function index()
    {
        $shares = Share::query()->with('advertisements')->where('user_id', Auth::id())->select( 'advertisement_id')->groupBy('advertisement_id')->get();

        return view('user_dashboard.share.index', compact('shares'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        Share::create([
            'user_id' => Auth::id(),
            'advertisement_id' => $request->advertisement_id,
            'type' => $request->type,
        ]);

        return response()->json([
           'success' => 'Sharing Done!',
        ]);
    }

    public function show($id, $type)
    {
        $data['advertisement'] = Advertisement::query()->findOrFail($id);

        if( $type == 'publisher' ) {
            // Share Collection => [ Social Count ]
            $data['shares'] = Share::query()->with('advertisements')
                ->where('advertisement_id', $id)
                ->where('user_id', Auth::id())
                ->select( 'advertisement_id')
                ->groupBy('advertisement_id')
                ->get();

            // Visitors Count
            $data['visitors'] = Visitor::query()->with('advertisements')
                ->where('advertisement_id', $id)
                ->where('user_id', Auth::id())
                ->count();

            $data['share_statistics'] = Share::where('user_id', Auth::id())
                ->where('advertisement_id', $id)
                ->select('type')
                ->selectRaw(DB::raw("COUNT(type) as count"))
                ->groupBy('type')
                ->orderByDesc('count')
                ->get();

            $data['visitor_statistics'] = Visitor::where('user_id', Auth::id())
                ->where('advertisement_id', $id)
                ->select('type')
                ->selectRaw(DB::raw("COUNT(type) as count"))
                ->groupBy('type')
                ->orderByDesc('count')
                ->get();

            $data['visitor_statistics_chart'] = Visitor::where('advertisement_id', $id)->orderBy('created_at')->get()->groupBy(function($data) {
                return \Carbon\Carbon::parse($data->created_at)->format('F');
            })->map(function($entries) {
                return $entries->count();
            })->toArray();

        }elseif( $type == 'advertiser' ) {

            // Share Collection => [ Social Count ]
            $data['shares'] = Share::query()->with('advertisements')
                ->where('advertisement_id', $id)
                ->select( 'advertisement_id')
                ->groupBy('advertisement_id')
                ->get();

            // Visitors Count
            $data['visitors'] = Visitor::query()->with('advertisements')
                ->where('advertisement_id', $id)
                ->count();

            $data['share_statistics'] = Share::where('advertisement_id', $id)
                ->select('type')
                ->selectRaw(DB::raw("COUNT(type) as count"))
                ->groupBy('type')
                ->orderByDesc('count')
                ->get();

            $data['visitor_statistics'] = Visitor::where('advertisement_id', $id)
                ->select('type')
                ->selectRaw(DB::raw("COUNT(type) as count"))
                ->groupBy('type')
                ->orderByDesc('count')
                ->get();

            $data['visitor_statistics_chart'] = Visitor::where('advertisement_id', $id)->orderBy('created_at')->get()->groupBy(function($data) {
                return \Carbon\Carbon::parse($data->created_at)->format('F');
            })->map(function($entries) {
                return $entries->count();
            })->toArray();

        }




        return view('user_dashboard.share.show', $data);
    }
}
