@extends('layouts.app')

@section('content')
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
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
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Chart showing how different series types can be combined in a single
                        chart. The chart is using a set of column series, overlaid by a line and
                        a pie series. The line is illustrating the column averages, while the
                        pie is illustrating the column totals.
                    </p>
                </figure>
            </div>
        </div>
    </div>
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
            // Data retrieved from https://www.ssb.no/energi-og-industri/olje-og-gass/statistikk/sal-av-petroleumsprodukt/artikler/auka-sal-av-petroleumsprodukt-til-vegtrafikk
            Highcharts.chart('container', {
                title: {
                    text: 'Sales of petroleum products March, Norway',
                    align: 'left'
                },
                xAxis: {
                    categories: [11, 12, 1, 2, 3]
                },
                yAxis: {
                    title: {
                        text: 'Total Files'
                    }
                },
                labels: {
                    items: [{
                        html: 'Total liter',
                        style: {
                            left: '50px',
                            top: '18px',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'black'
                        }
                    }]
                },
                series: [{
                        type: 'column',
                        name: 'PDS FILES',
                        data: [pdsConut]
                        //month add 
                    }, {
                        type: 'column',
                        name: "WORK Instruction Files",
                        data: [workConut]
                    }, {
                        type: 'column',
                        name: "PACK Instruction Files",
                        data: [packConut]
                    },
                    {
                        type: 'spline',
                        name: 'Average',
                        data: [47, 83.33, 70.66, 239.33, 175.66],
                        marker: {
                            lineWidth: 2,
                            lineColor: Highcharts.getOptions().colors[3],
                            fillColor: 'white'
                        }
                    }, {
                        type: 'pie',
                        name: 'Files',
                        data: [{
                            name: pdsConut,
                            y: pdsConut,
                            color: Highcharts.getOptions().colors[0] // 2020 color
                        }, {
                            name: workConut,
                            y: workConut,
                            color: Highcharts.getOptions().colors[1] // 2021 color
                        }, {
                            name: packConut,
                            y: packConut,
                            color: Highcharts.getOptions().colors[2] // 2022 color
                        }],
                        center: [50, 70],
                        size: 100,
                        showInLegend: false,
                        dataLabels: {
                            enabled: false
                        }
                    }
                ]
            });

            // Highcharts.chart("container", {
            //     chart: {
            //         type: "column",
            //         zoomType: "y"
            //     },
            //     title: {
            //         text: "Total files added"
            //     },
            //     // subtitle: {
            //     //     text: 'Source: <a href="http://www.worldstopexports.com/wheat-exports-country/">worldstopexports</a>'
            //     // },
            //     xAxis: {
            //         categories: [
            //             "PDS Files",
            //             "WORK Instruction Files",
            //             "PACK Instruction Files",
            //         ],
            //         title: {
            //             text: null
            //         },
            //         accessibility: {
            //             description: "Countries"
            //         }
            //     },
            //     yAxis: {
            //         min: 0,
            //         max: partConut,
            //         tickInterval: 2,
            //         title: {
            //             text: "Total Count Parts"
            //         },
            //         labels: {
            //             overflow: "justify",
            //             format: "{value}"
            //         }
            //     },
            //     plotOptions: {
            //         column: {
            //             dataLabels: {
            //                 enabled: true,
            //                 format: "{y}Files"
            //             }
            //         }
            //     },
            //     tooltip: {
            //         valueSuffix: " Files",
            //         stickOnContact: true,
            //         backgroundColor: "rgba(255, 255, 255, 0.93)"
            //     },
            //     legend: {
            //         enabled: false
            //     },
            //     series: [{
            //         name: "Total Files",
            //         data: [pdsConut, workConut, packConut],
            //         borderColor: "#5997DE"
            //     }]
            // });
        });
    </script>
@endsection
@endsection
