<x-dashboard-layout title="Advertisement List" subTitle="Index">
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
                                    Advertisement List ( {{ $advertisements->count() }} )
                                </h5>
                            </div>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        @include('dashboard.advertisements.table')
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
            $(document).on('click', '.advertisementDeleteBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                console.log(id);

                $.ajax({
                    url: "{{ route('advertisement_dashboard.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Deleted The Advertisement!',
                            'success'
                        );

                        $('#advertisementDeleteModal-'+id).modal('hide');


                        $.ajax({
                            url: "{{ route('advertisement_dashboard.index', ['status' => 'under_review']) }}"
                        }).done(function(data) {
                            $('.tableData').html(data);
                        })
                    },
                    error: function(data) {

                    }

                })
            });

            $(document).on('click', '.acceptBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('advertisement_dashboard.changeStatus') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Deleted The Advertisement!',
                            'success'
                        );

                        $.ajax({
                            url: "{{ route('advertisement_dashboard.index', ['status' => 'under_review']) }}"
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
