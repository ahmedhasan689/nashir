<!--begin::Form-->
<form action="{{ route('account.update', ['id' => $user->id]) }}" method="POST" class="form">
    @csrf
    @method('PUT')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                {{ __('lang.first_name') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row">
                        <input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" placeholder="{{ __('lang.first_name') }}" value="{{ $user->first_name }}" />
                        @error('first_name')
                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                {{ __('lang.last_name') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row">
                        <input type="text" name="last_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('last_name') is-invalid @enderror" placeholder="{{ __('lang.last_name') }}" value="{{ $user->last_name }}" />
                        @error('last_name')
                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                {{ __('lang.email') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="{{ __('lang.email') }}" value="{{ $user->email }}" />
                @error('email')
                <span class="text-danger">
                                    {{ $message }}
                                </span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">
                                {{ __('lang.phone_number') }}
                            </span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="tel" name="phone_number" class="form-control form-control-lg form-control-solid @error('phone_number') is-invalid @enderror" placeholder="{{ __('lang.phone_number') }}" value="{{ $user->phone_number }}" />
                @error('phone_number')
                <span class="text-danger">
                                    {{ $message }}
                                </span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                {{ __('lang.password') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" placeholder="{{ __('lang.password') }}"/>
                @error('password')
                <span class="text-danger">
                                    {{ $message }}
                                </span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                {{ __('lang.confirm_password') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="password_confirmation" class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('lang.confirm_password') }}"/>
                @error('password_confirmation')
                <span class="text-danger">
                                    {{ $message }}
                                </span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                {{ __('lang.email_confirmation') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <!--begin::Options-->
                <div class="d-flex align-items-center mt-3">
                    @if( !$user->email_verified_at )
                        <a href="#" type="submit" class="btn btn-primary">
                            {{ __('lang.confirm_email') }}
                        </a>
                    @else
                        <span class="text-success">
                                        <i class="bi bi-check-circle-fill fs-2x text-success"></i>
                                    </span>
                    @endif
                </div>
                <!--end::Options-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                {{ __('lang.phone_confirmation') }}
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <!--begin::Options-->
                <div class="d-flex align-items-center mt-3">
                    @if( !$user->phone_verified_at )
                        <a href="#" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#OTPModal">
                            {{ __('lang.confirm_phone') }}
                        </a>
                    @else
                        <span class="text-success">
                           <i class="bi bi-check-circle-fill fs-2x text-success"></i>
                        </span>
                    @endif
                </div>
                <!--end::Options-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card body-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary">
            {{ __('lang.submit') }}
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
