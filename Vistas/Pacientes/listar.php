<?php
session_start();
include '../../plantilla/header.php';
?>

<!doctype html>
<html lang="en">

<head>      
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURL?>sweetalert/sweetalert2.min.css" rel="stylesheet">

    <title>Pacientes</title>

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
            <h3 class="mensaje" style="padding-left: 10px;">Lista de Pacientes</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <?php include 'agregar.php'; ?>
                <?php include 'editar.php'; ?>
                <?php include 'eliminar.php'; ?>

                <a data-toggle="modal" data-target="#AgregarPacienteModal" class="btn btn-success btn-sm" style="color: white;"> <i class="fa fa-plus"></i> Agregar Paciente</a>

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
                                        
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
                                        <th scope="col">Tipo de Documento</th>
                                        <th scope="col">Documento de Identidad</th>                                       
                                        <th scope="col">Género</th>
                                        <th scope="col">Fecha de Nacimiento</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Correo Electrónico</th>
                                        <th scope="col">Teléfono</th>
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
    <script src="<?php echo SERVERURL?>sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo SERVERURL?>jquery/jquery.min.js"></script>
    <script>
        //llamamos al ID de la tabla para usar DataTable JQuery
        $(document).ready(function() {
            let datatableInstance = $('#tabla').DataTable({
                // cargamos los datos Json con ajax 
                "ajax": {
                    "url": "<?php echo SERVERURL?>Controlador/Paciente/listar.php",
                },
                "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
                "columns": [
                    {
                        "data": "PAC_NOMBRES"
                    },
                    {
                        "data": "PAC_P_APELLIDO"
                    },
                    {
                        "data": "PAC_S_APELLIDO"
                    },
                    
                    {
                        "data": "PAC_TIPO_DNI"
                    },
                    {
                        "data": "PAC_DNI"
                    },                    
                    {
                        "data": "PAC_GENERO"
                    },
                    {
                        "data": "PAC_FECHA_NAC"
                    },
                    {
                        "data": "PAC_DIRECCION"
                    },
                    {
                        "data": "PAC_CORREO"
                    },
                    {
                        "data": "PAC_TELEFONO"
                    },
                    {
                        "data": "PAC_ESTADO"
                    },
                    {
                        "defaultContent": " <button type='button' data-toggle='modal' data-target='#EditarPacienteModal' class='edit btn btn-info btn-sm ' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar </button>  <button type='button' data-toggle='modal' data-target='#EliminarPacienteModal'  class='eliminar btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar  </button> "
                   
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


            $("#btnGuardarPaciente").on("click", function() {
                input = $(".nombres").val();
                input2 = $(".P_Apellido").val();
                if (input.length == 0 || input2.length == 0) {
                    Swal.fire({
                        title: 'Oops',
                        icon: 'warning',
                        text: 'Todos los campos son requeridos',
                        showCloseButton: true
                        
                    })
                    // alert("Todos los campos son requeridos")
                } else {
                    grabar();
                }
            })

            $("#btnEditarPaciente").on("click", function(e) {
                e.preventDefault();
                actualizar();
               

            })

            $("#btnEliminarPaciente").on("click", function() {

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

                let idpac = $("#EidPacienteP").val(data.PAC_ID),
                    nombresP = $("#EnombresP").val(data.PAC_NOMBRES),
                    P_ApellidoP = $("#EP_ApellidoP").val(data.PAC_P_APELLIDO),
                    S_ApellidoP = $("#ES_ApellidoP").val(data.PAC_S_APELLIDO),
                    generoP = $("#genero_valP ").val(data.PAC_GENERO).html(data.PAC_GENERO),                    
                    t_dniP = $("#E_t_dniP ").val(data.PAC_TIPO_DNI).html(data.PAC_TIPO_DNI),
                    dnP = $("#EdniP").val(data.PAC_DNI),
                    f_naciP = $("#Ef_naciP").val(data.PAC_FECHA_NAC),
                    correoP = $("#EcorreoP").val(data.PAC_CORREO),
                    telefP = $("#EtelefP").val(data.PAC_TELEFONO),
                    dirP = $("#EdirP").val(data.PAC_DIRECCION);

            });
        }

        let Obtener_Id_Eliminar = function(tbody, datatableInstance) {
            $(tbody).on('click', 'button.eliminar', function() {
                var data = datatableInstance.row($(this).parents('tr')).data();
                // console.log(data);             
                let idPac = $("#formEliminarPaciente #idPacienteEl").val(data.PAC_ID)
                    

            });
        }
        //Funcion para verificar que la variable rs retorne true
        let grabar = function() {
            let url = "<?php echo SERVERURL?>Controlador/Paciente/ControladorPaciente.php";
            let dataform = $("#formPaciente").serialize();
            dataform = "accion=insertar&" + dataform;
            $.post(url, dataform).done((rs) => {
                console.log(rs)
                if (rs.success == true) {                 
                    // alert("Registro guardado")                   
                    $("#AgregarPacienteModal").modal("hide");
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
            let urlE = "<?php echo SERVERURL?>Controlador/Paciente/ControladorPaciente.php";
            let dataformEd = $("#formEditarPaciente").serialize();
            dataformEd = "accion=actualizar&" + dataformEd;
            $.post(urlE, dataformEd).done((rsu) => {
                console.log(rsu)
                if (rsu.success == true) {
                   // alert("Registro Modificado")
                  
                    $("#EditarPacienteModal").modal('hide');
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
            let urlEl = "<?php echo SERVERURL?>Controlador/Paciente/ControladorPaciente.php";
            let dataformEl = $("#formEliminarPaciente").serialize();
            dataformEl = "accion=eliminar&" + dataformEl;
            $.post(urlEl, dataformEl).done((rse) => {
                console.log(rse)
                if (rse.success == true) {
                    console.log(rse.success)
                   // alert("Registro Elimiando")
                    $("#EliminarPacienteModal").modal("hide");
                    Swal.fire(
                        'Correcto!',
                        'Registro Eliminado!',
                        'success'
                    ); 
                    $('.dataTable').DataTable().ajax.reload(null, false);
                } else {
                    console.log(rse.mensaje)
                    $("#EliminarPacienteModal").modal("hide");
                   
                   Swal.fire(
                       'Oops!',
                       'No se pudo eliminar su registro existen dependencias',
                       'error'
                   ); 
                }
            })
        }
    </script>

</body>

</html>
<?php include '../../plantilla/footer.php'; ?>