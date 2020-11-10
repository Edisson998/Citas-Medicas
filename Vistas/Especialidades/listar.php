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

    <title>Especialidades</title>

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
            <h3 style="padding-left: 10px;">Lista de Especialidades</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <?php include 'agregar.php'; ?>
                <?php include 'editar.php'; ?>
                <?php include 'eliminar.php'; ?>

                <a data-toggle="modal" data-target="#AgregarEspecialidadModal" class="btn btn-success btn-sm" style="color: white;"> <i class="fa fa-plus"></i> Agregar Especialidades</a>

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
                                        <th scope="col">Descripción</th>                                    
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
                    "url": "../../Controlador/Especialidades/listar.php",
                },
                "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
                "columns": [
                    {
                        "data": "EP_DESCRIPCION"
                    },
                    {
                        "data": "ESP_ESTADO"
                    },
                    {
                        "defaultContent": " <button type='button' data-toggle='modal' data-target='#EditarEspecialidadModal' class='edit btn btn-info btn-sm ' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar </button>  <button type='button' data-toggle='modal' data-target='#EliminarEspecialidadModal'  class='eliminar btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar  </button> "
                   
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


            $("#btnGuardarEspecialidad").on("click", function() {
                input = $(".especialidad").val();
                
                if (input.length == 0 ) {
                    Swal.fire({
                        title: 'Oops',
                        icon: 'warning',
                        text: 'Ingrese una especialidad',
                        className: "red-bg",
                        showCloseButton: true
                        
                    })
                    // alert("Todos los campos son requeridos")
                } else {
                    grabar();
                }
            })

            $("#btnEditarEspecialidad").on("click", function(e) {
                e.preventDefault();
                actualizar();
                $('.dataTable').DataTable().ajax.reload(null, false);

            })

            $("#btnEliminarEspecialidad").on("click", function() {

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

                let idesp = $("#idEsp").val(data.ESP_ID),
                    esp = $("#editarEspecialidad").val(data.EP_DESCRIPCION)                   

            });
        }

        let Obtener_Id_Eliminar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.eliminar', function() {
                var data = datatableInstance.row($(this).parents('tr')).data();
                // console.log(data);             
                let idesp = $("#formEliminarEspecialidad #idEspEl").val(data.ESP_ID)
                    

            });
        }
        //Funcion para verificar que la variable rs retorne true
        let grabar = function() {
            let url = "../../Controlador/Especialidades/ControladorEspecialidad.php";
            let dataform = $("#formEspecialidad").serialize();
            dataform = "accion=insertar&" + dataform;
            $.post(url, dataform).done((rs) => {
                console.log(rs)
                if (rs.success == true) {                 
                    // alert("Registro guardado")                   
                    $("#AgregarEspecialidadModal").modal("hide");
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
            let urlE = "../../Controlador/Especialidades/ControladorEspecialidad.php";
            let dataformEd = $("#formEditarEspecialidad").serialize();
            dataformEd = "accion=actualizar&" + dataformEd;
            $.post(urlE, dataformEd).done((rsu) => {
                console.log(rsu)
                if (rsu.success == true) {
                   // alert("Registro Modificado")                  
                    $("#EditarEspecialidadModal").modal('hide');
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
            let urlEl = "../../Controlador/Especialidades/ControladorEspecialidad.php";
            let dataformEl = $("#formEliminarEspecialidad").serialize();
            dataformEl = "accion=eliminar&" + dataformEl;
            $.post(urlEl, dataformEl).done((rse) => {
                console.log(rse)
                if (rse.success == true) {
                    console.log(rse.success)
                   // alert("Registro Elimiando")
                    $("#EliminarEspecialidadModal").modal("hide");
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