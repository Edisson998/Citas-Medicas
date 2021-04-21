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
    <link href="<?php echo SERVERURL?>sweetalert/sweetalert2.min.css" rel="stylesheet">

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

</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 class="mensaje" style="padding-left: 10px;">Lista de Horarios</h3>
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
                                        <th scope="col">Día de entrada de turno</th>
                                        <th scope="col">Día de salida de turno</th>
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
    </div>
    <script src="<?php echo SERVERURL?>sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo SERVERURL?>jquery/jquery.min.js"></script>
    <script>
        //llamamos al ID de la tabla para usar DataTable JQuery
        $(document).ready(function() {
            let datatableInstance = $('#tabla').DataTable({
                // cargamos los datos Json con ajax 
                "ajax": {
                    "url": "<?php echo SERVERURL?>Controlador/Horarios/listar.php",
                },
                "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                }],
                "columns": [{
                        "data": "MED_NOMBRES"
                    },
                    {
                        "data": "HOR_DIA_INGRESO"
                    },
                    {
                        "data": "HOR_DIA_SALIDA"
                    },
                    {
                        "data": "HOR_HORA_INGRESO"
                    },
                    {
                        "data": "HOR_HORA_SALIDA"
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
                responsive: true

            });



            //Escojemos la clase showHideColumn para mostrar u ocultar las columnas
            //cuando se haga click 
            /*   $('.showHideColumn').on('click', function() {
                   var tableColumn = datatableInstance.column($(this).attr('data-columindex'));
                   tableColumn.visible(!tableColumn.visible());
               });*/


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
                console.log(data);

                //Capturamos los valores de la base en cada campo de texto del modal editar

                let idHor = $("#eidHor").val(data.HOR_ID),
                    nmedico = $("#neMedico").val(data.MED_ID).html(data.MED_NOMBRES),
                    diain = $("#eD_ingreso").val(data.HOR_DIA_INGRESO).html(data.HOR_DIA_INGRESO),
                    diasa = $("#eD_salida").val(data.HOR_DIA_SALIDA).html(data.HOR_DIA_SALIDA),
                    ingreso = $("#ehingreso").val(data.HOR_HORA_INGRESO),
                    salida = $("#ehsalida").val(data.HOR_HORA_SALIDA)

            });
        }

               

        let Obtener_Id_Eliminar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.eliminar', function() {
                var data = datatableInstance.row($(this).parents('tr')).data();
                 console.log(data); 


                //Capturamos los valores de la base en cada campo de texto del modal editar
                       
                let idHor = $("#formEliminarHorario #idHorEl").val(data.HOR_ID)


            });
        }

        //Creamos una funcion que nos permita verificar que los campos de texto tenga información
        function validarFormularioHor() {

            //Referenciamos que formulario vamos a validarS
            let FormularioHorario = document.formuHorario;

            //Preguntamos si cada campo esta vacio que nos alerte que el campo es requerido caso contrario se dirigira a la funcion grabar
            if (FormularioHorario.nmedico.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja un médico',
                    showCloseButton: true

                })
               
            } else if (FormularioHorario.d_ingreso.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja un día de ingreso',
                    showCloseButton: true

                })
            } else if (FormularioHorario.d_salida.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja un día de salida',
                    showCloseButton: true

                })

            } else if (FormularioHorario.hingreso.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja una hora de entrada',
                    showCloseButton: true

                })

            } else if (FormularioHorario.hsalida.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja una hora de salida',
                    showCloseButton: true

                })

            } else {
                grabar();
            }

        }


        //Funcion para verificar que la variable rs retorne true
        let grabar = function() {
            let url = "<?php echo SERVERURL?>Controlador/Horarios/ControladorHorarios.php";
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
            let urlE = "<?php echo SERVERURL?>Controlador/Horarios/ControladorHorarios.php";
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
            let urlEl = "<?php echo SERVERURL?>Controlador/Horarios/ControladorHorarios.php";
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
                    $("#EliminarHorarioModal").modal("hide");
                    Swal.fire(
                        'Error!',
                        'No se pudo eliminar el registro existen dependencias',
                        'error'
                    );
                }
            })
        }
    </script>

</body>

</html>
<?php include '../../plantilla/footer.php'; ?>