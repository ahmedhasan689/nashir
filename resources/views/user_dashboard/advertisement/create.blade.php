<x-dashboard-layout title="Create Advertisement" subTitle="Create">
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
                                    Create Advertisement
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('advertisement.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_type" value="advertiser">

                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="Enter Title"/>
                                        @error('title')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Description</label>
                                        <textarea type="text" name="description" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder="Enter Description">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Features</label>
                                        <textarea type="text" name="features" id="descriptionEditor" class="form-control form-control-solid @error('features') is-invalid @enderror" placeholder="Enter Description">
                                            {{ old('features') }}
                                        </textarea>
                                        @error('features')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="input-group mb-10">
                                            <label class="input-group-text" for="inputGroupFile01">Cover Image</label>
                                            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" id="inputGroupFile01" onchange="loadFile(event)">
                                        </div>
                                        @error('cover_image')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="mb-10">
                                            <img src="{{ asset('assets/images/no-image.png') }}" class="d-none" id="imageDisplay" alt="image" width="150" height="150">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="mediaType" aria-label="Floating label select example" name="media_type">
                                                <option selected>Open this select menu</option>
                                                <option value="advertiser">By Me</option>
                                                <option value="admin">Let Admin Decide</option>
                                            </select>
                                            <label for="mediaType">Media Type</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="media">
                                        <div class="input-group mb-10">
                                            <label class="input-group-text" for="inputGroupFile01">Media</label>
                                            <input type="file" name="media[]" class="form-control @error('media') is-invalid @enderror" id="inputGroupFile01" multiple>
                                        </div>
                                        @error('media')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Floating label select example" name="country_id">
                                                <option selected>Select Country From menu</option>
                                                @foreach( $countries as $country )
                                                    <option value="{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <label for="mediaType">Country</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select"  aria-label="Floating label select example" name="category_id">
                                                <option selected>Select Category From menu</option>
                                                @foreach( $categories as $category )
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <label>Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-check form-check-custom form-check-solid form-check-md">
                                            <input class="form-check-input" name="is_featured" value="1" type="checkbox" id="flexCheckDefault"/>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Is Featured
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex gap-2 justify-content-start">
                                    <button type="submit" class="btn btn-success">
                                        Submit
                                    </button>
                                    <a href="{{ route('advertiser.index') }}" class="btn btn-secondary">
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
    @push('js')
        <script>
            ClassicEditor
                .create(document.querySelector('#descriptionEditor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('imageDisplay');
                output.classList.remove("d-none");
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <script>
            $(document).on('change', '#mediaType', function(e) {
                var value = $(this).val();

                if( value === 'advertiser' ) {
                    $('#media').removeClass('d-none');
                }else{
                    $('#media').addClass('d-none');
                }
            })
        </script>
    @endpush
</x-dashboard-layout>
