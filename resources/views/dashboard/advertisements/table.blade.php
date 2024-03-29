<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-25px">#</th>
        <th class="min-w-125px">Advertiser</th>
        <th class="min-w-125px">Title</th>
        <th class="min-w-125px">Category</th>
        <th class="min-w-125px">Country</th>
        <th class="min-w-125px">Status</th>
        <th class="min-w-125px">Have Media</th>
        <th class="min-w-125px">Created Date</th>
        <th class="text-end min-w-70px">Actions</th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @if( $advertisements->count() > 0 )
        @foreach( $advertisements as $key => $advertisement )
            <tr>
                <td>
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">
                        {{ $key+=1 }}
                    </a>
                </td>
                <!--end::Key=-->

                <td>
                    <span>
                        {{ $advertisement->user->first_name }}
                    </span>
                </td>

                <!--begin::Name=-->
                <td>
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">
                        {{ \Illuminate\Support\Str::limit($advertisement->title, 10) }}
                    </a>
                </td>
                <!--end::Name=-->
                <!--begin::Email=-->
                <td>
                    <a href="#" class="text-gray-600 text-hover-primary mb-1">
                        {{ $advertisement->category->name }}
                    </a>
                </td>
                <!--end::Email=-->
                <!--begin::country=-->
                <td>
                    {{ $advertisement->country->name }}
                </td>
                <!--end::country=-->

                <!--begin::Accepted=-->
                <td>
                    @if( $advertisement->status == 'under_review' )
                        <span class="text-warning" data-id="{{ $advertisement->id }}">
                            Under Review
                        </span>
                    @else
                        <span class="text-success" data-id="{{ $advertisement->id }}">
                            Accepted
                        </span>
                    @endif
                </td>
                <!--end::Accepted=-->

                <td>
                    @if( $advertisement->media_type == 'advertiser' )
                        <span class="text-success">
                            Yes
                        </span>
                    @else
                        <span class="text-danger">
                            No
                        </span>
                    @endif
                </td>

                <!--begin::Date=-->
                <td>
                    {{ \Carbon\Carbon::parse($advertisement->created_at)->format('Y-m-d') }}
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
                    @if( $advertisement->status == 'under_review' )
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('advertisement_dashboard.edit', ['id' => $advertisement->id]) }}"
                                   class="menu-link px-3">Edit</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('advertisement_dashboard.show', ['id' => $advertisement->id]) }}"
                                   class="menu-link px-3">Show</a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('advertisement_dashboard.showMedia', ['id' => $advertisement->id]) }}"
                                   class="menu-link px-3">Show Media</a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" data-id="{{ $advertisement->id }}"
                                   class="menu-link px-3 acceptBtn">Accept</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                   data-bs-target="#advertisementDeleteModal-{{ $advertisement->id }}">Delete</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                    @elseif( $advertisement->status == 'accepted' )
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('advertisement_dashboard.edit', ['id' => $advertisement->id]) }}" class="menu-link px-3">
                                    Statistics
                                </a>
                            </div>

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                   data-bs-target="#advertisementDeleteModal-{{ $advertisement->id }}">Delete</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                    @endif
                    <!--end::Menu-->
                </td>
                <!--end::Action=-->
            </tr>

            <div class="modal fade" tabindex="-1" id="advertisementDeleteModal-{{ $advertisement->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger">Delete Advertisement</h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                 data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <p>
                                You Are Going To Delete This Advertisement : {{ $advertisement->title }}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-danger advertisementDeleteBtn"
                                    data-id="{{ $advertisement->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <tr>
            <td class="text-danger text-center" colspan="7">
                There is No Advertisement
            </td>
        </tr>
    @endif


    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->
