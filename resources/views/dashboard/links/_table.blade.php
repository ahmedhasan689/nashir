<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th class="min-w-125px">#</th>
        <th class="min-w-125px">
            {{ __('lang.key') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.icon') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.status') }}
        </th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @foreach( $links as $key => $link )
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
                    {{ $link->key }}
                </a>
            </td>
            <!--end::Name=-->
            <!--begin::Code=-->
            <td>
                <a href="#" class="text-gray-600 text-hover-primary mb-1 font-bold">
                    <i class="{{ $link->icon }}" style="font-size: 25px"></i>
                </a>
            </td>
            <!--end::Code=-->
            <!--begin::Status=-->
            <td>
                @if( $link->status == 1 )
                    <button class="btn btn-success statusBtn" data-id="{{ $link->id }}">
                        {{ __('lang.active') }}
                    </button>
                @else
                    <button class="btn btn-danger statusBtn" data-id="{{ $link->id }}">
                        {{ __('lang.inactive') }}
                    </button>
                @endif
            </td>
            <!--end::Status=-->
        </tr>



    @endforeach
    </tbody>
    <!--end::Table body-->
</table>
