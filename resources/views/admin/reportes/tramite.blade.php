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
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 256mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 3;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

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
            width: 19cm;
            height: 34cm;
            margin-left: 0.9cm;
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

        h2 {
            border-top: 2px solid #615d75;
            border-bottom: 2px solid #4c759e;
            color: #5D6975;
            font-size: 1.5em;
            line-height: 1.3em;
            font-weight: normal;
            text-align: center;
            margin: 10px 10px 10px 10px;
            background: url(img/dimension.png);
        }


        #project {
            float: right;
        }

        #project span {
            color: #5d7560;
            text-align: right;
            width: 100px;
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
            padding: 9px;
            text-align: center;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit {
            font-size: 100cm;
        }

        ,
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
            font-size: 1.em;
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
        <h1>REPORTE DEL PROCESO HOMOLOGACION </h1>


        <div id="company" class="clearfix">
            <div><span>DIRECCIÓN GENERAL DE AUTONOMÍAS <br> Unidad de Áreas Urbanas y Metropolización</span></div>
    </header>

    <main>
        <table>
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="5"><b> DATOS DEL SOLICITANTE</b></th>
                <tr>
                    <th class="service"><b>RESPONSABLE</b></th>
                    <th class="desc"><b>GAM/GAIOC</b></th>
                    <th class="desc"><b>INSTITUCIÓN</b></th>
                    <th><b>CEL. REF.:</b></th>
                    <th><b>CORREO INSTITUCIONAL</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tramite->responsables as $responsable)
                    <tr>
                        <td class="service">{{ $responsable->nombres }} {{ $responsable->apellidos }}</td>
                        <td class="desc">{{ $responsable->cargo }}</td>
                        <td class="desc">{{ $responsable->designacion }}</td>
                        <td>{{ $responsable->ci }}</td>
                        <td>{{ $responsable->user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table WIDTH="1000000">
            <colgroup span="5"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="5"><b> UBICACIÓN GEOGRÁFICA</b></th>
                <tr>
                    <th class="service"><b>DEPARTAMENTO</b></th>
                    <th><b>PROVINCIA</b></th>
                    <th class="desc"><b>MUNICIPIO</b></th>
                    <th><b>CENTRO POBLADO</b></th>
                    <th><b>SITUACIÓN ACTUAL</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">{{ $tramite->departamento->nombre }}</td>
                    <td class="desc">{{ $tramite->provincia->nombre }}</td>
                    <td>{{ $tramite->municipio->nombre }}</td>
                    <td>{{ $tramite->centro_poblado }}</td>
                    @if ($tramite->fase == 1)
                        <td>VIGENTE</td>
                    @elseif ($tramite->fase == 2)
                        <td>POSTERGADO</td>
                    @else
                        <td>EXTINGUIDO</td>
                    @endif
                </tr>

                <tr>
                    <td colspan="4" class="grand total">
                        <p align="left"> TÉCNICO ASIGNADO:<BR> AUyM-DGA</p>
                    </td>
                    <td class="grand total">{{ $tramite->tecnico->nombres }} {{ $tramite->tecnico->apellidos }}</td>

                </tr>
            </tbody>
        </table>
        <table>
            <tr>
                <th span="2"><b>FECHA DE INICIO DE TRAMITE:</b></th>
                <th span="2"><b>FECHA DEL ÚLTIMO ACTUADO DEL SOLICITANTE:</b></th>

            </tr>


            <tr>
                <td class="desc"> {{ $fecha }}</td>
                <td class="desc"> {{ $tramite->ultimo_actuado}}</td>
            </tr>


            </thead>
        </table>
        <table>
            <colgroup span="4"
                style="background: rgba(236, 237, 240, 0.3); border: 3px solid rgba(6, 3, 15, 0.3);"></colgroup>
            <thead>
                <th colspan="3"><b>
                        <h2> SEGUIMIENTO DE TRÁMITE</h2>
                    </b>

                </th>
                <tr>
                    <h3> ETAPA: INICIO</h3>
                </tr>
                <tr>
                    <th colspan="3"><b>RESOLUCIÓN ADMINISTRATIVA </b></th>
                </tr>
                <tr>
                    <th colspan="2" class="service"><b>CITE NOTA SOLICITUD DE TRÁMITE</b></th>
                    <th class="desc"><b>FECHA DE EMISIÓN DE RESOLUCIÓN</b></th>
                    {{--<th><b>N° RESOLUCIÓN</b></th>--}}
                </tr>
            </thead>
            <tbody>
                @if ($tramite->initrams->count())
                    @foreach ($tramite->initrams as $initram)
                        <tr>
                            <td colspan="2" class="service">{{ $initram->numruta }}</td>
                            <td class="desc"> {{ \Carbon\Carbon::parse($initram->fecha)->format('d/m/Y') }}</td>
                            {{--<td>AQUIIIII ES N° DE RESOLUCIONNNNNNNNNN </td>--}}
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4"> No existen registros en esta etapa.</td>
                    </tr>
                @endif
            </tbody>
        </table>
  {{--DAN AQUIIIIIIIII POR EJEMPLO QUIERE Q QUITEMOS LAS ENTIDADES O LAS OCULTEMOSSSSSSSSS MEJOR OCI¿ULTEMOS.. YA SE PASAN JAJAJA  Y QUE LOS RITUS DEBEN SER RITU 1  RITU 2 ASIII ....--}}
       {{ $tramite->ritus->count() }}
        @if ($tramite->ritus->count())
            <table>
                <tr>
                    <h3> ETAPA : ANÁLISIS:</h3>
                </tr>
                <colgroup span="9"
                    style="background: rgba(100, 100, 100, 0.3); border: 19px solid rgba(6, 3, 15, 0.3);"></colgroup>

                <thead>
                    <th colspan="9"><b> INFORME RITU E INFORME SUFICIENCIA TÉCNICA</b></th>
                </thead>
                <tbody>
                  @if ($ritus)
                    @foreach($ritus as $row)
                    <tr> <td colspan="9"><b>{{ $row->nombre }} </b></td></tr>
                      <tr>
                        <th colspan="5"><b>CITE INFORME RITU<BR>:</b></th>
                        <th colspan="4"><b>FECHA EMISION DE <BR> INFORME:</b></th>
                       {{-- <th colspan="3"><b> N° INFORME </b></th> --}}
                    </tr>
                        <tr>

                            <td colspan="5">{{ $row->numruta }}</td>
                            <td colspan="4"> {{ \Carbon\Carbon::parse($row->fecha)->format('d/m/Y') }}</td>
                            {{--<td colspan="3">AQUIIIII NUMERO DE INFORMEEEEEEEEEEEEEE</td>--}}
                        </tr>
                         @endforeach
                        {{--
                        <tr>
                            <th colspan="9"> ENTIDADES:</th>
                        </tr>
                        <tr>
                            <th colspan="9"> </th>

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
                        --}}
                    @else
                        <tr>
                            <td colspan="9">
                                No existen registros en esta etapa.
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        @endif
        <br>

        <br>


        {{-- Análisis de Suficiencia Técnica --}}
        @if ($tramite->asts->count())
            <table>
                <colgroup span="9"
                    style="background: rgba(236, 237, 240, 0.3); border: 100px solid rgba(6, 3, 15, 0.3);"></colgroup>
                <thead>
                    <th colspan="4"><b> INFORME DE SUFICIENCIA TÉCNICA </b></th>
                    <tr>
                        <th class="service"><b>N°CITE /IST</b></th>
                        <th class="desc"><b>FECHA/IST</b></th>
                        <th colspan="2"><b>OBSERVACIÓN</b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tramite->ists as $ist)
                        <tr>
                            <td class="service">{{ $ist->numruta }}</td>
                            <td class="desc">{{ $ist->fecha }}ESTAAAAAA ESTA ERRONEA</td>
                            <td colspan="2">{{ $ist->observacion }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif

        <br>
        <br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br>
        <br>

        {{-- RESOLUCION MINISTERIAL DE AREA URBANA --}}
        @if ($tramite->acls->count())
            <table>
                <colgroup span="9"
                    style="background: rgba(236, 237, 240, 0.3); border: 100px solid rgba(6, 3, 15, 0.3);"></colgroup>
                <th colspan="5"></th>
                <tr>
                    <h3> ETAPA: RESOLUCIÓN:</h3>
                </tr>
                {{--DAN DESDE AQUI SE AUMENTO.... ESAS TRES TABLAS..... EN LAS Q QUIERO Q ME AYUDES,....--}}
                <thead>
                    <tr>
                        <th colspan="5"><b>LEY MUNICIPAL</b></th>
                    </tr>
                    <tr>
                        <th><b>NOMBRE DE LEY</b></th>
                        <th colspan="2"><b>N° DE LEY <br>
                        <th colspan="2"><b>FECHA DE APROBACION DE LEY</b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tramite->acls as $acl)
                        <tr>
                            <td>ESTO HAYYYYY QUE VER DANNNNNNNNNNNNNNNNNN CABEZONNNN</td>
                            <td colspan="2">{{ \Carbon\Carbon::parse($acl->fecha)->format('d/m/Y') }}</td>
                            <td colspan="2">{{ $acl->tipo }}</td>

                        </tr>
                    @endforeach
                    <th colspan="5"></th>
                </tbody>
            </table>
        @endif
        @if ($tramite->acls->count())
            <table>
                <tr>
                    <th colspan="5"><b>INFORME ANALISIS Y CONCORDANCIA</b></th>
                </tr>
                <tr>
                    <th><b>N°  CITE IAC<br>/</b></th>
                    <th><b>FECHA INFORME IAC</th>
                    <th><b>OBSERVACIONES</b></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7263/22</td>
                        <td>02/12/22</td>
                        <td>234</td>
                    </tr>
                    <th colspan="5"></th>
                </tbody>
            </table>
        @endif
        
        <table>
                <tr>
                    <th colspan="5"><b>INFORME LEGAL</b></th>
                </tr>
                <tr>
                    <th><b>N°  CITE IL<br>/</b></th>
                    <th><b>FECHA INFORME IL</th>
                    <th><b>OBSERVACIONES</b></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7263/22</td>
                        <td>02/12/22</td>
                        <td>AQUIII SE AUMENTOOOOOOO</td>
                    </tr>
                    <th colspan="5"></th>
                </tbody>
            </table>

        
        <div>FECHA DE IMPRESIÓN:</div>
        <div class="notice">{{ $fecha_impresion }}</div>
        <div>USUARIO:{{ auth()->user()->name }}</div>
        <div class="notice"><span>Rol:</span> TECNICO</div>
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
