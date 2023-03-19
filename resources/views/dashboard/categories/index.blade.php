<x-dashboard-layout title="Category List" subTitle="Index">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6 d-flex " style="flex-direction: column; gap: 5px">
                        <!--begin::Card title-->
                        <div class="card-title d-flex justify-content-between">
                            <div class="d-flex align-items-center position-relative my-1" >
                                <h5 class="count">
                                    Category List ( {{ $categories->count() }} )
                                </h5>
                            </div>

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <!--begin::Add customer-->
                                    <a href="{{ route('category_dashboard.create') }}" class="btn btn-primary">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                        <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        Add Category
                                    </a>
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Toolbar-->

                            </div>
                            <!--end::Card toolbar-->
                        </div>

                        <div class="d-flex" style="flex-direction: row; gap: 5px">
                            <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6" style="top: 105px">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" name="name" class="form-control form-control-solid w-250px ps-15 categoryName" placeholder="Search Category" />

                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <select class="form-select form-select-solid status" aria-label="Select example" name="status">
                                    <option value="">Open this select menu</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        @include('dashboard.categories.table')
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

    @push('js')
        <script>
            $(document).on('click', '.categoryDeleteBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('category_dashboard.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Deleted The Category!',
                            'success'
                        );

                        $('#categoryDeleteModal-'+id).modal('hide');


                        $.ajax({
                            url: "{{ route('category_dashboard.index') }}"
                        }).done(function(data) {
                            $('.tableData').html(data);
                        })
                    },
                    error: function(data) {

                    }

                })
            });

            $(document).on('click', '.statusBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('category_dashboard.changeStatus') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Change The Status Of Category!',
                            'success'
                        );

                        $.ajax({
                            url: "{{ route('category_dashboard.index') }}"
                        }).done(function(data) {
                            $('.tableData').html(data);
                        })
                    },
                    error: function(data) {

                    }

                })
            });

            $(document).on('input', '.categoryName', function(e) {
                var value = $(this).val();
                var status = $('.status').val();

                if( value.length >= 3 ) {
                    $.ajax({
                        url: "{{ route('category_dashboard.index') }}",
                        type: "GET",
                        data: {
                            name: value,
                            status: status,
                        },
                    }).done(function(data) {
                        $('.tableData').html(data);
                    });
                }
            });

            $(document).on('change', '.status', function(e) {
                var value = $('.categoryName').val();
                var status = $(this).val();

                $.ajax({
                    url: "{{ route('category_dashboard.index') }}",
                    type: "GET",
                    data: {
                        name: value,
                        status: status,
                    },
                }).done(function(data) {
                    $('.tableData').html(data);
                });

            });
        </script>
    @endpush
</x-dashboard-layout>
