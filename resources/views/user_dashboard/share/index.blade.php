<x-dashboard-layout title="{{ __('lang.share_list_title') }}" subTitle="{{ __('lang.index') }}">
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
                                    {{ __('lang.share_list', ['count' => $shares->count()]) }}
                                </h5>
                            </div>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 tableData">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                <th class="min-w-125px">#</th>
                                <th class="min-w-125px">{{ __('lang.title') }}</th>
                                <th class="min-w-125px">{{ __('lang.user_name') }}</th>
                                <th class="min-w-125px">{{ __('lang.category_name') }}</th>
                                <th class="min-w-125px">{{ __('lang.visitors') }}</th>
                                <th class="text-end min-w-70px">{{ __('lang.actions') }}</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                            @if( $shares->count() > 0 )
                                @foreach( $shares as $key => $share )
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                                                    {{ $key+=1 }}
                                                </a>
                                            </td>
                                            <!--end::Key=-->

                                            <!--begin::Name=-->
                                            <td>
                                                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                                                    {{ $share->advertisements->title }}
                                                </a>
                                            </td>
                                            <!--end::Name=-->
                                            <!--begin::Email=-->
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">
                                                    {{ $share->advertisements->user->first_name }}
                                                </a>
                                            </td>
                                            <!--end::Email=-->
                                            <!--begin::Phone Number=-->
                                            <td>
                                                {{ $share->advertisements->country->name }}
                                            </td>
                                            <!--end::Company=-->

                                            <!--begin::Date=-->
                                            <td>
                                                <span class="text-gray-600 text-hover-primary mb-1">
                                                    {{ \App\Models\Visitor::where('user_id', auth()->user()->id)->where('advertisement_id', $share->advertisements->id)->count() }}
                                                </span>
                                            </td>
                                            <!--end::Date=-->

                                            <!--begin::Action=-->
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                   data-kt-menu-flip="top-end">
                                                    Actions
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('share.show', ['id' => $share->advertisements->id, 'type' => 'publisher']) }}" class="menu-link px-3">Show</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-danger text-center" colspan="7">
                                        There is No Share
                                    </td>
                                </tr>
                            @endif


                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->

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
