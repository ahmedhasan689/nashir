<x-dashboard-layout title="{{ __('lang.add_blogs') }}" subTitle="{{ __('lang.create') }}">
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
                                    {{ __('lang.add_blogs') }}
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('blog_dashboard.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.title_ar') }}
                                        </label>
                                        <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control form-control-solid @error('title_ar') is-invalid @enderror" placeholder="Enter Name"/>
                                        @error('title_ar')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.title_en') }}
                                        </label>
                                        <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control form-control-solid @error('title_en') is-invalid @enderror" placeholder="Example input"/>
                                        @error('title_en')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.description_ar') }}
                                        </label>
                                        <textarea name="description_ar" id="description_ar" class="form-control form-control-solid @error('description_ar') is-invalid @enderror" placeholder="Example input">
                                            {{ old('description_ar') }}
                                        </textarea>
                                        @error('description_ar')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.description_en') }}
                                        </label>
                                        <textarea name="description_en" id="description_en" class="form-control form-control-solid @error('description_en') is-invalid @enderror" placeholder="Example input">
                                            {{ old('description_en') }}
                                        </textarea>
                                        @error('description_en')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6 col-sm-12"  style="margin-top: 25px">
                                    <div class="form-floating">
                                        <select class="form-select" aria-label="Floating label select example" name="category_id">
                                            <option selected>
                                                {{ __('lang.select_category') }}
                                            </option>
                                            @foreach( $categories as $category )
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="mediaType">{{ __('lang.category') }}</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">
                                            {{ __('lang.cover_image') }}
                                        </label>
                                        <input type="file" name="cover_image" value="{{ old('cover_image') }}" class="form-control form-control-solid @error('cover_image') is-invalid @enderror"/>
                                        @error('cover_image')
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
                                        {{ __('lang.submit') }}
                                    </button>
                                    <a href="{{ route('blog_dashboard.index') }}" class="btn btn-secondary">
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
    @push('js')
        <script src="{{ asset('dashboard_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#description_ar'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#description_en'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            // ClassicEditor.replace("description_en");

        </script>
    @endpush
</x-dashboard-layout>
