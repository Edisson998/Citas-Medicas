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
    <link href="<?php echo SERVERURL ?>sweetalert/sweetalert2.min.css" rel="stylesheet">

    <title>Usuarios</title>

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
            padding: 5px;
            color: #00aae4;
            border-radius: 5px;
            text-align: left;
            font-size: 2.5em;
            margin-bottom: 5px;

        }
    </style>

</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 class="mensaje" style="padding-left: 10px;">Lista de Usuarios</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <?php include 'agregar.php'; ?>
                <?php include 'editar.php'; ?>
                <?php include 'eliminar.php'; ?>

                <a data-toggle="modal" data-target="#AgregarUsuarioModal" class="btn btn-success btn-sm" style="color: white;"> <i class="fa fa-plus"></i> Agregar Usuario</a>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="card-box table-responsive">
                            <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap contenido" style="width:100% ;">

                                <thead>
                                    <tr>

                                        <th scope="col">Rol</th>
                                        <th scope="col">Correo Electrónico</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
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
    <script src="<?php echo SERVERURL ?>sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo SERVERURL ?>jquery/jquery.min.js"></script>
    <script>
        //llamamos al ID de la tabla para usar DataTable JQuery
        $(document).ready(function() {
            let datatableInstance = $('#tabla').DataTable({
                // cargamos los datos consumiendo el Json con ajax 
                "ajax": {
                    "url": "<?php echo SERVERURL ?>Controlador/Usuario/listar.php",
                },
                "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                }],
                "columns": [{
                        "data": "ROL_DESCRIPCION"
                    },
                    {
                        "data": "USU_CORREO"
                    },
                    {
                        "data": "USU_CLAVE"
                    },

                    {
                        "data": "USU_NOMBRES"
                    },
                    {
                        "data": "USU_P_PELLIDO"
                    },
                    {
                        "data": "USU_S_APELLIDO"
                    },
                    {
                        "data": "USU_ESTADO"
                    },
                    {
                        "defaultContent": " <button type='button' data-toggle='modal' data-target='#EditarUsuarioModal' class='edit btn btn-info btn-sm ' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar </button>  <button type='button' data-toggle='modal' data-target='#EliminarUsuarioModal'  class='eliminar btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar  </button> "

                    }

                ],

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive: true,


            });

            $("#btnEditarUsu").on("click", function(e) {
                e.preventDefault();
                actualizar();


            })

            $("#btnEliminarUsu").on("click", function() {

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

                let idUsu = $("#eidUsu").val(data.USU_ID),
                    idRol = $("#Erol").val(data.ROL_ID).html(data.ROL_DESCRIPCION),
                    correoUsu = $("#ecorreoUsu").val(data.USU_CORREO),
                    claveUsu = $("#eclaveUsu").val(data.USU_CLAVE),
                    nombreUsu = $("#enombresUsu").val(data.USU_NOMBRES),
                    apellidoPUsu = $("#eapellidoPUsu ").val(data.USU_P_PELLIDO),
                    apellidoMUsu = $("#eapellidoMUsu").val(data.USU_S_APELLIDO)


            });
        }

        let Obtener_Id_Eliminar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.eliminar', function() {
                var data = datatableInstance.row($(this).parents('tr')).data();
                // console.log(data);             
                let idUsuEl = $("#formEliminarUsuario #idUsuEl").val(data.USU_ID)


            });
        }


        //Creamos una funcion que nos permita verificar que los campos de texto tenga información
        function validarFormularioUsu() {

            //Referenciamos que formulario vamos a validarS
            let FormularioUsu = document.formuUsuario;

            //Preguntamos si cada campo esta vacio que nos alerte que el campo es requerido caso contrario se dirigira a la funcion grabar
            if (FormularioUsu.rol.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Escoja un rol para el usuario',
                    showCloseButton: true

                })
            } else if (FormularioUsu.correoUsu.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Ingrese un correo electrónico',
                    showCloseButton: true

                })
            } else if (FormularioUsu.claveUsu.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Ingrese una contraseña segura ',
                    showCloseButton: true

                })

            } else if (FormularioUsu.nombresUsu.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Ingrese un nombre ',
                    showCloseButton: true

                })

            } else if (FormularioUsu.apellidoPUsu.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Ingrese su apellido paterno',
                    showCloseButton: true

                })

            } else if (FormularioUsu.apellidoMUsu.value === "") {
                Swal.fire({
                    title: 'Todos los campos son requeridos',
                    icon: 'warning',
                    text: 'Ingrese su apellido materno',
                    showCloseButton: true

                })

            } else {
                grabar();
            }

        }

        //Funcion para verificar que la variable rs retorne true
        let grabar = function() {
            let url = "<?php echo SERVERURL ?>Controlador/Usuario/ControladorUsuario.php";
            let dataform = $("#formUsuario").serialize();
            dataform = "accion=insertar&" + dataform;
            $.post(url, dataform).done((rs) => {
                console.log(rs)
                if (rs.success == true) {
                    // alert("Registro guardado")                   
                    $("#AgregarUsuarioModal").modal("hide");
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
            let urlE = "<?php echo SERVERURL ?>Controlador/Usuario/ControladorUsuario.php";
            let dataformEd = $("#formEditarUsuario").serialize();
            dataformEd = "accion=actualizar&" + dataformEd;
            $.post(urlE, dataformEd).done((rsu) => {
                console.log(rsu)
                if (rsu.success == true) {
                    // alert("Registro Modificado")

                    $("#EditarUsuarioModal").modal('hide');
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
            let urlEl = "<?php echo SERVERURL ?>Controlador/Usuario/ControladorUsuario.php";
            let dataformEl = $("#formEliminarUsuario").serialize();
            dataformEl = "accion=eliminar&" + dataformEl;
            $.post(urlEl, dataformEl).done((rse) => {
                console.log(rse)
                if (rse.success == true) {
                    console.log(rse.success)
                    // alert("Registro Elimiando")
                    $("#EliminarUsuarioModal").modal("hide");
                    Swal.fire(
                        'Correcto!',
                        'Registro Eliminado!',
                        'success'
                    );
                    $('.dataTable').DataTable().ajax.reload(null, false);
                } else {
                    console.log(rse.mensaje)
                    $("#EliminarUsuarioModal").modal("hide");
                    Swal.fire(
                        'Error!',
                        'La sesion esta activa no se puede eliminar el usuario!',
                        'error'
                    );

                }
            })
        }
    </script>

</body>

</html>
<?php include '../../plantilla/footer.php'; ?>