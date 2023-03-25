<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use App\Notifications\SendOTPNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;

class OtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function store(Request $request)
    {
        $phone_number = Auth::guard('web')->user()->phone_number;

        $code = rand(111111, 999999);

        OTP::updateOrCreate([
            'phone_number' => $phone_number,
        ],[
            'code' => Hash::make($code),
        ]);

        Notification::route('vonage', $phone_number)
            ->notify(new SendOTPNotification($code));

        return [
            'message' => 'Done',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify(Request $request)
    {
        $otp = OTP::findOrFail('+'.$request->phone_number);



        if( !Hash::check($request->code, $otp->code) ) {
            return Response::json([
                'error' => __('lang.invalid_code'),
            ], 422);
        }

        $otp->delete();
        $user = User::query()->where('phone_number', "+".$request->phone_number)->first();

        $user->update([
            'phone_verified_at' => now(),
        ]);
    }
}
