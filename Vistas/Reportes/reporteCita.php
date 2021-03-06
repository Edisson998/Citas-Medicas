<?php
session_start();
include '../../plantilla/header.php';
?>

<html>

<head>
    <title>Reporte citas </title>

    <style>
        table th {
            background: #2A3F54;
            color: white;
        }

        .showHideColumn {
            cursor: pointer;
            color: blue;

        }

        .btn-sm {
            position: absolute !important;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 1270px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 25px;
        }

        .mensaje {
	
      font-family: Berlin Sans FB Demi;
      padding:5px;
      color:#00aae4;
      border-radius:5px;
      text-align: left;
      font-size: 2.5em;
      margin-bottom: 5px;
    
  } 
    </style>
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../sweetalert/sweetalert2.min.css" rel="stylesheet">


</head>

<body>


    <div class="page-title">
        <div class="title_left">
            <h3 class="mensaje" style="padding-left: 10px;">Reporte de citas agendadas</h3>
        </div>
    </div>

    <div class="clearfix"></div>



    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="input-daterange col-sm-8 col-md-8">
                        <div class="col-md-4">
                            <strong><label for="start_date">Desde: </label></strong>
                            <input type="text" name="start_date" id="start_date" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <strong><label for="end_date">Hasta: </label></strong>
                            <input type="text" name="end_date" id="end_date" class="form-control" />
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="search" name="search" class="btn btn-info btn-sm" style="margin-top: 21.5%;"><i class="fa fa-search" aria-hidden="true"></i> B U S C A R</button>

                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="card-box table-responsive">
                            <table id="order_data" class="table table-striped table-bordered dt-responsive nowrap contenido" style="width:100% ;">
                                <thead>
                                    <tr>
                                        <th>Especialidad</th>
                                        <th>Medico</th>
                                        <th>Paciente</th>
                                        <th>Día de la cita</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>


</body>

</html>

<script src="../../jquery/jquery.min.js"></script>
<script src="../../sweetalert/sweetalert2.all.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {




        $('.input-daterange').datepicker({
            "locale": {
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },

            format: "yyyy-mm-dd",
            autoclose: true

        });

        fetch_data('no');

        function fetch_data(is_date_search, start_date = '', end_date = '') {
            var dataTable = $('#order_data').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: 'REPORTE DE CITAS AGENDADAS',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger btn-sm',
                    download: 'open',

                }],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                }],

                "processing": true,
                "serverSide": true,
                "sort": false,
                "order": [],
                "ajax": {
                    url: "../../Controlador/Reportes/filtro.php",
                    type: "POST",
                    data: {
                        is_date_search: is_date_search,
                        start_date: start_date,
                        end_date: end_date
                    }
                }
            });
        }

        $('#search').click(function() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            if (start_date != '' && end_date != '') {
                $('#order_data').DataTable().destroy();
                fetch_data('yes', start_date, end_date);
            } else {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Seleccione una fecha ',
                    showCloseButton: true

                })
            }
        });

    });
</script>




<?php require_once '../../plantilla/footer.php'; ?>