<x-dashboard-layout title="Edit Advertisement" subTitle="Edit">
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
                                    Show Advertisement
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="user_type" value="advertiser">

                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Title</label>
                                        <input type="text" name="title" value="{{ $advertisement->title }}" class="form-control form-control-solid" placeholder="Enter Title" disabled/>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Description</label>
                                        <textarea type="text" name="description" class="form-control form-control-solid" placeholder="Enter Description" disabled>
                                            {{ $advertisement->description }}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Features</label>
                                        <textarea type="text" name="features" id="descriptionEditor" class="form-control form-control-solid" placeholder="Enter Description" disabled>
                                            {{ $advertisement->features }}
                                        </textarea>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="input-group mb-10">
                                            <label class="input-group-text" for="inputGroupFile01">Cover Image</label>
                                            <input type="file" name="cover_image" class="form-control" id="inputGroupFile01" disabled>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="mb-10">
                                            <img src="{{ asset('storage') . '/' . $advertisement->cover_image }}" id="imageDisplay" alt="image" width="150" height="150">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="mediaType" aria-label="Floating label select example" name="media_type" disabled>
                                                <option selected>Open this select menu</option>
                                                <option value="advertiser" @if( $advertisement->media_type == 'advertiser' ) selected @endif>By Me</option>
                                                <option value="admin" @if( $advertisement->media_type == 'admin' ) selected @endif>Let Admin Decide</option>
                                            </select>
                                            <label for="mediaType">Media Type</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Floating label select example" name="country_id" disabled>
                                                <option selected>Select Country From menu</option>
                                                @foreach( $countries as $country )
                                                    <option value="{{ $country->id }}" @if( $country->id == $advertisement->country->id ) selected @endif>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="mediaType">Country</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select"  aria-label="Floating label select example" name="category_id" disabled>
                                                <option selected>Select Category From menu</option>
                                                @foreach( $categories as $category )
                                                    <option value="{{ $category->id }}" @if( $category->id == $advertisement->category->id ) selected @endif>
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
                                            <input class="form-check-input" name="is_featured" value="1" type="checkbox" id="flexCheckDefault" @if( $advertisement->is_featured == 1 ) checked @endif disabled />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Is Featured
                                            </label>
                                        </div>
                                    </div>
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
