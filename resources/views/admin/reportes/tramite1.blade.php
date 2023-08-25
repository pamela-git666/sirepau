<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>

<body>
    <style type="text/css">
        .clear-fix:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 6;
            height: 7;
        }


        a {
            color: #66755d;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 34cm;
            margin-left: 0.7cm;
            margin-right: 0.7cm;
            color: #020914;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 10px;
            font-family: Arial;
        }

        header {
            padding: 5px 0px;
            margin-bottom: 50px 0px;
        }

        #logo {
            text-align: center;
            margin-bottom: 5px;
        }

        #logo img {
            width: 400px;
        }

        h1 {
            border-top: 3px solid #615d75;
            border-bottom: 3px solid #4c759e;
            color: #5D6975;
            font-size: 2.5em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 4px 4px 4px 4px;
            background: url(img/dimension.png);
        }

        #project {
            float: right;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 10px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }


        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 60px;
            margin-bottom: 20px;
        }

        table tr:nth-child(3n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: center;
        }

        table td {
            padding: 10px;
            text-align: center;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 5px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #0e0f0f;
            width: 100%;
            height: 120px;
            position: absolute;
            bottom: 100px;
            padding: 1.8cm 0;
            text-align: center;
        }
    </style>

    <header class="clearfix">
        <div id="logo">
            <img src="img/logo.png">
        </div>
        <h1>REPORTE DEL REGISTRO DE ÁREA URBANA</h1>


        <div id="company" class="clearfix">
            <div><span>DIRECCIÓN GENERAL DE AUTONOMÍAS <br> Unidad de Áreas Urbanas y Metropolización</span></div>
    </header>

    <main>
        <table>
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="5"><b> DATOS DEL RESPONSABLE DEL TRÁMITE</b></th>
                <tr>
                    <th class="service"><b>RESPONSABLE</b></th>
                    <th class="desc"><b>CARGO</b></th>
                    <th class="desc"><b>DESIGNACIÓN</b></th>
                    <th><b>C.I.:</b></th>
                    <th><b>CEL.:</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tramite->responsables as $responsable)
                    <tr>
                        <td class="service">{{ $responsable->nombres }} {{ $responsable->apellidos }}</td>
                        <td class="desc">{{ $responsable->cargo }}</td>
                        <td class="desc">{{ $responsable->designacion }}</td>
                        <td>{{ $responsable->ci }}</td>
                        <td>{{ $responsable->celular }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="5"><b> DATOS DEL TRÁMITE</b></th>
                <tr>
                    <th class="service"><b>DEPARTAMENTO</b></th>
                    <th class="desc"><b>MUNICIPIO</b></th>
                    <th><b>PROVINCIA</b></th>
                    <th><b>CENTRO POBLADO</b></th>
                    <th><b>ESTADO</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">{{ $tramite->departamento->nombre }}</td>
                    <td class="desc">{{ $tramite->provincia->nombre }}</td>
                    <td>{{ $tramite->municipio->nombre }}</td>
                    <td>{{ $tramite->centro_poblado }}</td>
                    @if ($tramite->fase == 1)
                        <td>Activo</td>
                    @else
                        <td>Inactivo</td>
                    @endif
                </tr>
                <tr>
                    <td colspan="4" class="grand total">
                        <p align="left"> TÉCNICO ASIGNADO:</p>
                    </td>
                    <td class="grand total">{{ $tramite->tecnico->nombres }} {{ $tramite->tecnico->apellidos }}</td>

                </tr>
            </tbody>
        </table>
        <table>
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="4"><b>
                        <h2> ESTADO DE TRÁMITE</h2>
                    </b></th>
                <tr>
                    <th colspan="4"><b>INICIO DE TRAMITE DE HOMOLOGACIÓN</b></th>
                </tr>
                <tr>
                    <th class="service"><b>N° RUTA</b></th>
                    <th class="desc"><b>FECHA DE INICIO DE TRÁMITE</b></th>
                    <th><b>HORA</b></th>
                    <th><b>PROCESO:</b></th>
                </tr>
            </thead>
            <tbody>
                @if ($tramite->initrams->count())   
                    @foreach ($tramite->initrams as $initram)
                        <tr>
                            <td class="service">{{ $initram->numruta }}</td>
                            <td class="desc"> {{ \Carbon\Carbon::parse($initram->fecha)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($initram->created_at)->isoFormat('H:mm:ss') }}</td>
                            <td>{{ $initram->tipo }} </td>
                        </tr>
                            @endforeach
                    @else
                    <tr>
                        <td colspan="4"> No existen registros en esta etapa.</td>
                    </tr>
                   @endif
            </tbody>
        </table>

        <table>
            <colgroup span="9"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="9"><b>ADMISIÓN DE TRÁMITE DE HOMOLOGACIÓN</b></th>

                <tr>
                    <th class="service"><b>PROCESO</b></th>
                    <th class="desc"><b>N° RUTA</b></th>
                    <th><b>FECHA:</b></th>
                    <th><b>HORA:</b></th>
                    <th><b>DIAS:</b></th>
                    <th colspan="4"><b>DETALLE</b></th>
                </tr>
            </thead>
            <tbody>
                @if ($ritu)
                    <tr>
                        <td class="service">{{ $ritu->nombre }}</td>
                        <td class="desc">{{ $ritu->numruta }}</td>
                        <td class="desc"> {{ \Carbon\Carbon::parse($ritu->fecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($ritu->created_at)->isoFormat('H:mm:ss') }}</td>
                        <td>{{ \Carbon\Carbon::parse($ritu->fecha)->diffInDays() }}</td>
                        <td colspan="4">{{ $ritu->observacion }}</td>
                    </tr>
                    <tr>
                        <th colspan="9"> ENTIDADES:</th>
                    </tr>
                    <tr>
                        <th><b>ABT</b></th>
                        <th><b>AE</b></th>
                        <th><b>AJAM</b></th>
                        <th><b>ANH</b></th>
                        <th><b>INE</b></th>
                        <th><b>INRA</b></th>
                        <th><b>SERNAP</b></th>
                        <th><b>V.M.T.</b></th>
                        <th><b>V.C.V.</b></th>
                    </tr>
                    <tr>
                        @if ($ritu->abts->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->aes->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->ajams->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->anhs->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->ines->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->inras->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->sernaps->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->vicemintierras->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                        @if ($ritu->viceminvivs->count())
                            <td><input type="checkbox" checked>SI</td>
                        @else
                            <td><input type="checkbox">NO</td>
                        @endif
                    </tr>
                @else
                    <tr>
                        <td colspan="9">
                            No existen registros en esta etapa.
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
        {{-- Análisis de Suficiencia Técnica --}}
        <table>
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="4"><b>ANÁLISIS DE SUFICIENCIA TÉCNICA</b></th>

                <tr>
                    <th class="service"><b>fff</b></th>
                    <th class="desc"><b>CARGO</b></th>
                    <th><b>CI</b></th>
                    <th><b>CEL:</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Eva Copa</td>
                    <td class="desc">Alcalde</td>
                    <td>9918823</td>
                    <td>75882437</td>
                </tr>
            </tbody>
        </table>
        {{-- Análisis de Suficiencia Técnica --}}

        <div>FECHA:</div>
        <div class="notice">{{ $fecha }}</div>
        <div>USUARIO:{{ auth()->user()->name }}</div>
        <div class="notice"><span>Rol:</span> Administrador</div>
        </div>
    </main>
    <footer>
        <p class="text-center">2022 AÑO DE LA REVOLUCIÓN CULTURAL PARA LA DESPATRIARCALIZACIÓN <br>Por una vida libre
            de violencia contra las mujeres
            <br>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>Zona
            Central, calle Ayacucho - esq.Potosí, Telf:(591-2) 2153845 Fax: 2153931 <br> La Paz - Bolivia <br>
        </p>

    </footer>

</body>

</html>
