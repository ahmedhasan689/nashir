<x-dashboard-layout title="Show Media" subTitle="Show">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card show_form">
                    @include('dashboard.advertisements.media_content')
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).on('click', '.deleteMedia', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('advertisement_dashboard.deleteMedia') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $.ajax({
                            url: "{{ route('advertisement_dashboard.showMedia', ['id' => $advertisement->id]) }}"
                        }).done(function(data) {
                            $('.show_form').html(data);
                        })
                    },
                    error: function(data) {

                    }
                })
            });
        </script>
    @endpush
</x-dashboard-layout>
