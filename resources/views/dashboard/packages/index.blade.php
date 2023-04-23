<x-dashboard-layout title="{{ __('lang.packages_list') }}" subTitle="{{ __('lang.index') }}">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <h5 class="count">
                                    {{ __('lang.packages_list')}} ( {{ $packages->count() }} )
                                </h5>
                            </div>
                        </div>

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Add customer-->
                                <a href="{{ route('package.create') }}" class="btn btn-primary">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    {{ __('lang.add_package') }}
                                </a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->

                        </div>
                        <!--end::Card toolbar-->
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        @include('dashboard.packages._table')
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
            $(document).on('click', '.packageDeleteBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                console.log(id);

                $.ajax({
                    url: "{{ route('package.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Deleted The Package!',
                            'success'
                        );

                        $('#packageDeleteModal-'+id).modal('hide');


                        $.ajax({
                            url: "{{ route('package.index') }}"
                        }).done(function(data) {
                            $('.tableData').html(data);
                        })
                    },
                    error: function(data) {

                    }

                })
            });
        </script>
    @endpush
</x-dashboard-layout>
