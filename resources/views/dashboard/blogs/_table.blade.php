<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-125px">#</th>
        <th class="min-w-125px">
            {{ __('lang.title') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.category') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.created_by') }}
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
    @foreach( $blogs as $key => $blog )
        <tr>
            <td>
                <a href="#" class="text-gray-800 text-hover-primary mb-1">
                    {{ $key+=1 }}
                </a>
            </td>
            <!--end::Key=-->

            <!--begin::Name=-->
            <td>
                {{ (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en }}
            </td>
            <!--end::Name=-->

            <!--begin::email=-->
            <td>
                {{ $blog->category->name }}
            </td>
            <!--end::email=-->

            <!--begin::phone_number=-->
            <td>
                {{ $blog->admin->first_name . ' ' . $blog->admin->last_name }}
            </td>
            <!--end::phone_number=-->

            <!--begin::subject=-->
            <td>
                {{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}
            </td>
            <!--end::subject=-->

            <!--begin::Action=-->
            <td class="text-center d-flex justify-content-center">
                <!--begin::Menu item-->
                <div class="menu-item px-1">
                    <a href="{{ route('blog_dashboard.edit', ['id' => $blog->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-1">
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#blogDeleteModal-{{ $blog->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <!--end::Menu item-->
            </td>
            <!--end::Action=-->
        </tr>

        <div class="modal fade" tabindex="-1" id="blogDeleteModal-{{ $blog->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            {{ __('lang.delete_blog') }}
                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ __('lang.blog_modal_title', ['blog_name' => (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en]) }}
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            {{ __('lang.close') }}
                        </button>
                        <button type="button" class="btn btn-danger blogDeleteBtn" data-id="{{ $blog->id }}">
                            {{ __('lang.delete') }}
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
    {{ $blogs->links() }}
</div>
<!--end::Table-->
