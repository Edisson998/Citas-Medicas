$(document).ready(function() {

    


    $('#CalendarioCitas').fullCalendar({


        //en el header podemos mover al gusto que queramos nuestros botones 
        //e incluso podemos agregar botones personalizados

        header: {
            left: 'today,prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay '
        },
        //puedo selecionar una celda del calendario con dayclick
        dayClick: function(date, jsEvent, view) {
            //me informa el valor seleccionado de cad celda del calendario
            //alert("valor seleccionado: " + date.format());
            //me informa cual es la vista en la que me ecnuentro del calendario
            //alert("Vista actual: " + view.name);
            //marca mi celda del color que elija
            //$(this).css('background-color', 'red');

            $('#AgregarCita').modal();
            $("#formCita #fecha").val(date.format('Y-MM-DD 10:mm'));
        },


        //events es un conjunto de datos que esta en un arreglo
        //Listamos los eventos disponibles a traves de un Json
       
        events: baseUrl+'Controlador/citas/calendario/listar.php',



        //con esto obtenemos la informacion de un determinado evento al momento de hacer click
        eventClick: function(calEvent, jsEvent, view) {
            $("#EditarCita").modal("show");
            $('#EidCit').val(calEvent.CIT_ID);
            $('#EEspecialidad').val(calEvent.ESP_ID).html(calEvent.EP_DESCRIPCION);
            $('#EnMedico').val(calEvent.MED_ID).html(calEvent.Nombres);
            $('#Epaciente').val(calEvent.PAC_ID).html(calEvent.NombresP);

            FechaHora = calEvent.start._i.split(" ");
            $('#Efecha').val(FechaHora[0] + " " + FechaHora[1]);

            $('#estadoCita').val(calEvent.CIT_ESTADO_CITA).html(calEvent.CIT_ESTADO_CITA);
            $('#colorCita').val(calEvent.textColor).html(calEvent.textColor);
            $('#Eobs').val(calEvent.CIT_OBSERVACIONES);
           

        },

        editable: true,
        eventDrop: function(calEvent) {

            $('#EidCit').val(calEvent.CIT_ID);
            $('#EEspecialidad').val(calEvent.ESP_ID).html(calEvent.EP_DESCRIPCION);
            $('#EnMedico').val(calEvent.MED_ID).html(calEvent.Nombres);
            $('#Epaciente').val(calEvent.PAC_ID).html(calEvent.NombresP);

            FechaHora = calEvent.start.format().split("T");
            $('#Efecha').val(FechaHora[0] + " " + FechaHora[1]);
            
            $('#estadoCita').val(calEvent.CIT_ESTADO_CITA).html(calEvent.CIT_ESTADO_CITA);
            $('#colorCita').val(calEvent.textColor).html(calEvent.textColor);
            
            $('#Eobs').val(calEvent.CIT_OBSERVACIONES);
            actualizar();
        },
        eventLimit: true,
        locale: 'es'
    });

    //AQUI VA EL SELECT
    //Funcion para cargar select del médico segun la especialidad mediante AJAX
    //Formulario de AGREGAR CITA   
    var medico = $('#nmedico');
    $('#especialidad').change(function() {
        var id_especialidad = $(this).val();

        $.ajax({
            data: {
                id_especialidad: id_especialidad
            },
            dataType: 'html',
            type: 'POST',
            url: '../../Controlador/citas/select/select.php',

        }).done(function(data) {
            medico.html(data);
        });
    });
    //FIN DE FORMULARIO DE AGREGAR CITA

    //Formulario de Editar CITA 

    var medicoE = $('#nEmedico');
    $('#Eespecialidad').change(function() {
        var id_especialidadE = $(this).val();

        $.ajax({
            data: {
                id_especialidadE: id_especialidadE
            },
            dataType: 'html',
            type: 'POST',
            url: '../../Controlador/citas/select/select.php',

        }).done(function(data) {
            medicoE.html(data);
        });
    });
    //FIN DE FORMULARIO EDITAR CITA
    //Fin
    //FIN DE LOS SELECT


});


//Creamos una funcion que nos permita verificar que los campos de texto tenga información
function validarFormulario() {

    //Referenciamos que formulario vamos a validarS
    let Formulario = document.formuCita;

    //Preguntamos si cada campo esta vacio que nos alerte que el campo es requerido caso contrario se dirigira a la funcion grabar
    if (Formulario.especialidad.value === "") {
        Swal.fire({
            title: 'Todos los campos son requeridos',
            icon: 'warning',
            text: 'Escoja una especialidad',
            showCloseButton: true

        })
    } else if (Formulario.nmedico.value === "") {
        Swal.fire({
            title: 'Todos los campos son requeridos',
            icon: 'warning',
            text: 'Escoja un medico',
            showCloseButton: true

        })
    } else if (Formulario.Paciente.value === "") {
        Swal.fire({
            title: 'Todos los campos son requeridos',
            icon: 'warning',
            text: 'Escoja un paciente',
            showCloseButton: true

        })

    } else {
        grabar();
    }

}

//Comenzamos creando la funcion grabar que va ha consumir el archivo php
function grabar() {
    //Refenciamos el sitio en donde estamos ejecutando nuestros datos
    let url = "../../Controlador/citas/calendario/ControladorCita.php";
    //Indicamos de que formulario va a obtener la informacion que se va a enviar a la BDD
    let dataform = $("#formCita").serialize();
    //Especificamos que accion ha ejecutado 
    dataform = "accion=agregar&" + dataform;
    //Enviamos por metodo post esta informacion
    $.post(url, dataform).done((rs) => {
        //Mostramos en consola el resultado de la variable rs 
        console.log(rs)
            //Si el resultado es true se nos insertara en la BDD sin problema caso contrario nos mostrara un error
        if (rs.success == true) {
            $("#AgregarCita").modal("hide");
            Swal.fire(
                'Correcto!',
                'Registro guardado!',
                'success'
            );
            $(".input").val("");
            $('#CalendarioCitas').fullCalendar('refetchEvents');


        } else {
            alert("Ocurrio un error")
            console.log(rs.mensaje)
        }
    })
}

function actualizar(modal) {
    let urlE = "../../Controlador/citas/calendario/ControladorCita.php";
    let dataformEd = $("#formEditarCita").serialize();
    dataformEd = "accion=actualizar&" + dataformEd;
    $.post(urlE, dataformEd).done((rsu) => {
        console.log(rsu)
        if (rsu.success == true) {
            // alert("Registro Modificado")

            if (!modal) {

                $("#EditarCita").modal('hide');
                Swal.fire(
                    'Correcto!',
                    'Registro Modificado!',
                    'success'
                );
                //location.reload();
                $(".inputE").val("");
                $('#CalendarioCitas').fullCalendar('refetchEvents');
                console.log(rsu.success)
            }

        } else {
            console.log(rsu.mensaje)
        }
    })

}



function eliminar() {
    let urlEl = "../../Controlador/citas/calendario/ControladorCita.php";
    let dataformEl = $("#formEditarCita").serialize();
    dataformEl = "accion=eliminar&" + dataformEl;
    $.post(urlEl, dataformEl).done((rse) => {
        console.log(rse)
        if (rse.success == true) {
            console.log(rse.success)
                // alert("Registro Elimiando")
            $("#EditarCita").modal("hide");
            Swal.fire(
                'Correcto!',
                'Registro Eliminado!',
                'success'
            );
            $('#CalendarioCitas').fullCalendar('refetchEvents');
        } else {
            console.log(rse.mensaje)
        }
    })
}

