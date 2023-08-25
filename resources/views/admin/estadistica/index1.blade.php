@extends('layouts.pagina')

@section('css')
	<style type="text/css">
		.panel-title:hover{
			cursor: pointer;
			text-decoration: underline;
		}
	</style>
@endsection

@section('contenido')
	<h1 class="text-center">RESOLUCIONES MINISTERIALES DE HOMOLOGACIÓN</h1>
    
	<div class="container mt-5">
		<div class="row">
			{{--Preparatoria --}}
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
			{{--Fin Preparatoria--}}
		  {{--Inicio--}}
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
		  {{--Fin de Inicio--}}
		  
		  {{--Analisis--}}
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
		  {{--Fin de Analisis--}}
		  {{--Emisión--}}
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
		  {{--Fin Emisión--}}
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
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- Bootstrap JS 3.3.7-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Hihgcharts JS-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>

	<script type="text/javascript">

		function mostrarOcultar(panelHeader) {
			var id = $(panelHeader).attr('data-target');
			var panelBody = $(id);

			if(panelBody.hasClass('in')){
				panelBody.collapse('hide');
			}else{
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
		    	color:  "#2b908f",
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
		    	data: [10, 20, 30, 40, 50, 60,70,80, 90],
		    	color:  "#F80606",
		    }, {
		    	name: 'INICIO',
		    	data: [20, 30, 40, 50, 60,70,80, 90,100],
		    	color: "#f45b5b",
		    }, {
		        name: 'ANALISIS',
		        data: [ 30, 40, 50, 60,70,80, 90, 100, 100],
		    }, {
		        name: 'EMISION DE RESOLUCION MINISTERIAL',
		        data: [ 10, 20, 30, 40, 50, 60,70,80, 90]

		    } ]
		});

	</script>

@endsection