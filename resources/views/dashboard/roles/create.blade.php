<x-dashboard-layout title="{{ __('lang.create_role') }}" subTitle="{{ __('lang.create') }}">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card">
                    <div class="card-header border-0 pt-6" style="border-bottom: 1px solid #EFF2F5 !important; margin-bottom: 20px; padding-bottom: 10px">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                <span class="">
                                    {{ __('lang.create_role') }}
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.role_name') }}
                                        </label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder=" {{ __('lang.role_name') }}"/>
                                        @error('name')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">
                                            {{ __('lang.permissions') . " :" }}
                                        </h5>
                                    </div>
                                    <br>
                                    <div class = "row">
                                        @foreach($permissions as $permission)
                                            <div class = "col-sm-3 my-2">
                                                <div class="form-check">
                                                    <input class="form-check-input @error('permissions') is-invalid @enderror" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="{{ $permission->id }}">
                                                    <label class="form-check-label" for="{{ $permission->id }}">
                                                        {{ app()->getLocale() === 'ar' ? $permission->name_ar : $permission->name_en }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('permissions')
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
                                    <a href="{{ route('category_dashboard.index') }}" class="btn btn-secondary">
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
