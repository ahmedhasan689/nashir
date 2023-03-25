<x-dashboard-layout title="{{ __('lang.account') }}" subTitle="{{ __('lang.index') }}">
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">
                    {{ __('lang.account_details') }}
                </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            @include('user_dashboard.account.form')
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

    {{-- OTP Modal --}}
    <div class="modal fade" tabindex="-1" id="OTPModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __('lang.send_otp') }}
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>
                        {{ __('lang.send_otp_body', ['phone_number' => $user->phone_number]) }}
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        {{ __('lang.close') }}
                    </button>
                    <button type="button" class="btn btn-primary sendOTP">
                        {{ __('lang.send') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Verification Code Modal --}}
    <div class="modal fade" tabindex="-1" id="verificationCode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __('lang.otp_code') }}
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>
                        {{ __('lang.otp_code_body') }}
                    </p>
                    <input type="text" name="code" class="form-control form-control-lg form-control-solid code" placeholder="{{ __('lang.confirm_password') }}"/>
                    <span class="text-danger otpError"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary checkOTP">
                        {{ __('lang.check') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).on('click', '.sendOTP', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('otp.store') }}",
                    type: "GET",
                }).done(function(e) {
                    $('#OTPModal').modal('hide');
                    $('#verificationCode').modal('show');
                });
            });

            $(document).on('click', '.checkOTP', function(e) {
                e.preventDefault();

                var code = $('.code').val(),
                    phone_number = {{ $user->phone_number }};

                    console.log(phone_number);

                $.ajax({
                    url: "{{ route('otp.verify') }}",
                    type: "GET",
                    data: {
                        code: code,
                        phone_number: phone_number,
                    },
                    success: function(data) {

                        Swal.fire(
                            'Good job!',
                            'Your Number Is Verified!',
                            'success'
                        );

                        $('#verificationCode').modal('hide');

                        $.ajax({
                            url: "{{ route('account.index') }}",
                            type: "GET",
                        }).done(function(data){
                            $('#kt_account_profile_details').html(data);
                        })
                    },
                    error: function(data) {
                        $('.otpError').removeClass('d-none');
                        $('.otpError').empty();
                        $('.otpError').html(data.responseJSON.error);
                    }
                })
            });
        </script>
    @endpush
</x-dashboard-layout>
