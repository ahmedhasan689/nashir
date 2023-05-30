<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-125px">#</th>
        <th class="min-w-125px">
            {{ __('lang.avatar') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.name') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.content') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.job') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.status') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.create_at') }}
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
    @foreach( $testimonials as $key => $testimonial )
        <tr>
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $key+=1 }}
                </a>
            </td>
            <!--end::Key=-->

            <!--begin::Name=-->
            <td>
                <a class="text-gray-800 text-hover-primary mb-1">
                    <img src="{{ $testimonial->image_path }}" width="50" height="50" alt="">
                </a>
            </td>
            <!--end::Name=-->

            <!--begin::email=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $testimonial->name }}
                </a>
            </td>
            <!--end::email=-->

            <!--begin::phone_number=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $testimonial->content }}
                </a>
            </td>
            <!--end::phone_number=-->

            <!--begin::subject=-->
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $testimonial->job }}
                </a>
            </td>
            <!--end::subject=-->

            <!--begin::subject=-->
            <td>
                @if( $testimonial->status == 1 )
                    <button class="btn btn-success text-gray mb-1 statusBtn" data-id="{{ $testimonial->id }}">
                        {{ __('lang.active') }}
                    </button>
                @else
                    <button class="btn btn-danger text-gray mb-1 statusBtn" data-id="{{ $testimonial->id }}">
                        {{ __('lang.inactive') }}
                    </button>
                @endif
            </td>
            <!--end::subject=-->

            <!--begin::Action=-->
            <td class="text-center d-flex justify-content-center">
                <!--begin::Menu item-->
                <div class="menu-item px-1">
                    <a href="{{ route('testimonial.edit', ['id' => $testimonial->id]) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-1">
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#testimonialDeleteModal-{{ $testimonial->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <!--end::Menu item-->
            </td>
            <!--end::Action=-->
        </tr>

        <div class="modal fade" tabindex="-1" id="testimonialDeleteModal-{{ $testimonial->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            {{ __('lang.delete_testimonial') }}
                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ __('lang.testimonial_modal_title', ['testimonial_name' => $testimonial->name]) }}
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            {{ __('lang.close') }}
                        </button>
                        <button type="button" class="btn btn-danger testimonialDeleteBtn" data-id="{{ $testimonial->id }}">
                            {{ __('lang.delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" id="testimonialShowModal-{{ $testimonial->id }}">
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
                            {{ $testimonial->message }}
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
    {{ $testimonials->links() }}
</div>
<!--end::Table-->
