<x-dashboard-layout title="{{ __('lang.settings_list') }}" subTitle="{{ __('lang.index') }}">
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
                                    {{ __('lang.settings_count', ['count' => $settings->count()]) }}
                                </h5>
                            </div>
                        </div>

                    </div>

                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        @include('dashboard.settings._table')
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</x-dashboard-layout>
