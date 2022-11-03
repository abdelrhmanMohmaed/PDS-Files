@extends('layouts.app')

@section('content')
    <style>
        #container {
            min-width: 310px;
            max-width: 800px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>PDS Files:</strong></h5>

                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <p class="card-text">Count: {{ $pdsConut }}</p>
                            </div>
                            <div class="ms-auto  p-2 bd-highlight">
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Work Instruction:</strong></h5>

                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <p class="card-text">Count: {{ $workConut }}</p>
                            </div>
                            <div class="ms-auto  p-2 bd-highlight">
                                <div class="w-100 h-100 bg-dark rounded-circle">
                                    <a href="#" class="btn btn-primary">Go somewhere</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-md-10 col-md-offset-1">
                <div id="container"></div>
            </div>
        </div>
    </div>
@section('script')
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        // $(document).ready(function() {
        //     var partConut = {{ $partConut }};
        //     var pdsConut = {{ $pdsConut }};
        //     var packConut = {{ $packConut }};
        //     var workConut = {{ $workConut }};

        //     Highcharts.chart('container', {
        //         colors: [
        //             '#01BAF2',
        //             '#f6fa4b',
        //             '#FAA74B',
        //             '#baf201',
        //             '#f201ba'
        //         ],
        //         chart: {
        //             type: 'pie'
        //         },
        //         title: {
        //             text: 'PDS FILES COUNT'
        //         },
        //         tooltip: {
        //             valueSuffix: '%'
        //         },
        //         subtitle: {
        //             text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
        //         },
        //         plotOptions: {
        //             pie: {
        //                 allowPointSelect: true,
        //                 cursor: 'pointer',
        //                 dataLabels: {
        //                     enabled: true,
        //                     format: '{point.name}: {point.percentage:.1f}%'
        //                 },
        //                 showInLegend: true
        //             }
        //         },
        //         series: [{
        //             name: 'Percentage',
        //             colorByPoint: true,
        //             data: [{
        //                     name: 'Total Parts',
        //                     sliced: true,
        //                     selected: true,
        //                     y: partConut
        //                 },
        //                 {
        //                     name: 'PDS FILES',
        //                     y: pdsConut
        //                 },

        //                 {
        //                     name: 'PACK FILES',
        //                     y: packConut
        //                 },
        //                 {
        //                     name: 'WORK FILES',
        //                     y: workConut
        //                 },
        //                 // {
        //                 //     name: 'Ash',
        //                 //     y: 1.68
        //                 // }
        //             ]
        //         }]
        //     });
        // });

        $(document).ready(function() {
            var partConut = {{ $partConut }};
            var pdsConut = {{ $pdsConut }};
            var workConut = {{ $workConut }};
            var packConut = {{ $packConut }};
            Highcharts.chart("container", {
                chart: {
                    type: "column",
                    zoomType: "y"
                },
                title: {
                    text: "Total files added"
                },
                // subtitle: {
                //     text: 'Source: <a href="http://www.worldstopexports.com/wheat-exports-country/">worldstopexports</a>'
                // },
                xAxis: {
                    categories: [
                        "PDS Files",
                        "WORK Instruction Files",
                        "PACK Instruction Files",
                    ],
                    title: {
                        text: null
                    },
                    accessibility: {
                        description: "Countries"
                    }
                },
                yAxis: {
                    min: 0,
                    max: partConut,
                    tickInterval: 2,
                    title: {
                        text: "Total Count Parts"
                    },
                    labels: {
                        overflow: "justify",
                        format: "{value}"
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            format: "{y}Files"
                        }
                    }
                },
                tooltip: {
                    valueSuffix: " Files",
                    stickOnContact: true,
                    backgroundColor: "rgba(255, 255, 255, 0.93)"
                },
                legend: {
                    enabled: false
                },
                series: [{
                    name: "Total Files",
                    data: [pdsConut, workConut, packConut],
                    borderColor: "#5997DE"
                }]
            });
        });
    </script>
@endsection
@endsection
