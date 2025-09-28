<?php headerAdmin($data); ?>
    <style>
        /* Estilos adicionales para el dashboard mejorado */
        .app-content {
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .dashboard-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dashboard-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .breadcrumb-modern {
            background: transparent;
            padding: 0;
            margin: 10px 0 0 0;
        }

        .breadcrumb-modern .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .breadcrumb-modern .breadcrumb-item a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-modern .breadcrumb-item a:hover {
            color: #ffd700;
            transform: translateY(-1px);
        }

        /* Tarjetas de estadísticas mejoradas */
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--card-color), var(--card-color-light));
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .stat-card.primary { --card-color: #667eea; --card-color-light: #764ba2; }
        .stat-card.info { --card-color: #06beb6; --card-color-light: #48b1bf; }
        .stat-card.warning { --card-color: #ffa726; --card-color-light: #ffcc02; }
        .stat-card.danger { --card-color: #ef5350; --card-color-light: #f093fb; }

        .stat-card .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--card-color), var(--card-color-light));
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .stat-card .stat-icon i {
            color: white;
            font-size: 1.8rem;
        }

        .stat-card .stat-info h4 {
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-card .stat-info p {
            font-size: 2rem;
            font-weight: 700;
            color: var(--card-color);
            margin: 0;
        }

        .linkw {
            text-decoration: none;
            display: block;
        }

        /* Secciones de contenido */
        .content-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }

        .section-title {
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #667eea;
        }

        /* Controles de búsqueda mejorados */
        .search-controls {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-input {
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: white;
        }

        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .search-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2, #667eea);
        }

        /* Tabla mejorada */
        .modern-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .modern-table thead th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            padding: 15px;
            border: none;
        }

        .modern-table tbody td {
            padding: 12px 15px;
            border: none;
            border-bottom: 1px solid #f1f3f4;
        }

        .modern-table tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        .action-btn {
            color: #667eea;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            color: #764ba2;
            transform: scale(1.2);
        }

        /* Gráficos contenedor */
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-title {
                font-size: 2rem;
            }
            
            .stat-card {
                text-align: center;
            }
            
            .search-controls {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>

    <main class="app-content">
        <!-- Header mejorado -->
        <div class="dashboard-header animate-fade-in">
            <h1 class="dashboard-title">
                <i class="fa fa-dashboard"></i>
                <?= $data['page_title'] ?>
            </h1>
            <ul class="breadcrumb-modern breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-home fa-lg"></i>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url(); ?>/dashboard">Dashboard</a>
                </li>
            </ul>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="row">
            <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
                <a href="<?= base_url() ?>/usuarios" class="linkw">
                    <div class="stat-card primary animate-fade-in">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h4>Usuarios</h4>
                            <p><?= $data['usuarios'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            
            <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
                <a href="<?= base_url() ?>/clientes" class="linkw">
                    <div class="stat-card info animate-fade-in" style="animation-delay: 0.1s">
                        <div class="stat-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="stat-info">
                            <h4>Clientes</h4>
                            <p><?= $data['clientes'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            
            <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
                <a href="<?= base_url() ?>/productos" class="linkw">
                    <div class="stat-card warning animate-fade-in" style="animation-delay: 0.2s">
                        <div class="stat-icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        <div class="stat-info">
                            <h4>Productos</h4>
                            <p><?= $data['productos'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            
            <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
                <a href="<?= base_url() ?>/pedidos" class="linkw">
                    <div class="stat-card danger animate-fade-in" style="animation-delay: 0.3s">
                        <div class="stat-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h4>Pedidos</h4>
                            <p><?= $data['pedidos'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="row">
            <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
            <div class="col-md-6">
                <div class="content-section animate-fade-in" style="animation-delay: 0.4s">
                    <h3 class="section-title">
                        <i class="fa fa-list"></i>
                        Últimos Pedidos
                    </h3>
                    <div class="modern-table">
                        <table class="table table-striped table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th class="text-right">Monto</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($data['lastOrders']) > 0 ){
                                        foreach ($data['lastOrders'] as $pedido) {
                                ?>
                                <tr>
                                    <td><strong><?= $pedido['idpedido'] ?></strong></td>
                                    <td><?= $pedido['nombre'] ?></td>
                                    <td>
                                        <span class="badge badge-info"><?= $pedido['status'] ?></span>
                                    </td>
                                    <td class="text-right">
                                        <strong><?= SMONEY." ".formatMoney($pedido['monto']) ?></strong>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>/pedidos/orden/<?= $pedido['idpedido'] ?>" 
                                           target="_blank" class="action-btn" title="Ver pedido">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } 
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="col-md-6">
                <div class="content-section animate-fade-in" style="animation-delay: 0.5s">
                    <h3 class="section-title">
                        <i class="fa fa-pie-chart"></i>
                        Tipo de pagos por mes
                    </h3>
                    <div class="search-controls">
                        <input class="search-input date-picker pagoMes" name="pagoMes" placeholder="Seleccionar mes y año">
                        <button type="button" class="search-btn" onclick="fntSearchPagos()">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                    <div class="chart-container">
                        <div id="pagosMesAnio"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-section animate-fade-in" style="animation-delay: 0.6s">
                    <h3 class="section-title">
                        <i class="fa fa-line-chart"></i>
                        Ventas por mes
                    </h3>
                    <div class="search-controls">
                        <input class="search-input date-picker ventasMes" name="ventasMes" placeholder="Seleccionar mes y año">
                        <button type="button" class="search-btn" onclick="fntSearchVMes()">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                    <div class="chart-container">
                        <div id="graficaMes"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="content-section animate-fade-in" style="animation-delay: 0.7s">
                    <h3 class="section-title">
                        <i class="fa fa-bar-chart"></i>
                        Ventas por año
                    </h3>
                    <div class="search-controls">
                        <input class="search-input ventasAnio" name="ventasAnio" placeholder="Año (ej: 2024)" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                        <button type="button" class="search-btn" onclick="fntSearchVAnio()">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                    <div class="chart-container">
                        <div id="graficaAnio"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php footerAdmin($data); ?>

<script>
    // Configuración mejorada para los gráficos
    Highcharts.setOptions({
        colors: ['#667eea', '#764ba2', '#06beb6', '#48b1bf', '#ffa726', '#ffcc02', '#ef5350', '#f093fb'],
        chart: {
            style: {
                fontFamily: '"Segoe UI", Tahoma, Geneva, Verdana, sans-serif'
            }
        }
    });

    // Gráfico de pagos por mes mejorado
    Highcharts.chart('pagosMesAnio', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            backgroundColor: 'transparent'
        },
        title: {
            text: 'Ventas por tipo pago<br><span style="font-size: 14px; color: #666;"><?= $data['pagosMes']['mes'].' '.$data['pagosMes']['anio'] ?></span>',
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
            backgroundColor: 'rgba(255,255,255,0.95)',
            borderRadius: 10,
            borderWidth: 0,
            shadow: true
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f}%',
                    style: {
                        fontSize: '12px',
                        textOutline: 'none'
                    }
                },
                showInLegend: true,
                borderWidth: 3,
                borderColor: '#fff'
            }
        },
        legend: {
            align: 'center',
            verticalAlign: 'bottom',
            layout: 'horizontal'
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data: [
            <?php 
                foreach ($data['pagosMes']['tipospago'] as $pagos) {
                    echo "{name:'".$pagos['tipopago']."',y:".$pagos['total']."},";
                }
            ?>
            ]
        }]
    });

    // Gráfico de ventas mensuales mejorado
    Highcharts.chart('graficaMes', {
        chart: {
            type: 'area',
            backgroundColor: 'transparent'
        },
        title: {
            text: 'Ventas diarias - <?= $data['ventasMDia']['mes'].' del '.$data['ventasMDia']['anio'] ?>',
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        subtitle: {
            text: 'Total: <?= SMONEY.'. '.formatMoney($data['ventasMDia']['total']) ?>',
            style: {
                fontSize: '14px',
                color: '#667eea',
                fontWeight: 'bold'
            }
        },
        xAxis: {
            categories: [
                <?php 
                    foreach ($data['ventasMDia']['ventas'] as $dia) {
                        echo $dia['dia'].",";
                    }
                ?>
            ],
            gridLineWidth: 1,
            gridLineColor: '#f0f0f0'
        },
        yAxis: {
            title: {
                text: 'Ventas',
                style: {
                    color: '#333'
                }
            },
            gridLineColor: '#f0f0f0'
        },
        tooltip: {
            backgroundColor: 'rgba(255,255,255,0.95)',
            borderRadius: 10,
            borderWidth: 0,
            shadow: true
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, 'rgba(102, 126, 234, 0.3)'],
                        [1, 'rgba(102, 126, 234, 0.05)']
                    ]
                },
                marker: {
                    radius: 6,
                    fillColor: '#667eea',
                    lineWidth: 2,
                    lineColor: '#fff'
                },
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 4
                    }
                }
            }
        },
        series: [{
            name: 'Ventas',
            data: [
                <?php 
                    foreach ($data['ventasMDia']['ventas'] as $dia) {
                        echo $dia['total'].",";
                    }
                ?>
            ]
        }]
    });
    
    // Gráfico anual mejorado
    Highcharts.chart('graficaAnio', {
        chart: {
            type: 'column',
            backgroundColor: 'transparent'
        },
        title: {
            text: 'Ventas del año <?= $data['ventasAnio']['anio'] ?>',
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        subtitle: {
            text: 'Estadísticas de ventas por mes',
            style: {
                fontSize: '14px',
                color: '#666'
            }
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '12px',
                    color: '#333'
                }
            },
            gridLineWidth: 0
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas',
                style: {
                    color: '#333'
                }
            },
            gridLineColor: '#f0f0f0'
        },
        legend: {
            enabled: false
        },
        tooltip: {
            backgroundColor: 'rgba(255,255,255,0.95)',
            borderRadius: 10,
            borderWidth: 0,
            shadow: true,
            pointFormat: 'Ventas: <b>{point.y:.0f}</b>'
        },
        plotOptions: {
            column: {
                borderRadius: 8,
                borderWidth: 0,
                colorByPoint: true
            }
        },
        series: [{
            name: 'Ventas',
            data: [
                <?php 
                    foreach ($data['ventasAnio']['meses'] as $mes) {
                        echo "['".$mes['mes']."',".$mes['venta']."],";
                    }
                ?>                 
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}',
                y: 10,
                style: {
                    fontSize: '11px',
                    fontWeight: 'bold',
                    textOutline: '1px contrast'
                }
            }
        }]
    });

    // Agregar efectos de hover a las tarjetas
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stat-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>