<?php
session_start();
include '../../plantilla/header.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../sweetalert/sweetalert2.min.css" rel="stylesheet">

    <title>Horarios</title>

    <style>
        table th {
            background: #2A3F54;
            color: white;
        }

        .showHideColumn {
            cursor: pointer;
            color: blue;

        }
    </style>

</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 style="padding-left: 10px;">Lista de Horarios</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <?php include 'agregar.php'; ?>
                <?php include 'editar.php'; ?>
                <?php include 'eliminar.php'; ?>

                <a data-toggle="modal" data-target="#AgregarHorariodModal" class="btn btn-success btn-sm" style="color: white;"> <i class="fa fa-plus"></i> Agregar Horario</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                       <!--  <b> Mostrar / Ocultar Columnas: </b>
                         <a class="showHideColumn" data-columindex="0">Nombres</a> -
                        <a class="showHideColumn" data-columindex="1">Apellido Paterno</a> -
                        <a class="showHideColumn" data-columindex="2">Apellido Materno</a> -
                        <a class="showHideColumn" data-columindex="3">Tipo de Documento</a> -
                        <a class="showHideColumn" data-columindex="4">Documento de Identidad</a> -
                        <a class="showHideColumn" data-columindex="5">Especialidad</a> -
                        <a class="showHideColumn" data-columindex="6">Género</a> -
                        <a class="showHideColumn" data-columindex="7">Fecha de Nacimiento</a> -
                        <a class="showHideColumn" data-columindex="8">Dirección</a> -
                        <a class="showHideColumn" data-columindex="9">Correo Electrónico</a> -
                        <a class="showHideColumn" data-columindex="10">Teléfono</a> -
                        <a class="showHideColumn" data-columindex="11">Estado</a>
                        <br>-->
                        <div class="card-box table-responsive">
                            <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap contenido" style="width:100% ;">

                                <thead>
                                    <tr>                                        
                                        <th scope="col">Médico</th>      
                                        <th scope="col">Fecha</th>                               
                                        <th scope="col">Hora de Ingreso</th> 
                                        <th scope="col">Hora de Salida</th> 
                                        <th scope="col">Estado</th>                                       
                                        <th scope="col" data-priority>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../Complementos_Plantilla/js/jquery.min.js"></script>
    <script>
        //llamamos al ID de la tabla para usar DataTable JQuery
        $(document).ready(function() {
            let datatableInstance = $('#tabla').DataTable({
                // cargamos los datos Json con ajax 
                "ajax": {
                    "url": "../../Controlador/Horarios/listar.php",
                },
                "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
                "columns": [
                    {
                        "data": "MED_NOMBRES"
                    },
                    {
                        "data": "HOR_DIAS"
                    },
                    {
                        "data": "HOR_INGRESO"
                    },
                    {
                        "data": "HOR_SALIDA"
                    },
                    {
                        "data": "HOR_ESTADO"
                    },
                    {
                        "defaultContent": " <button type='button' data-toggle='modal' data-target='#EditarHorariodModal' class='edit btn btn-info btn-sm ' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar </button>  <button type='button' data-toggle='modal' data-target='#EliminarHorarioModal'  class='eliminar btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar  </button> "
                   
                    }

                ],
                
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive: true,


            });



            //Escojemos la clase showHideColumn para mostrar u ocultar las columnas
            //cuando se haga click 
         /*   $('.showHideColumn').on('click', function() {
                var tableColumn = datatableInstance.column($(this).attr('data-columindex'));
                tableColumn.visible(!tableColumn.visible());
            });*/


            //Llamamos a la funcion grabar


            $("#btnGuardarHorario").on("click", function() {
                input = $(".nmedico").val();
                input2 = $(".fecha").val();
                input3 = $(".hingreso").val();
                input4 = $(".hsalida").val();
                
                if (input.length == 0 || input2.length == 0 || input3.length == 0 || input4.length == 0 ) {
                    Swal.fire({
                        title: 'Oops',
                        icon: 'warning',
                        text: 'Todos los campos son requeridos',
                        className: "red-bg",
                        showCloseButton: true
                        
                    })
                    // alert("Todos los campos son requeridos")
                } else {
                    grabar();
                }
            })

            $("#btnEditarHorario").on("click", function(e) {
                e.preventDefault();
                actualizar();
                $('.dataTable').DataTable().ajax.reload(null, false);

            })

            $("#btnEliminarHorario").on("click", function() {

                eliminar();

            })

            Obtener_Data_Editar("#tabla tbody", datatableInstance);
            Obtener_Id_Eliminar("#tabla tbody", datatableInstance);

        });



        let Obtener_Data_Editar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.edit', function() {
                var data = datatableInstance.row($(this).parents("tr")).data();
                // console.log(data);

                //Capturamos los valores de la base en cada campo de texto del modal editar

                let idHor = $("#idHor").val(data.HOR_ID),                  
                    nmedico= $("#neMedico").val(data.MED_ID).html(data.MED_NOMBRES),    
                    dias = $("#efecha").val(data.HOR_DIAS),
                    ingreso = $("#ehingreso").val(data.HOR_INGRESO),
                    salida = $("#ehsalida").val(data.HOR_SALIDA)            

            });
        }

        let Obtener_Id_Eliminar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.eliminar', function() {
                var data = datatableInstance.row($(this).parents('tr')).data();
                // console.log(data);             
                let idesp = $("#formEliminarHorario #idHorEl").val(data.HOR_ID)
                    

            });
        }
        //Funcion para verificar que la variable rs retorne true
        let grabar = function() {
            let url = "../../Controlador/Horarios/ControladorHorarios.php";
            let dataform = $("#formHorario").serialize();
            dataform = "accion=insertar&" + dataform;
            $.post(url, dataform).done((rs) => {
                console.log(rs)
                if (rs.success == true) {                 
                    // alert("Registro guardado")                   
                    $("#AgregarHorariodModal").modal("hide");
                    Swal.fire(
                        'Correcto!',
                        'Registro guardado!',
                        'success'
                    );                   
                    $(".input").val("");
                    $('.dataTable').DataTable().ajax.reload(null, false);
                } else {
                    alert("Ocurrio un error")
                    console.log(rs.mensaje)
                }
            })
        }

        let actualizar = function() {
            let urlE = "../../Controlador/Horarios/ControladorHorarios.php";
            let dataformEd = $("#formEditarHorario").serialize();
            dataformEd = "accion=actualizar&" + dataformEd;
            $.post(urlE, dataformEd).done((rsu) => {
                console.log(rsu)
                if (rsu.success == true) {
                   // alert("Registro Modificado")                  
                    $("#EditarHorariodModal").modal('hide');
                    Swal.fire(
                        'Correcto!',
                        'Registro Modificado!',
                        'success'
                    ); 
                    //location.reload();
                    $('.dataTable').DataTable().ajax.reload(null, false);
                    console.log(rsu.success)
                } else {
                    console.log(rsu.mensaje)
                }
            })
        }

        let eliminar = function() {
            let urlEl = "../../Controlador/Horarios/ControladorHorarios.php";
            let dataformEl = $("#formEliminarHorario").serialize();
            dataformEl = "accion=eliminar&" + dataformEl;
            $.post(urlEl, dataformEl).done((rse) => {
                console.log(rse)
                if (rse.success == true) {
                    console.log(rse.success)
                   // alert("Registro Elimiando")
                    $("#EliminarHorarioModal").modal("hide");
                    Swal.fire(
                        'Correcto!',
                        'Registro Eliminado',
                        'success'
                    ); 
                    $('.dataTable').DataTable().ajax.reload(null, false);
                } else {
                    console.log(rse.mensaje)
                }
            })
        }
    </script>

</body>

</html>
<?php include '../../plantilla/footer.php'; ?>