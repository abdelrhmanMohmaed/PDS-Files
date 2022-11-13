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
        <div class="row">
            <div class="mt-5">
                <br><br><br><br><br>
            </div>

            <div class="col-md-12 ">
                <figure class="highcharts-figure">
                    <div id="container"></div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $.ajax({
                url: '{{ url('') }}/' + 'get/analysis',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    getData(data)
                }
            });
        });
    </script>

    <script>
        function getData(data) {
            var chart = Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Five Weeks Analysis'
                },
                // subtitle: {
                //     text: 'Source: ' +
                //         '<a href="https://www.ssb.no/en/statbank/table/08940/" ' +
                //         'target="_blank">SSB</a>'
                // },
                xAxis: {
                    labels: {
                        x: -10
                    },
                    categories: data.xaxis.weeks,
                    crosshair: true
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Count of files per week'
                    }
                },
                // tooltip: {
                //     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                //     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //         '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                //     footerFormat: '</table>',
                //     shared: true,
                //     useHTML: true
                // },
                plotOptions: {
                    column: {
                        pointPadding: 0.1,
                        borderWidth: 0
                    }
                },

            });
            for (i in data.series) {
                chart.addSeries({
                    name: data.series[i].name,
                    data: data.series[i].data,
                });
            }

        }
    </script>
@endsection
@endsection
