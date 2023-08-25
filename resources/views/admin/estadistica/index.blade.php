<x-app-layout>
    @push('css')
        <style type="text/css">
            .panel-title:hover {
                cursor: pointer;
                text-decoration: underline;
            }
        </style>
    @endpush
    <div class="container bg-white rounded py-6 my-6">
        <div class="text-center my-2">
            <span class="font-bold text-blue-600 text-3xl"> ESTADÍSTICA GENERAL</span>
        </div>
        <section class="grid lg:grid-cols-4 gap-6 text-white mb-4">
            @role('tecnico')
                <a href="#"
                    class="bg-red-500 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $pre }}
                    </p>
                    <p class="uppercase text-center font-bold">PREPARATORIA</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-import"></i>
                    </p>
                </a>

                <a href="#"
                    class="bg-yellow-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $ini }}
                    </p>
                    <p class="uppercase text-center font-bold">INICIO</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-pen"></i>
                    </p>
                </a>

                <a href="#"
                    class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $ana }}
                    </p>
                    <p class="uppercase text-center font-bold">ANÁLISIS</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-circle-question"></i>
                    </p>
                </a>

                <a href="#"
                    class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $emi }}
                    </p>
                    <p class="uppercase text-center font-bold">EMISIÓN DE RESOLUCIÓN</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-gavel"></i>
                    </p>
                </a>
            @endrole

            @hasanyrole('ejecutivo|operativo')
                <a href="{{ route('admin.tramites.index') . '?status=1' }}"
                    class="bg-red-500 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $pre }}
                    </p>
                    <p class="uppercase text-center font-bold">PREPARATORIA</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-import"></i>
                    </p>
                </a>

                <a href="{{ route('admin.tramites.index') . '?status=2' }}"
                    class="bg-yellow-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $ini }}
                    </p>
                    <p class="uppercase text-center font-bold">INICIO</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-pen"></i>
                    </p>
                </a>

                <a href="{{ route('admin.tramites.index') . '?status=3' }}"
                    class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $ana }}
                    </p>
                    <p class="uppercase text-center font-bold">ANÁLISIS</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-file-circle-question"></i>
                    </p>
                </a>

                <a href="{{ route('admin.tramites.index') . '?status=4' }}"
                    class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                    <p class="text-center text-2xl">
                        {{ $emi }}
                    </p>
                    <p class="uppercase text-center font-bold">EMISIÓN DE RESOLUCIÓN</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-gavel"></i>
                    </p>
                </a>
            @endhasanyrole

        </section>

        <div>
            <div>
                <!-- PRIMER CHART -->
                <div>
                    <div id="grafica1" style="min-width: 310px; height: 300px;"></div>
                </div>
                <!-- SEGUNDO CHART -->
                <div>
                    <div id="grafica2" style="min-width: 310px; height: 300px;"></div>
                </div>
                <!-- TERCERO CHART -->
                <div class="row">
                    <div>
                        <div id="grafica3" style="min-width: 310px; height: 300px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('script')
        <!-- Hihgcharts JS-->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>

        <script type="text/javascript">
            function mostrarOcultar(panelHeader) {
                var id = $(panelHeader).attr('data-target');
                var panelBody = $(id);

                if (panelBody.hasClass('in')) {
                    panelBody.collapse('hide');
                } else {
                    panelBody.collapse('show');
                }
            }

            Highcharts.setOptions({
                lang: {
                    decimalPoint: ',',
                    thousandsSep: '.'
                }
            });

            Highcharts.chart('grafica1', {
                chart: {
                    type: "column"
                },
                title: {
                    text: 'REGISTRO DE ÁREAS URBANAS POR ETAPA ANUAL'
                },
                xAxis: {
                    categories: [
                        'PROCEDIMIENTO',
                    ],
                    crosshair: true
                },
                yAxis: {
                    title: {
                        text: 'PROCESO DE HOMOLOGACIÓN DE ÁREA URBANA ANUAL'
                    }

                },
                legend: {
                    enabled: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:,.2f}'
                        },
                        groupPadding: 0,
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>DATOS</b></td></tr>',
                    footerFormat: '</table>',
                    useHTML: true
                },

                series: [{
                    name: 'Inicio de Trámite',
                    data: [{{ $ini }}],
                    color: "#2b908f",
                }, {
                    name: 'Admisión',
                    data: [{{ $resadmin }}],
                    color: "#f45b5b",
                }, {
                    name: 'Informe de Suficiencia Técnica',
                    data: [{{ $ist }}],
                }, {
                    name: 'Aprobación de la ley Municipal',
                    data: [0.00]

                }, {
                    name: 'Informe de concordancia',
                    data: [{{ $acl }}]

                }, {
                    name: 'Homologación con Resolución Ministerial',
                    data: [{{ $homologacion }}]

                }],
            });


            Highcharts.chart('grafica2', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'RESOLUCIÓN MINISTERIAL DE HOMOLOGACIÓN POR AÑOS'
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.y:,.0f}'
                        }
                    },
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}Documentos</b><br/>'

                },
                series: [{
                    name: 'Estados',
                    colorByPoint: true,
                    data: [{
                        name: {{ $hoy->isoFormat('YYYY') -3 }},
                        y: {{ $cant_hoy3 }},
                    }, {
                        name: {{ $hoy->isoFormat('YYYY') -2 }},
                        y: {{ $cant_hoy2 }},
                    }, {
                        name: {{ $hoy->isoFormat('YYYY') -1 }},
                        y: {{ $cant_hoy1 }},
                    }, {
                        name: {{ $hoy->isoFormat('YYYY') }} ,
                        y: {{ $cant_hoy }},
                    }]
                }]
            });
            Highcharts.chart('grafica3', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'RESOLUCIONES DE HOMOLOGACION POR DEPARTAMENTO'
                },
                xAxis: {
                    categories: [
                        'LA PAZ',
                        'SANTA CRUZ',
                        'COCHABAMBA',
                        'PANDO',
                        'CHUQUISACA',
                        'ORURO',
                        'POTOSI',
                        'BENI',
                        'TARIJA',

                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'DEPARTAMENTOS'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:20px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:,.2f} DATOS</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'PREPARATORIA',
                    data: [{{ $lapaz1 }}, {{ $scz1 }}, {{ $cbba1 }}, {{ $pan1 }}, {{ $chuq1 }}, {{ $or1 }}, {{ $pot1 }}, {{ $beni1 }}, {{ $tar1 }}],
                    color: "#F80606",
                }, {
                    name: 'INICIO',
                    data: [{{ $lapaz2 }}, {{ $scz2 }}, {{ $cbba2 }}, {{ $pan2 }}, {{ $chuq2 }}, {{ $or2 }}, {{ $pot2 }}, {{ $beni2 }}, {{ $tar2 }}],
                    color: "#f45b5b",
                }, {
                    name: 'ANALISIS',
                    data: [{{ $lapaz3 }}, {{ $scz3 }}, {{ $cbba3 }}, {{ $pan3 }}, {{ $chuq3 }}, {{ $or3 }}, {{ $pot3 }}, {{ $beni3 }}, {{ $tar3 }}],
                }, {
                    name: 'EMISION DE RESOLUCION MINISTERIAL',
                    data: [{{ $lapaz4 }}, {{ $scz4 }}, {{ $cbba4 }}, {{ $pan4 }}, {{ $chuq4 }},{{ $or4 }}, {{ $pot4 }}, {{ $beni4 }}, {{ $tar4 }}]

                }]
            });
        </script>
    @endpush

