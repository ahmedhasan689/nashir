<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $contact_us = ContactUs::query()->tableFilters()->paginate(10);

        if( $request->ajax() ) {
            return view('dashboard.contact_us._table', compact('contact_us'))->render();
        }

        return view('dashboard.contact_us.index', compact('contact_us'));
    }

    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required|numeric',
                'subject' => 'required',
                'message' => 'required|max:250'
        ]);


        $inputs = $request->all();

        ContactUs::create($inputs);

        toastr()->success(__('lang.message_done'));

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        $contact = ContactUs::query()->findOrFail($request->id)->delete();

        return response()->json([
            'status' => 'done',
        ]);
    }
}
