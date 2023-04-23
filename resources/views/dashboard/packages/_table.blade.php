<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-25px">#</th>
        <th class="min-w-125px">
            {{ __('lang.name') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.price') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.views_number') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.bonus_value') }}
        </th>

        <th class="text-end min-w-70px">
            {{ __('lang.actions') }}
        </th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @if( $packages->count() > 0 )
        @foreach( $packages as $key => $package )
            <tr>
                <td>
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">
                        {{ $key+=1 }}
                    </a>
                </td>
                <!--end::Key=-->

                <td>
                    <span>
                        {{ app()->getLocale() === 'ar' ? $package->name_ar : $package->name_en }}
                    </span>
                </td>

                <td>
                    <span>
                        {{ $package->price }}
                    </span>
                </td>
                <!--begin::Name=-->
                <td>
                    <span>
                        {{ $package->views_number }}
                    </span>
                </td>
                <!--end::Name=-->
                <!--begin::Email=-->
                <td>
                    <span>
                        {{ $package->bonus_value }}
                    </span>
                </td>
                <!--end::Email=-->

                <!--begin::Action=-->
                <td class="text-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('package.edit', ['id' => $package->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-bs-target="#packageDeleteModal-{{ $package->id }}" data-bs-toggle="modal">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </td>
                <!--end::Action=-->
            </tr>

            <div class="modal fade" tabindex="-1" id="packageDeleteModal-{{ $package->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger">
                                {{ __('lang.package_delete') }}
                            </h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                 data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <p>
                                {{ __('lang.package_modal_title', ['package_name' => app()->getLocale() === 'ar' ? $package->name_ar : $package->name_en]) }}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                {{ __('lang.close') }}
                            </button>
                            <button type="button" class="btn btn-danger packageDeleteBtn"
                                    data-id="{{ $package->id }}">
                                {{ __('lang.delete') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <tr>
            <td class="text-danger text-center" colspan="7">
                {{ __('lang.no_packages') }}
            </td>
        </tr>
    @endif


    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->
