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
                                include ('../../resources/data.php');
                                print_r($distritosA);
                            ?>
                        </g>
                    </svg>
                </div>
                <div class="boxInfo activo" id="boxInfo">
                    <div class="info">
                        <h3 class="titulo text-center text-uppercase">Región Pasco</h3>
                        <div class="row">
                            <p class="total col-12 text-center">Colaboradores:</p>
                            <p class="total3 text-success col-12 text-center"><?php echo $tmpTotal; ?></p>
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
                            <p class="text-center title_2">Regimen Laboral</p>
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
                        <div class="" style="width: 100%; margin-bottom: 10px;">
                            <div style="width: 100%; margin-top:10px;">
                                <canvas id="chartDISC" width="250" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="margin-top:255px;">
                    <div class="row box_2">
                        <div class="col-2" style="margin-top:5px;">
                            <img class="svg" src="../../../img/icon/venus-mars-solid.svg">
                        </div>
                        <div class="col-10" style="margin-top:5px;">
                            <p class="text-center title_2">Sexo</p>
                        </div>
                        <div class="" style="width: 100%; margin-bottom: 10px;">
                            <div style="width: 100%; margin-top:10px;">
                                <canvas id="chartSEXO" width="250" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="margin-top:300px;">
                    <div class="row box_2">
                        <div class="col-2" style="margin-top:5px;">
                            <img class="svg" src="../../../img/icon/address-card.svg">
                        </div>
                        <div class="col-10" style="margin-top:5px;">
                            <p class="text-center title_2">Servicio Militar</p>
                        </div>
                        <div class="" style="width: 100%; margin-bottom: 10px;">
                            <div style="width: 100%; margin-top:10px;">
                                <canvas id="chartSM" width="250" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="margin-top:300px;">
                    <div class="row box_2">
                        <div class="col-2" style="margin-top:5px;">
                            <img class="svg" src="../../../img/icon/user-tie.svg">
                        </div>
                        <div class="col-10" style="margin-top:5px;">
                            <p class="text-center title_2">Etapa de Vida</p>
                        </div>
                        <div class="" style="width: 100%; margin-bottom: 10px;">
                            <div style="width: 100%; margin-top:10px;">
                                <canvas id="chartEV" width="250" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="margin-top:300px;">
                    <div class="row box_2">
                        <div class="col-2" style="margin-top:5px;">
                            <img class="svg" src="../../../img/icon/address-book-solid.svg">
                        </div>
                        <div class="col-10" style="margin-top:5px;">
                            <p class="text-center title_2">Vencimiento de Contratos</p>
                        </div>
                        <div class="col-12" style="height:60px; background-color:#00aa55; border-radius:10px; margin-top:10px;">
                            <div class="row" style="margin-top:10px;">
                                <p class="col-7 text-center" style="text-shadow:1px 1px 1px #000;">Más de 10 días</p>
                                <h3 class="col-5 text-center" style="font-weight:650; text-shadow:2px 1px 1px #000">100</h3>
                            </div>
                        </div>
                        <div class="col-12" style="height:60px; background-color:#eed000; border-radius:10px; margin-top:10px;">
                            <div class="row" style="margin-top:10px;">
                                <p class="col-7 text-center" style="text-shadow:1px 1px 1px #000;">Menos de 10 días y más de 5 días</p>
                                <h3 class="col-5 text-center" style="font-weight:650; text-shadow:2px 1px 1px #000">100</h3>
                            </div>
                        </div>
                        <div class="col-12" style="height:60px; background-color:#ff4444; border-radius:10px; margin-top:10px;">
                            <div class="row" style="margin-top:10px;">
                                <p class="col-7 text-center" style="text-shadow:1px 1px 1px #000;">Menos de 5 días</p>
                                <h3 class="col-5 text-center" style="font-weight:650; text-shadow:2px 1px 1px #000">100</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>   
    </div>

    <footer class="footer" style="margin-top:350px;">
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
				labels: [<?php 
                        for($i=0; $i<count($cadRL); $i++){
                            if($i<(count($cadRL)-1)){
                                echo '"'.$cadRL[$i] .'",';
                            }elseif( $i==(count($cadRL)-1) ){
                                echo '"'.$cadRL[$i] .'"';
                            }
                        }?>],
					datasets: [{
					    label: "CONDICIÓN LABORAL",
					    data: [<?php 
                        for($i=0; $i<count($numRL); $i++){
                            if($i<(count($numRL)-1)){
                                echo $numRL[$i] .',';
                            }elseif( $i==(count($numRL)-1) ){
                                echo $numRL[$i];
                            }
                        }?>],
					    backgroundColor: [
					        "rgb(50, 147, 220, 0.9)",
					        "rgb(50, 147, 220, 0.9)",
                            "rgb(50, 147, 220, 0.9)",
					        "rgb(50, 147, 220, 0.9)",
                            "rgb(50, 147, 220, 0.9)",
					        "rgb(50, 147, 220, 0.9)"
					    ],
					    hoverBackgroundColor: [
					        "rgb(50, 147, 220)",
					        "rgb(50, 147, 220)",
                            "rgb(50, 147, 220)",
					        "rgb(50, 147, 220)",
                            "rgb(50, 147, 220)",
					        "rgb(50, 147, 220)"
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

            //Gráfico Discapacidad
            var chartDISC= document.getElementById("chartDISC").getContext("2d");

            var myChart = new Chart(chartDISC, {
                type: "bar",
                data: {
                    labels: ["SI","NO"],
                        datasets: [{
                            label: "DISCAPACIDAD",
                            data: [100, 50],
                            backgroundColor: [
                                "rgb(50, 147, 220, 0.9)",
                                "rgb(250, 110, 51, 0.9)"
                            ],
                            hoverBackgroundColor: [
                                "rgb(50, 147, 220)",
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

                //Gráfico Servicio Militar
                var chartSM= document.getElementById("chartSM").getContext("2d");

                var myChart = new Chart(chartSM, {
                    type: "bar",
                    data: {
                        labels: ["SI","NO"],
                            datasets: [{
                                label: "SERVICIO MILITAR",
                                data: [100, 50],
                                backgroundColor: [
                                    "rgb(50, 147, 220, 0.9)",
                                    "rgb(250, 110, 51, 0.9)"
                                ],
                                hoverBackgroundColor: [
                                    "rgb(50, 147, 220)",
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

                    //Gráfico SeXO
                    var chartSEXO= document.getElementById("chartSEXO").getContext("2d");

                    var myChart = new Chart(chartSEXO, {
                        type: "bar",
                        data: {
                            labels: ["Masculino","Femenino"],
                                datasets: [{
                                    label: "SEXO",
                                    data: [100, 50],
                                    backgroundColor: [
                                        "rgb(50, 147, 220, 0.9)",
                                        "rgb(250, 110, 51, 0.9)"
                                    ],
                                    hoverBackgroundColor: [
                                        "rgb(50, 147, 220)",
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

                        //Gráfico ETAPA DE VIDA
                        var chartEV= document.getElementById("chartEV").getContext("2d");

                        var myChart = new Chart(chartEV, {
                            type: "bar",
                            data: {
                                labels: ["Joven","Adulto","Adulto Mayor"],
                                    datasets: [{
                                        label: "Etapa de Vida",
                                        data: [100, 50, 10],
                                        backgroundColor: [
                                            "rgb(50, 147, 220, 0.9)",
                                            "rgb(50, 147, 220, 0.9)",
                                            "rgb(50, 147, 220, 0.9)"
                                        ],
                                        hoverBackgroundColor: [
                                            "rgb(50, 147, 220)",
                                            "rgb(50, 147, 220)",
                                            "rgb(50, 147, 220)"
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




