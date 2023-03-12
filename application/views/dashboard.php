<?php
defined('BASEPATH') OR exit('No direct script access allowed');




if($status == 'success'){
    ?>
<script>
Toastify({
  text: "Login Succesful..",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#55a630",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}

?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple rounded-circle">
                                        <i class="iconly-boldActivity"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Monthly Earnings</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue rounded-circle">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Today Earnings</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 ">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green rounded-circle">
                                        <i class="iconly-boldCalendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Today Bookings</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 ">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red rounded-circle">
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Remaining Bookings</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Last 7 Days Earnings</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-last7days"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Last 7 Days Earnings</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="app_assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Europe</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">862</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="app_assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">America</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">375</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-america"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="app_assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">1025</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-indonesia"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Feedback</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Feedback</th>
                                            <th>Rating </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            foreach ($feedbacks as $key => $value) {
                                                echo '<tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        
                                                        <p class="font-bold ms-3 mb-0">'.$value['cust_name'].'</p>
                                                    </div>
                                                </td>
                                                <td>
                                                <strong class="text-success">+ '.$value['feedback_title'].'</strong>
                                                <p class="mb-0">'.$value['feedback_description'].'</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        
                                                        <p class="ms-3 mb-0"> '; for($i=0;$i<$value['rating'];$i++){ echo '<i class="bi bi-star-fill text-warning"></i> ';}
                                                        echo '</p>
                                                    </div>
                                                </td>
                                                </tr>';
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl bg-warning me-3">
                            <span class="avatar-content"><?php echo $user_data->emp_name[0] ?></span>
                            <span class="avatar-status bg-success"></span>
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?php echo $user_data->emp_name ?></h5>
                            <h6 class="text-muted w-100 mb-0"><?php echo $user_data->role_name ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="app_assets/images/faces/4.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Hank Schrader</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="app_assets/images/faces/5.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="app_assets/images/faces/1.jpg">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">John Dodol</h5>
                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                            Conversation</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Customers Suummary</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

     $data=array_column($earnings,'SUM(trans_amt)');
     $datedata=array_column($earnings,'DATE(trans_date)');
     for($i=0;$i<count($datedata);$i++){
         $datedata[$i]=date('d F',strtotime($datedata[$i]));
     }
?>

<script>
    var last7DaysChartOptions = {
        annotations: {
            position: 'back'
        },
        dataLabels: {
            enabled:false
        },
        chart: {
            type: 'bar',
            height: 300
        },
        fill: {
            opacity:1
        },
        plotOptions: {
        },
        series: [{
            name: 'earnings',
            data: <?php echo json_encode($data) ?>
        }],
        colors: '#435ebe',
        xaxis: {
            categories: <?php echo json_encode($datedata) ?>
        }, 
    }

    const visitorsProfileChartOptions = {
        series: [44, 55, 17, 15],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['New', 'Returning', 'Direct', 'Others'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }


    var visitorsProfileChart = new ApexCharts(
        document.querySelector("#chart-visitors-profile"),
        visitorsProfileChartOptions
    );





    var last7DaysChart = new ApexCharts(
        document.querySelector("#chart-last7days"),
        last7DaysChartOptions
    );

    last7DaysChart.render();
    visitorsProfileChart.render();



</script>

