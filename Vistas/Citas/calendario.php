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

    <style>
        span.green {
            background: #5EA226;
            border-radius: 0.6em;
            -moz-border-radius: 0.6em;
            -webkit-border-radius: 0.6em;
            color: #ffffff;
            display: inline-block;
            font-weight: bold;
            line-height: 0.8em;
            margin-right: 15px;
            text-align: center;
            width: 0.8em;
        }

        span.red {
            background: #FF0000;
            border-radius: 0.6em;
            -moz-border-radius: 0.6em;
            -webkit-border-radius: 0.6em;
            color: #ffffff;
            display: inline-block;
            font-weight: bold;
            line-height: 0.8em;
            margin-right: 15px;
            text-align: center;
            width: 0.8em;
        }

        span.black {
            background: #000000;
            border-radius: 0.6em;
            -moz-border-radius: 0.6em;
            -webkit-border-radius: 0.6em;
            color: #ffffff;
            display: inline-block;
            font-weight: bold;
            line-height: 0.8em;
            margin-right: 15px;
            text-align: center;
            width: 0.8em;
        }
    </style>
</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 style="padding-left: 10px;">Agendación de Citas</h3>
        </div>

    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <h6><span class="black" style="color:transparent; margin-top:3%;">0</span>Por Atender</h6>

        </div>
        <div class="form-group col-md-4">
            <h6><span class="green" style="color:transparent; margin-top:3%;">0</span>Atendido</h6>

        </div>
        <div class="form-group col-md-4">
            <h6><span class="red" style="color:transparent; margin-top:3%;">0</span>No Atendido</h6>

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



<script src="../../jquery/jquery.min.js"></script>

<script src="../../Controlador/citas/calendario/js/calendario.js"></script>

</html>
<?php
include '../../plantilla/footer.php';

?>