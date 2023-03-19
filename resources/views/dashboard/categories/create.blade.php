<x-dashboard-layout title="Create Category" subTitle="Create">
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
                                    Create Category
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('category_dashboard.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_type" value="advertiser">

                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="exampleFormControlInput1" class="required form-label">Category Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter Name"/>
                                        @error('name')
                                        <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <div class="mb-10">
                                        <label for="formFile" class="form-label">Cover Image</label>
                                        <input class="form-control @error('cover_image') is-invalid @enderror" type="file" name="cover_image" id="formFile"  onchange="loadFile(event)">
                                        @error('cover_image')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-10">
                                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                                            <input class="form-check-input" type="checkbox" value="1" name="status" id="flexRadioLg"/>
                                            <label class="form-check-label" for="flexRadioLg">
                                                Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-10">
                                        <img src="{{ asset('assets/images/no-image.png') }}" class="d-none" id="imageDisplay" alt="image" width="150" height="150">
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

    @push('js')
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
    @endpush
</x-dashboard-layout>
