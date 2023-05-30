<x-dashboard-layout title="{{ __('lang.edit_setting') }}" subTitle="{{ __('lang.edit') }}">
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
                                    {{ __('lang.edit_setting') }}
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('setting.update', ['id' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                                @if( $setting->type == 'text' )
                                    <input type="hidden" name="text" value="text">
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1" class="required form-label">
                                                {{ __('lang.value') }}
                                            </label>
                                            <input type="text" name="value" value="{{ $setting->value }}" class="form-control form-control-solid @error('value') is-invalid @enderror" placeholder="Enter Name"/>
                                            @error('value')
                                            <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @elseif($setting->type == 'image')
                                    <input type="hidden" name="image" value="image">
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <div class="mb-10">
                                            <label for="exampleFormControlInput1" class="required form-label">
                                                {{ __('lang.value') }}
                                            </label>
                                            <input type="file" name="value" class="form-control form-control-solid @error('value') is-invalid @enderror"/>
                                            @error('value')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <img src="{{ asset('storage') . '/' . $setting->value }}" width="150" height="150" class="imageShow">
                                    </div>
                                @endif
                            <div class="row">
                                <div class="col-12 d-flex gap-2 justify-content-start">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('lang.submit') }}
                                    </button>
                                    <a href="{{ route('setting.index') }}" class="btn btn-secondary">
                                        {{ __('lang.back') }}
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
