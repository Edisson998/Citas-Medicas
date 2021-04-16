<?php
session_start();
include_once '../../plantilla/header.php';





?>


<body>	
            <div id="page-inner">

			<div class="dashboard-cards"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3><?php 
						$sql = "select COUNT(*) from tbl_paciente ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$total = $result->fetchColumn(); echo $total 
?></h3> 
						</div>
						<div class="card-action">
						<strong>Pacientes Registrados</strong>
						</div>
						</div>
						</div>
	 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">shopping_cart</i>
						</div>
						<div class="card-stacked orange">
						<div class="card-content">
						<h3><?php $sql1 = "select COUNT(*) from tbl_paciente ";
$result1 = $co->query($sql1);//$pdo sería el objeto conexión
$citas = $result1->fetchColumn(); echo $citas?></h3> 
						</div>
						<div class="card-action">
						<strong>Citas Agendadas</strong>
						</div>
						</div>
						</div> 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<h3>24,225</h3> 
						</div>
						<div class="card-action">
						<strong>PRODUCTS</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3>88,658</h3> 
						</div>
						<div class="card-action">
						<strong>VISITS</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
                </div>
			   </div>
<div class="form-group row">
		<img src="../../img/icono.svg" width="40%" style="padding-left: 10%;">
		<div class="col-sm-6" style="padding-left: 10%;">
			<h4> MISION</h4>
			<p class="lead text-justify">Prestar servicios de salud con calidad y calidez en el ámbito de la asistencia especializada, a través de su cartera de servicios, cumpliendo con la responsabilidad de promoción, prevención, recuperación, rehabilitación de la salud integral, docencia e investigación, conforme a las políticas del
				Ministerio de Salud Pública y el trabajo en red, en el marco de la justicia y equidad social.</p>
			<h4>VISION</h4>
			<p class="lead text-justify">Ser reconocidos por la ciudadanía como hospitales accesibles, que prestan una atención de calidad
				que satisface las necesidades y expectativas de la población bajo principios fundamentales de la salud pública y bioética, utilizando la tecnología y los recursos públicos de forma eficiente y transparente.</p>
		</div>

		<div class="col-sm-11" style="padding-left: 10%;">
			<p class="lead text-justify">
				Una atención de calidad que satisface las necesidades y expectativas de la población
				bajo principios fundamentales de la salud pública y bioética, utilizando la tecnología y los
				recursos públicos de forma eficiente y transparente.
		</div>
	</div>
<?php include '../../plantilla/footer.php'; ?>