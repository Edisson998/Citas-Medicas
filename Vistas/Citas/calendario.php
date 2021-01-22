<?php
session_start();
include '../../plantilla/header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Citas Médicas</title>
</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 style="padding-left: 10px;">Agendación de Citas</h3>
        </div>
    </div>


    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="CalendarioCitas">
                                <?php include 'agregar.php' ?>
                                <?php include 'editar.php' ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>



<script src="../../Complementos_Plantilla/js/jquery.min.js"></script>

<script src="../../Controlador/citas/calendario/js/calendario.js"></script>

</html>
<?php
include '../../plantilla/footer.php';

?>