<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-125px">#</th>
        <th class="min-w-125px">
            {{ __('lang.name') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.email') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.phone_number') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.subject') }}
        </th>
        <th class="text-center min-w-70px">
            {{ __('lang.actions') }}
        </th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @foreach( $contact_us as $key => $contact )
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
                    {{ $contact->name }}
                </a>
            </td>
            <!--end::Name=-->

            <!--begin::email=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $contact->email }}
                </a>
            </td>
            <!--end::email=-->

            <!--begin::phone_number=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $contact->phone_number }}
                </a>
            </td>
            <!--end::phone_number=-->

            <!--begin::subject=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $contact->subject }}
                </a>
            </td>
            <!--end::subject=-->

            <!--begin::Action=-->
            <td class="text-center d-flex justify-content-center">
                    <!--begin::Menu item-->
                    <div class="menu-item px-1">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#contactShowModal-{{ $contact->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-1">
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#contactDeleteModal-{{ $contact->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <!--end::Menu item-->
            </td>
            <!--end::Action=-->
        </tr>

        <div class="modal fade" tabindex="-1" id="contactDeleteModal-{{ $contact->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            {{ __('lang.delete_contact') }}
                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ __('lang.contact_modal_title', ['contact_name' => $contact->subject]) }}
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            {{ __('lang.close') }}
                        </button>
                        <button type="button" class="btn btn-danger contactDeleteBtn" data-id="{{ $contact->id }}">
                            {{ __('lang.delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="contactShowModal-{{ $contact->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            {{ __('lang.show_content') }}
                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ $contact->message }}
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            {{ __('lang.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </tbody>
    <!--end::Table body-->
</table>
<div class="my-3">
    {{ $contact_us->links() }}
</div>
<!--end::Table-->
