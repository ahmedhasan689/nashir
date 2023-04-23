<x-dashboard-layout title="{{ __('lang.create_package') }}" subTitle="{{ __('lang.create') }}">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                <span class="">
                                    {{ __('lang.create_package') }}
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('package.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.name_ar') }}
                                        </label>
                                        <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control form-control-solid @error('name_ar') is-invalid @enderror" placeholder="{{ __('lang.enter_name_ar') }}"/>
                                        @error('name_ar')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.name_en') }}
                                        </label>
                                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control form-control-solid @error('name_en') is-invalid @enderror" placeholder="{{ __('lang.enter_name_en') }}"/>
                                        @error('name_en')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.views_number') }}
                                        </label>
                                        <input type="text" name="views_number" value="{{ old('views_number') }}" class="form-control form-control-solid @error('views_number') is-invalid @enderror" placeholder="{{ __('lang.enter_views_number') }}"/>
                                        @error('views_number')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.bonus_value') }}
                                        </label>
                                        <input type="text" name="bonus_value" value="{{ old('bonus_value') }}" class="form-control form-control-solid @error('bonus_value') is-invalid @enderror" placeholder="{{ __('lang.enter_bonus_value') }}"/>
                                        @error('bonus_value')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.price') }}
                                        </label>
                                        <input type="text" name="price" value="{{ old('price') }}" class="form-control form-control-solid @error('price') is-invalid @enderror" placeholder="{{ __('lang.enter_price') }}"/>
                                        @error('price')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex gap-2 justify-content-start">
                                    <button type="submit" class="btn btn-success">
                                        Submit
                                    </button>
                                    <a href="{{ route('package.index') }}" class="btn btn-secondary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
