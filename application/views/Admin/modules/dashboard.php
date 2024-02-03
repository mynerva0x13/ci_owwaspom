<div class="container p-3">
    <div style="border-left: 5px solid blue; border-radius: 5px;" class="p-3">
        <h3><b>Total Scholar<b></h3>
        <p>Total Scholars: <?php echo $total_scolar ?></p>
    </div>
    <center>
    <div style="width:50%" class="p-5">
    
        <canvas id="myChart"></canvas>
        
    </div>
</center>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('myChart');

	new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: [
				'ODSP',
				'ODSP+',
				'EDSP',
                "EDSP+",
                "ELAP",
			],
			datasets: [{
				label: 'Total',
				data: [<?php echo "$odsp,$odsp_plus,$edpse,$edpse_plus,$ELAP" ?>],
				backgroundColor: [
					'rgb(92, 255, 143)',
					'rgb(255, 108, 92)',
					'rgb(255, 255, 92)',
					'rgb(92, 233, 255)',
					'rgb(228, 92, 255)'
				],
				hoverOffset: 4
			}]
		}
	});

</script>
<!-- <div class="container"> 
          <div class="row">
            <div class="col-lg-3 col-6 mb-3">

                <br>

                <div class="p-2 bg-info rounded-3" style="height: 160px">
                    <div class="inner">
                        <div class="fonts">
                            <br>
                            <h3><?php
                                ?>
                             <p>Total Scholars: <?php echo $total_scolar ?></p></h3>
                           
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="modules/reports/List_of_scholar/index.php" class="btn-info" style="text-decoration:none">More info <i class="fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">

                <br>

                <div class="green">
                    <div class="p-2 bg-success rounded-3" style="height: 70px">
                        <div class="inner">
                            <h3><?php echo $odsp ?><p>ODSP</p></h3>
                           
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                    
                    <div class="yellow">
                    <br>
                    <div class="p-2 bg-success rounded-3" style="height: 70px; width: 230px; margin-right: 100px">
                        <div class="inner">
                            <h3>                        <?php 

                            echo $odsp_plus;

                               
                                ?><p>ODSP+</p></h3>
                            
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                                </div>
                                </div>
                                <div class="col-lg-3 col-6 mb-3">
        

                <br>

                <div class="yellow">
                    <div class="p-2 bg-warning rounded-3" style="height: 70px">
                        <div class="inner">
                            <div class="fonts">
                                <h3><?php echo $edpse
                                ?> <p>EDSP</p></h3>
                               
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                    
                    <div class="">
                    <br>
                    <div class="p-2 bg-warning rounded-3" style="height: 70px; width: 230px; margin-right: 100px">
                    <div class="inner">
                            <div class="fonts">
                                <h3><?php echo $edpse_plus?>
                                  <p>EDSP+</p>
                                </h3>
                              
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                                </div>
                                </div>
                                <div class="col-lg-3 col-6 mb-3 ">
                
                <br>

                <div class="p-2 bg-danger rounded-3" style="height: 160px">
                    <div class="inner">
                        <br>
                        <h3>                        
                            <?php echo $ELAP ?>
                                  <p>ELAP</p>
                                </h3>
                      
                    </div>
                    <!-- <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div> -
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!--graph

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Online eme</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">820</span>
                        <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                    </p>
                </div>
                <!-- /.d-flex 

                <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                        <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">$18,230.00</span>
                        <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                        </span>
                        <span class="text-muted">Since last month</span>
                    </p>
                </div>
                <!-- /.d-flex 

                <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This year
                    </span>

                    <span>
                        <i class="fas fa-square text-gray"></i> Last year
                    </span>
                </div>
                </div>
            </div>
        </div>
    <!-- </div> 
    <?php

        /**
         * Inassume lang natin tong mga variables nato at arrays ay galing sa db.
         */
        $labels = ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        $data1 = [100, 200, 300, 250, 270, 250, 300];
        $data2 = [7, 17, 27, 20, 18, 15, 20];
    ?>




<script>
    $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels) //dine namn natin tinawag yung mga variables para sa labels nato para mashow sa graph ?>,
                datasets: [
                    {
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: <?php echo json_encode($data1) //dine namn natin tinawag yung mga variables para sa data nato para mashow sa graph ?>
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: <?php echo json_encode($data2) //dine namn natin tinawag yung mga variables para sa data nato para mashow sa graph ?>
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value) {
                        if (value >= 1000) {
                            value /= 1000
                            value += 'k'
                        }

                        return '$' + value
                        }
                    }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })

        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'], //kapareho lang din to nong asa taas same process lang din dine, in this case dine naman yung sa labels
                datasets: [{
                    type: 'line',
                    data: [100, 120, 170, 167, 180, 177, 160], //same goes here para sa unang dataset
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                    // pointHoverBackgroundColor: '#007bff',
                    // pointHoverBorderColor    : '#007bff'
                },
                {
                    type: 'line',
                    data: [60, 80, 70, 67, 80, 77, 100], //same here sa dataset
                    backgroundColor: 'tansparent',
                    borderColor: '#ced4da',
                    pointBorderColor: '#ced4da',
                    pointBackgroundColor: '#ced4da',
                    fill: false
                    // pointHoverBackgroundColor: '#ced4da',
                    // pointHoverBorderColor    : '#ced4da'
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                        suggestedMax: 200
                    }, ticksStyle)
                    }],
                    xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                    }]
                }
            }
        })
    })
</script> -->
