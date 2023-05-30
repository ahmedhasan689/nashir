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
            {{ __('lang.value') }}
        </th>
        <th class="min-w-125px">
            {{ __('lang.actions') }}
        </th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
    @foreach( $settings as $key => $setting )
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
                    {{ $setting->key }}
                </a>
            </td>
            <!--end::Name=-->
            <!--begin::Code=-->
            <td>
                <a href="#" class="text-gray-600 text-hover-primary mb-1 font-bold">
                    @if( $setting->type == 'image' )
                        <img src="{{ asset('storage') . '/' . $setting->value }}" width="150" height="150">
                    @else
                        {{ $setting->value }}
                    @endif
                </a>
            </td>
            <!--end::Code=-->
            <!--begin::Action=-->
            <td class="text-center d-flex justify-content-center">
                <!--begin::Menu item-->
                <div class="menu-item px-1">
                    <a href="{{ route('setting.edit', ['id' => $setting->id]) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
                <!--end::Menu item-->
            </td>
            <!--end::Action=-->
        </tr>


    @endforeach
    </tbody>
    <!--end::Table body-->
</table>
