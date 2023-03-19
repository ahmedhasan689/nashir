<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdvertisementRequest;
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

class AdvertisementController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $advertisements = Advertisement::query()->where('user_id', Auth::id())->get();

        if( $request->ajax() ) {
            return view('user_dashboard.advertisement.table', compact('advertisements'))->render();
        }

        return view('user_dashboard.advertisement.index', compact('advertisements'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();

        return view('user_dashboard.advertisement.create', compact('countries', 'categories'));
    }

    /**
     * @param CreateAdvertisementRequest $request
     * @return RedirectResponse|void
     */
    public function store(CreateAdvertisementRequest $request)
    {
        DB::beginTransaction();

        try{
            // Upload Cover Image
            $cover_image = null;
            if( $request->hasFile('cover_image') ) {
                $file = $request->file('cover_image');

                $cover_image = $file->store('uploads/cover_image', [
                    'disk' => 'public',
                ]);
            }

            $advertisement = Advertisement::create([
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

            DB::commit();

            toastr()->success('Advertisement Added Successfully');

            return redirect()->route('advertisement.index');

        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show(Request $request, $id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);

        if ( $request->ajax() ) {
            return view('user_dashboard.advertisement.show_form', compact('advertisement'))->render();
        }

        return view('user_dashboard.advertisement.show', compact('advertisement'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $advertisement = Advertisement::query()->findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();

        return view('user_dashboard.advertisement.edit', compact('advertisement','countries', 'categories'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse|void
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

            return redirect()->route('advertisement.index');

        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

    /**
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

        return redirect()->route('advertisement.index');
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
}
