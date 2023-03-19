<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-125px">#</th>
        <th class="min-w-125px">Country Name</th>
        <th class="min-w-125px">Code</th>
        <th class="min-w-125px">Status</th>
        <th class="text-center min-w-70px">Actions</th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @foreach( $countries as $key => $country )
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
                    {{ $country->name }}
                </a>
            </td>
            <!--end::Name=-->
            <!--begin::Code=-->
            <td>
                <a href="#" class="text-gray-600 text-hover-primary mb-1">
                    {{ $country->code }}
                </a>
            </td>
            <!--end::Code=-->
            <!--begin::Status=-->
            <td>
                @if( $country->status == 1 )
                    <button class="btn btn-success statusBtn" data-id="{{ $country->id }}">Active</button>
                @else
                    <button class="btn btn-danger statusBtn" data-id="{{ $country->id }}">Inactive</button>
                @endif
            </td>
            <!--end::Status=-->

            <!--begin::Action=-->
            <td class="text-end">

                <div class="menu-item px-3">
                    <button href="#" class="menu-link px-3 btn btn-light-danger" data-bs-toggle="modal" data-bs-target="#countryDeleteModal-{{ $country->id }}">
                        <i class="fas fa-trash-alt"></i>
                        Delete
                    </button>
                </div>

            </td>
            <!--end::Action=-->
        </tr>

        <div class="modal fade" tabindex="-1" id="countryDeleteModal-{{ $country->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Delete Country</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>
                            You Are Going To Delete This Country : {{ $country->email }}
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger countryDeleteBtn" data-id="{{ $country->id }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </tbody>
    <!--end::Table body-->
</table>
<div class="my-3">
    {{ $countries->links() }}
</div>
<!--end::Table-->