</x-app-layout>

@section('css')
@endsection

@section('contenido')
    <h1 class="text-center">RESOLUCIONES MINISTERIALES DE HOMOLOGACIÓN</h1>

    <div class="container mt-5">
        <div class="row">
            {{-- Preparatoria --}}
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header btn-danger text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-regular fa-pen-to-square fa-8x"></i>
                            </div>
                            <div class="col">
                                <h1 class="display-3">{{ $pre }}</h1>
                                <h4>PREPARATORIA</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            {{-- Fin Preparatoria --}}
            {{-- Inicio --}}
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header btn-warning text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-regular fa-folder-open fa-8x"></i>
                            </div>
                            <div class="col">
                                <h1 class="display-3">{{ $ini }}</h1>
                                <h4>INICIO</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            {{-- Fin de Inicio --}}

            {{-- Analisis --}}
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header btn-success text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-solid fa-list-check fa-8x"></i>
                            </div>
                            <div class="col">
                                <h1 class="display-3">{{ $ana }}</h1>
                                <h4>ANÁLISIS</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            {{-- Fin de Analisis --}}
            {{-- Emisión --}}
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header btn-success text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-solid fa-gavel fa-8x"></i>
                            </div>
                            <div class="col">
                                <h1 class="display-3">{{ $emi }}</h1>
                                <h4>EMISIÓN DE RESOLUCIÓN</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            {{-- Fin Emisión --}}
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <!-- PRIMER CHART -->
            <div class="col-xs-12 col-md-6">
                <div id="grafica1" style="min-width: 310px; height: 300px;"></div>
            </div>
            <!-- SEGUNDO CHART -->
            <div class="col-xs-12 col-md-6">
                <div id="grafica2" style="min-width: 310px; height: 300px;"></div>
            </div>
            <!-- TERCERO CHART -->
            <div class="row">
                <div class="col-xs-12">
                    <div id="grafica3" style="min-width: 310px; height: 300px;"></div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <!-- Hihgcharts JS-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script type="text/javascript">
        function mostrarOcultar(panelHeader) {
            var id = $(panelHeader).attr('data-target');
            var panelBody = $(id);

            if (panelBody.hasClass('in')) {
                panelBody.collapse('hide');
            } else {
                panelBody.collapse('show');
            }
        }

        Highcharts.setOptions({
            lang: {
                decimalPoint: ',',
                thousandsSep: '.'
            }
        });

        Highcharts.chart('grafica1', {
            chart: {
                type: "column"
            },
            title: {
                text: 'REGISTRO DE ÁREAS URBANAS POR ETAPA ANUAL'
            },
            xAxis: {
                categories: [
                    'PROCEDIMIENTO',
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                    text: 'PROCESO DE HOMOLOGACIÓN DE ÁREA URBANA ANUAL'
                }

            },
            legend: {
                enabled: true
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:,.2f}'
                    },
                    groupPadding: 0,
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b> DATOSjjj</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true
            },

            series: [{
                name: 'Inicio de Trámite ',
                data: [30.00],
                color: "#2b908f",
            }, {
                name: 'Admisión',
                data: [60.00],
                color: "#f45b5b",
            }, {
                name: 'Informe de Suficiencia Técnica',
                data: [90.00],
            }, {
                name: 'Aprobación de la ley Municipal',
                data: [70.00]

            }, {
                name: 'Informe de concordancia',
                data: [50.00]

            }, {
                name: 'Homologación con Resolución Ministerial',
                data: [30.00]

            }],
        });


        Highcharts.chart('grafica2', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'RESOLUCIÓN MINISTERIAL DE HOMOLOGACIÓN POR AÑOS'
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:,.0f}'
                    }
                },
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}Documentos</b><br/>'

            },
            series: [{
                name: 'Estados',
                colorByPoint: true,
                data: [{
                    name: '2019',
                    y: 50,
                }, {
                    name: '2020',
                    y: 25,
                }, {
                    name: '2021',
                    y: 10,
                }, {
                    name: '2022',
                    y: 50,
                }]
            }]
        });
        Highcharts.chart('grafica3', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'RESOLUCIONES DE HOMOLOGACION POR DEPARTAMENTO'
            },
            xAxis: {
                categories: [
                    'LA PAZ',
                    'SANTA CRUZ',
                    'COCHABAMBA',
                    'PANDO',
                    'CHUQUISACA',
                    'ORURO',
                    'POTOSI',
                    'BENI',
                    'TARIJA',

                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'DEPARTAMENTOS'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:20px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:,.2f} DATOS</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'PREPARATORIA',
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90],
                color: "#F80606",
            }, {
                name: 'INICIO',
                data: [20, 30, 40, 50, 60, 70, 80, 90, 100],
                color: "#f45b5b",
            }, {
                name: 'ANALISIS',
                data: [30, 40, 50, 60, 70, 80, 90, 100, 100],
            }, {
                name: 'EMISION DE RESOLUCION MINISTERIAL',
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90]

            }]
        });
    </script>
@endsection
