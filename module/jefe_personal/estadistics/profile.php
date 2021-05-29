<!DOCTYPE html>
 
<html lang="es-PE">
 
<head>
<title>Gobierno Regional Pasco</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/estilos.css" />
    <style>
        body { margin:0; padding:0; }
    </style>
</head>
 
<body>
    
    <header>
        <div class="box_1">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1 class="title-sala text-center" style="margin: 5px;"><strong>GOBIERNO REGIONAL PASCO</strong></h1>
                </div>
                <div class="col-lg-12 col-md-12 text-center">
                    <img src="../../../img/logo-2.png" class="img-fluid" width="50" height="50" style="margin-bottom: 5px;">
                </div>
            </div>
        </div>
    </header>
    
    <div class="container" style="margin-top:10px;">
        <div class="row">
        <div class="col-lg-12 col-md-12" style="margin-top: 25px; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg"width="100%" height="450px" version="1.1" style="padding: 0; margin: 0;"
                viewBox="0 0 24363.52 16229.66">
                    <g id="Capa_x0020_1">
                        <metadata id="CorelCorpID_0Corel-Layer"/>
                        <?php
                            include ('../../resources/infomapa.php');
                            include ('../../resources/tooltip.php');
                            print_r($distritosA);
                        ?>
                    </g>
                </svg>
            </div>
            <div class="boxInfo activo" id="boxInfo">
                <div class="info">
                    <h3 class="titulo text-center text-uppercase">Región Pasco</h3>
                    <div class="row">
                        <p class="total text-primary col-9">Colaboradores:</p>
                        <p class="total text-primary col-3 text-right">100</p>
                        <p class="total col-9">Secundaria:</p>
                        <p class="total col-3 text-right">100</p>
                        <p class="total col-9">Técnico:</p>
                        <p class="total col-3 text-right">100</p>
                        <p class="total col-9">Universitario:</p>
                        <p class="total col-3 text-right">100</p>
                        <p class="total col-9">Maestria:</p>
                        <p class="total col-3 text-right">100</p>
                        <p class="total col-9">Doctorado:</p>
                        <p class="total col-3 text-right">100</p>
                    </div>
                    <p class="direccion text-right">Fuente: GORE Pasco</p>
                </div>
            </div>
            <?php
                echo $contendTooltip;
            ?>
            
            <div class="col-12">
                <div class="row box_2">
                    <div class="col-1 text-center" style="margin-top:5px;">
                        <img class="svg" src="../../../img/icon/user-graduate-solid.svg">
                    </div>
                    <div class="col-11" style="margin-top:5px;">
                        <p class="title_2">Gráfico según Grado Académico</p>
                    </div>
                    <div class="" style="width: 100%; margin-bottom: 10px;">
		                <div style="width: 100%; margin-top:10px;">
		                    <canvas id="chartPROF" width="700" height="150" ></canvas>
		                </div>
		            </div>
                </div>
            </div>
            <div class="col-4" style="margin-top:255px;">
                <div class="row box_2">
                    <div class="col-2" style="margin-top:5px;">
                        <img class="svg" src="../../../img/icon/user-tie.svg">
                    </div>
                    <div class="col-10" style="margin-top:5px;">
                        <p class="text-center title_2">Condición Laboral</p>
                    </div>
                    <div class="" style="width: 100%; margin-bottom: 10px;">
		                <div style="width: 100%; margin-top:10px;">
		                    <canvas id="chartCOND" width="250" height="200" ></canvas>
		                </div>
		            </div>
                </div>
            </div>
            <div class="col-4" style="margin-top:255px;">
                <div class="row box_2">
                    <div class="col-2" style="margin-top:5px;">
                        <img class="svg" src="../../../img/icon/user-injured.svg">
                    </div>
                    <div class="col-10" style="margin-top:5px;">
                        <p class="text-center title_2">Discapacidad</p>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <footer class="footer" style="margin-top:500px;">
        <div class="container text-center">
            <a href="https://www.facebook.com/PascoRegion/" target="_blank">
                <img src="../../../img/icon/facebook.svg" style="margin-top: 10px;width: 2em;">
            </a>
        </div>
        <div class="footer-copyright text-center py-3" target="_blank">© 2020 Copyright:
            <a href="http://www.regionpasco.gob.pe/" target="_blank"> Gobierno Regional Pasco</a>
        </div>
    </footer>
  
    <script type="text/javascript" src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js" charset="utf-8"></script>
    <script src="../../../js/Chart.min.js" charset="utf-8"></script>
    <script src="../../../js/popper.min.js" charset="utf-8"></script>
    <script src="../../../js/tooltip.js" charset="utf-8"></script>

    <script type="text/javascript">
        //Gráfico Condición Laboral
        var chartCOND= document.getElementById("chartCOND").getContext("2d");

		var myChart = new Chart(chartCOND, {
			type: "bar",
			data: {
				labels: ["DL.728.","DL. 276","DL. 1057","LOCACIÓN"],
					datasets: [{
					    label: "CONDICIÓN LABORAL",
					    data: [100, 50, 20, 80 ],
					    backgroundColor: [
					        "rgb(0, 153, 153, 0.9)",
					        "rgb(250, 110, 51, 0.9)",
                            "rgb(0, 171, 114, 0.9)",
					        "rgb(250, 110, 51, 0.9)"
					    ],
					    hoverBackgroundColor: [
					        "rgb(0, 153, 153)",
					        "rgb(250, 110, 51)",
                            "rgb(0, 171, 114)",
					        "rgb(250, 110, 51)"
					    ]
					}]
				},
				options: {
					tooltips: {
					    titleFontSize: 16,
					    xPadding: 10,
					    yPadding: 10,
					    bodyFontSize: 13,
					    bodySpacing: 10,
					    mode: "x",
					},
					legend: {
					    position: "bottom"
					},
					scales: {
					    yAxes: [{
					        ticks: {
					            beginAtZero: true,
					            maxTicksLimit: 6,
					            padding: 20
					        },
					        gridLines: {
					            drawTicks: true,
					            display: true
					        }

					    }],
					    xAxes: [{
					        gridLines: {
					            zeroLineColor: "transparent"
					        },
					        ticks: {
					            padding: 20
					        }
					    }]
					}
				}
			});
        //Gráfico Profesional
        var chartPROF= document.getElementById("chartPROF").getContext("2d");

		var myChart = new Chart(chartPROF, {
			type: "bar",
			data: {
				labels: ["Secundaria","Estudiante Técnico","Técnico Egresado","Técnico Titulado","Univ. Estudiante","Univ. Egresado","Univ. Bachiller","Univ. Titulado","Maestria","Doctorado"],
					datasets: [{
					    label: "GRADO ACADÉMICO",
					    data: [100, 50, 20, 10, 5, 68, 89, 55, 60, 1 ],
					    backgroundColor: [
					        "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)",
                            "rgb(0, 153, 153, 0.9)"
					    ],
					    hoverBackgroundColor: [
					        "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)",
                            "rgb(0, 153, 153)"
					    ]
					}]
				},
				options: {
					tooltips: {
					    titleFontSize: 16,
					    xPadding: 10,
					    yPadding: 10,
					    bodyFontSize: 13,
					    bodySpacing: 10,
					    mode: "x",
					},
					legend: {
					    position: "bottom"
					},
					scales: {
					    yAxes: [{
					        ticks: {
					            beginAtZero: true,
					            maxTicksLimit: 6,
					            padding: 10
					        },
					        gridLines: {
					            drawTicks: true,
					            display: true
					        }

					    }],
					    xAxes: [{
					        gridLines: {
					            zeroLineColor: "transparent"
					        },
					        ticks: {
					            padding: 10
					        }
					    }]
					}
				}
			});
	</script>

</body>
</html>




