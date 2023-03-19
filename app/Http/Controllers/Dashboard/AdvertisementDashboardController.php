<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementMedia;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request, $status)
    {
        $advertisements = Advertisement::query()->where('status', $status)->get();

        if ( $request->ajax() ) {
            return view('dashboard.advertisements.table', compact('advertisements'));
        }

        return view('dashboard.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();

        return view('dashboard.advertisements.show', compact('advertisement','countries', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();

        return view('dashboard.advertisements.edit', compact('advertisement','countries', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);

        DB::beginTransaction();

        try{
            // Upload Cover Image
            $cover_image = $advertisement->cover_image;

            if( $request->hasFile('cover_image') ) {
                $file = $request->file('cover_image');

                $cover_image = $file->store('uploads/cover_image', [
                    'disk' => 'public',
                ]);
            }

            $advertisement->update([
                'title' => $request->title,
                'description' => $request->description,
                'features' => $request->features,
                'cover_image' => $cover_image,
                'media_type' => $request->media_type,
                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
                'is_featured' => $request->is_featured ?? 0,
                'user_id' => Auth::id(),
            ]);

            DB::commit();

            toastr()->success('Advertisement Updated Successfully');

            return redirect()->route('advertisement_dashboard.index', ['status' => 'under_review']);

        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $advertisement = Advertisement::query()->findOrFail($request->id)->delete();

        return response()->json([
            'success' => 'Done',
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showMedia(Request $request, $id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);

        if( $request->ajax() ) {
            return view('dashboard.advertisements.media_content', compact('advertisement'))->render();
        }

        return view('dashboard.advertisements.show_media', compact('advertisement'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function storeMedia(Request $request, $id)
    {

        $advertisement = Advertisement::query()->findOrFail($id);
        // Upload Media If Exists
        if( $request->hasFile('media') ) {
            $files = $request->file('media');

            foreach ($files as $file) {
                $media = $file->store('uploads/media', [
                    'disk' => 'public',
                ]);

                AdvertisementMedia::create([
                    'advertisement_id' => $advertisement->id,
                    'media_url' => $media
                ]);
            }
        }

        toastr()->success('Media Added Successfully');

        return redirect()->route('advertisement_dashboard.index', ['status' => 'under_review']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteMedia(Request $request)
    {
        $media = AdvertisementMedia::query()->findOrFail($request->id)->delete();

        return response()->json([
            'success' => 'Done',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $advertisement = Advertisement::query()->findOrFail($request->id);

        $advertisement->update([
            'status' => 'accepted',
        ]);
    }
}
