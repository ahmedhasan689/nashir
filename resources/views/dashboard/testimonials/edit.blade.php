<x-dashboard-layout title="{{ __('lang.edit_testimonial') }}" subTitle="{{ __('lang.edit') }}">
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
                                    {{ __('lang.edit_testimonial') }}
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('testimonial.update', ['id' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.name') }}
                                        </label>
                                        <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter Name"/>
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.job') }}
                                        </label>
                                        <input type="text" name="job" value="{{ $testimonial->job }}" class="form-control form-control-solid @error('job') is-invalid @enderror" placeholder="Example input"/>
                                        @error('job')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.content') }}
                                        </label>
                                        <input type="text" name="content" value="{{ $testimonial->content }}" class="form-control form-control-solid @error('content') is-invalid @enderror" placeholder="Enter Name"/>
                                        @error('content')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.avatar') }}
                                        </label>
                                        <input type="file" name="avatar" value="" class="form-control form-control-solid @error('avatar') is-invalid @enderror"/>
                                        @error('avatar')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <img src="{{ $testimonial->image_path }}" width="150" height="150" class="imageShow">
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.status') }}
                                        </label>
                                        <input class="form-check-input" name="status" type="checkbox" value="1" id="flexCheckDefault" @if( $testimonial->status == 1 ) checked @endif>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex gap-2 justify-content-start">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('lang.submit') }}
                                    </button>
                                    <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">
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
