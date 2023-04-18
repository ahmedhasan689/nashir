<x-dashboard-layout title="{{ __('lang.share_list_title') }}" subTitle="{{ __('lang.index') }}">
    <div class="row g-5 g-xl-8">
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">
                        {{ $shares->count() }}
                    </div>
                    <div class="fw-bold text-gray-400">
                        {{ __('lang.share_count') }}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                        {{ $visitors }}
                    </div>
                    <div class="fw-bold text-white">
                        {{ __('lang.number_of_visitors') }}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z" fill="black" />
                            <path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">$0</div>
                    <div class="fw-bold text-white">
                        {{ __('lang.my_earnings') }}
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
    </div>

    <hr>
    <div class="row g-5 g-xl-8">
        <div class="col-xl-6">
            <canvas id="shareChart" style="width:100%; max-width:400px"></canvas>
        </div>

        <div class="col-xl-6">
            <canvas id="visitorAdvertisementChart" style="width:100%; max-width:400px"></canvas>
        </div>
    </div>
    <hr>
    <div class="row g-5 g-xl-12">
        <div class="col-xl-12">
            <canvas id="Chart" style="width:100%; height: 400px"></canvas>
        </div>
    </div>

    @push('js')
        <script>
            {{-- Start shareChart ( Share ) --}}
            const share_statistics = {
                labels: [
                    @foreach($share_statistics as $data)
                        "{{ $data->type }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Share',
                    data: [
                        @foreach($share_statistics as $data)
                            {!! $data->count !!},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                    ],
                    hoverOffset: 4
                }]
            };

            const myChart = new Chart("shareChart", {
                type: 'doughnut',
                data: share_statistics,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Share Statistics',
                        }
                    }
                },
            });
            {{-- End shareChart ( Share ) --}}


             // Start visitorChart
            const visitor_statistics = {
                labels: [
                    @foreach($visitor_statistics as $data)
                        "{{ $data->type }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Share',
                    data: [
                        @foreach($visitor_statistics as $data)
                            {!! $data->count !!},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgb(205, 85, 85)',
                        'rgb(98, 94, 199)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                    ],
                    hoverOffset: 4
                }]
            };

            const visitorChart = new Chart("visitorAdvertisementChart", {
                type: 'doughnut',
                data: visitor_statistics,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Visitors',
                        }
                    }
                },
            });
             // End visitorChart

            const data = {
                labels: [
                    @foreach($visitor_statistics_chart as $key => $visitor)
                        "{{ $key }}",
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Number Of Visitor",
                        data: [
                            @foreach($visitor_statistics_chart as $visitor)
                                "{{ $visitor }}",
                            @endforeach
                        ],
                        borderColor:
                            [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',
                                'rgb(75, 192, 192)',
                                'rgb(255, 205, 86)',
                                'rgb(201, 203, 207)',
                            ],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                        ],
                        fill: false
                    }
                ]
            };



            const chart = new Chart('Chart', {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        filler: {
                            propagate: false,
                        },
                        title: {
                            display: true,
                            text: 'Chart',
                        }
                    },
                    interaction: {
                        intersect: false,
                    }
                },
            }) ;
        </script>
    @endpush
</x-dashboard-layout>
