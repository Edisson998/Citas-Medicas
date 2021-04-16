<?php
session_start();
include_once '../../plantilla/header.php';





?>


<body>	

<div class="row" style="display: inline-block;">
            
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-calendar"></i></div>
                  <div class="count"><?php 
						$sql = "select COUNT(*) from tbl_cita where CIT_ESTADO ='A' ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$cita_agendada  = $result->fetchColumn(); echo $cita_agendada 
?></div>
                  <h3>Citas</h3>
				  <h3>Agendadas</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-calendar-o"></i></div>
                  <div class="count"><?php 
						$sql = "select COUNT(*) from tbl_cita where CIT_ESTADO_CITA ='PA'and 	CIT_ESTADO ='A'  ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$citas_atendidas = $result->fetchColumn(); echo $citas_atendidas 
?></div>
                  <h3>Citas </h3>
				  <h3>Atendidas</h3>
                
                </div>
              </div>
			  
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-times-circle-o"></i></div>
                  <div class="count"><?php 
						$sql = "select COUNT(*) from tbl_cita where CIT_ESTADO_CITA ='PNA'and 	CIT_ESTADO ='A'  ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$citas_no_atendidas = $result->fetchColumn(); echo $citas_no_atendidas ?></div>
                  <h3>Citas No</h3>
				  <h3>Atendidas</h3>
                
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user-md"></i></div>
                  <div class="count"><?php 
						$sql = "select COUNT(*) from tbl_medico where 	MED_ESTADO = 'A' ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$medicos_disponibles = $result->fetchColumn(); echo $medicos_disponibles 
?></div>
                  <h3>Medicos</h3>
				  <h3>Disponibles</h3>
                  
                </div>
              </div>


<?php include_once 'barra.php'; ?>

<canvas id="chart1" height="100"></canvas>
</div>
          </div>
		  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [
        
        "Enero",
        "Febreo",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre", 

        ],
        datasets: [{
            label: ' Agendados',
            data: [
        
        <?php echo $enero;?>,
        <?php echo $febrero;?>,
        <?php echo $marzo;?>,
        <?php echo $abril;?>,
        <?php echo $mayo;?>,
        <?php echo $junio;?>,
        <?php echo $julio;?>,
        <?php echo $agosto;?>,
        <?php echo $semptiembre;?>,
        <?php echo $octubre;?>,
        <?php echo $noviembre;?>,
        <?php echo $diciembre;?>, 
        
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
        
        
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>


<?php include '../../plantilla/footer.php'; ?>