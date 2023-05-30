<x-dashboard-layout title="{{ __('lang.contact_list_title') }}" subTitle="{{ __('lang.index') }}">
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
                                    {{ __('lang.contact_list', ['count' => $contact_us->count() ?? 0]) }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        @include('dashboard.contact_us._table')
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
            $(document).on('click', '.contactDeleteBtn', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('contact_dashboard.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Good job!',
                            'You Deleted The Contact!',
                            'success'
                        );

                        $('#contactDeleteModal-'+id).modal('hide');


                        $.ajax({
                            url: "{{ route('contact_dashboard.index') }}"
                        }).done(function(data) {
                            $('.tableData').html(data);
                        })
                    },
                    error: function(data) {

                    }

                })
            });

            $(document).on('input', '.contactName', function(e) {
                var value = $(this).val();
                var email = $('.email').val();

                if( value.length >= 3 ) {
                    $.ajax({
                        url: "{{ route('contact_dashboard.index') }}",
                        type: "GET",
                        data: {
                            name: value,
                            email: email,
                        },
                    }).done(function(data) {
                        $('.tableData').html(data);
                    });
                }
            });

            $(document).on('change', '.email', function(e) {
                var value = $('.categoryName').val();
                var email = $(this).val();

                $.ajax({
                    url: "{{ route('category_dashboard.index') }}",
                    type: "GET",
                    data: {
                        name: value,
                        email: email,
                    },
                }).done(function(data) {
                    $('.tableData').html(data);
                });

            });
        </script>
    @endpush
</x-dashboard-layout>
