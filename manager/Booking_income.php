<?php 
	include('../server.php');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: welcome.php');
  }
  if (($_SESSION['role']!=1)) {

    header('location: index.php');
    }
   
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: welcome.php");
  }

  //รายได้ในปี ไตรมาสที่ 1 
  if(isset($_SESSION['username'])){
    $sum_quarter1 = 0;
    $sum_month1 = 0;
    $sum_month2 = 0;
    $sum_month3 = 0;

    $select_quarter1 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-01-01' AND '2022-03-31'));";           
    $run_posts = mysqli_query($db, $select_quarter1);
    while($quarter1 = mysqli_fetch_array($run_posts)){
    $sum_quarter1 += $quarter1['bill_total'];
    }

    //รายได้ในเดือน1
    $month1 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-01-01' AND '2022-01-31'));";
    $run_m1 = mysqli_query($db, $month1);
    while($m1 = mysqli_fetch_array($run_m1)){
        $sum_month1 += $m1['bill_total'];
    }

    //รายได้ในเดือน2
    $month2 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-02-01' AND '2022-02-28'));";
    $run_m2 = mysqli_query($db, $month2);
    while($m2 = mysqli_fetch_array($run_m2)){
        $sum_month2 += $m2['bill_total'];
    }

    //รายได้ในเดือน3
    $month3 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-03-01' AND '2022-03-31'));";
    $run_m3 = mysqli_query($db, $month3);
    while($m3 = mysqli_fetch_array($run_m3)){
        $sum_month2 += $m3['bill_total'];
    }

    }
  //รายได้ในปี ไตรมาสที่ 2
  if(isset($_SESSION['username'])){
    $sum_quarter2 = 0;
    $sum_month4 = 0;
    $sum_month5 = 0;
    $sum_month6 = 0;

    $select_quarter2 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-04-01' AND '2022-06-30'));";         
    $run_posts = mysqli_query($db, $select_quarter2);
    while($quarter2 = mysqli_fetch_array($run_posts)){
    $sum_quarter2 += $quarter2['bill_total'];
    }

    //รายได้ในเดือน4
    $month4 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-04-01' AND '2022-04-30'));";
    $run_m4 = mysqli_query($db, $month4);
    while($m4 = mysqli_fetch_array($run_m4)){
        $sum_month4 += $m4['bill_total'];
    }

    //รายได้ในเดือน5
    $month5 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-05-01' AND '2022-05-31'));";
    $run_m5 = mysqli_query($db, $month5);
    while($m5 = mysqli_fetch_array($run_m5)){
        $sum_month5 += $m5['bill_total'];
    }

    //รายได้ในเดือน6
    $month6 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-06-01' AND '2022-06-30'));";
    $run_m6 = mysqli_query($db, $month6);
    while($m6 = mysqli_fetch_array($run_m3)){
        $sum_month6 += $m6['bill_total'];
    }

    }
  //รายได้ในปี ไตรมาสที่ 3
  if(isset($_SESSION['username'])){
    $sum_quarter3 = 0;
    $sum_month7 = 0;
    $sum_month8 = 0;
    $sum_month9 = 0;

    $select_quarter3 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-07-01' AND '2022-09-30'));";             
    $run_posts = mysqli_query($db, $select_quarter3);
    while($quarter3 = mysqli_fetch_array($run_posts)){
    $sum_quarter3 += $quarter3['bill_total'];
    }

    //รายได้ในเดือน7
    $month7 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-07-01' AND '2022-07-31'));";
    $run_m7 = mysqli_query($db, $month7);
    while($m7 = mysqli_fetch_array($run_m7)){
        $sum_month7 += $m7['bill_total'];
    }

    //รายได้ในเดือน8
    $month8 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-08-01' AND '2022-08-31'));";
    $run_m8 = mysqli_query($db, $month8);
    while($m8 = mysqli_fetch_array($run_m8)){
        $sum_month8 += $m8['bill_total'];
    }

    //รายได้ในเดือน9
    $month9 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-09-01' AND '2022-09-30'));";
    $run_m9 = mysqli_query($db, $month9);
    while($m9 = mysqli_fetch_array($run_m9)){
        $sum_month9 += $m9['bill_total'];
    }
    }
  //รายได้ในปี ไตรมาสที่ 4
  if(isset($_SESSION['username'])){
    $sum_quarter4 = 0;
    $sum_month10 = 0;
    $sum_month11 = 0;
    $sum_month12 = 0;

    $select_quarter4 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-10-01' AND '2022-12-31'));";              
    $run_posts = mysqli_query($db, $select_quarter4);
    while($quarter4 = mysqli_fetch_array($run_posts)){
    $sum_quarter4 += $quarter4['bill_total'];
    }

    //รายได้ในเดือน10
    $month10 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-10-01' AND '2022-10-31'));";
    $run_m10 = mysqli_query($db, $month10);
    while($m10 = mysqli_fetch_array($run_m10)){
        $sum_month10 += $m10['bill_total'];
    }

    //รายได้ในเดือน11
    $month11 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-11-01' AND '2022-11-30'));";
    $run_m11 = mysqli_query($db, $month11);
    while($m11 = mysqli_fetch_array($run_m11)){
        $sum_month11 += $m11['bill_total'];
    }

    //รายได้ในเดือน12
    $month12 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-12-01' AND '2022-12-31'));";
    $run_m12 = mysqli_query($db, $month12);
    while($m12 = mysqli_fetch_array($run_m12)){
        $sum_month12 += $m12['bill_total'];
    }


    }

?>
<!DOCTYPE html>
<html>
    <head>
      <title>NextGen Hotel</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/manager_style.css">
      <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
      <style>
          .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            #container {
                height: 400px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }

        
          .gridspace{
              display: grid;
              grid-template-columns: 500px auto 500px;
              grid-template-rows: auto auto;
              grid-template-areas: 
              'top top top'
              'left mid right';
              grid-row-gap: 5px;
              grid-column-gap: 5px;
              padding-top: 5px;
              padding-right: 5px;
              padding-left: 5px;
              padding-bottom: 5px;
          }
          .top-grid{
              grid-area: top;
          }
          .mid-grid{
              grid-area: mid;
          }
          .left-grid{
              grid-area: left;
          }
          .right-grid{
              grid-area: right;
          }
          .boxcontent{
              background: #000000;
              border: 1px #000000;
              box-sizing: border-box;
              border-radius:  10px 10px 0px 0px;
              padding: 10px;
          }
          .boxcontent1{
              background: #000000;
              border: 1px #000000;
              box-sizing: border-box;
              padding: 10px;
          }
          .boxcontent2{
              background: white;
              border: 1px solid rgb(255, 255, 255);
              box-sizing: border-box;
              padding: 10px;
          }
          .headcolor{
            color:white;
          }
          .footers{
          position: fixed;
          left: 0;
          bottom: 0;
        }
        .fontstyle{
            font-size: 50px;
            color:#708FFF;
        }
        .boxcontent3{
              background: black;
              border: 1px #000000;
              box-sizing: border-box;
              padding: 10px;
              height: 454px;
           
          }
      </style>
  </head>

  <body class="bodyimg">
    <ul>
        <li><a href="index.php"><i class="fa-solid fa-hotel">&nbsp;&nbsp;Next-Gen Hotel</i></a></li>
        <li style="float:right"><a href="index.php?logout='1'" class="active" style="text-decoration: none;"><i class="fa fa-user" aria-hidden="true">&nbsp; Logout</i></a></li>
        <li style="float:right"><a href="../index.php"><i class="fa fa-address-book" aria-hidden="true">&nbsp; Reservation</i></a></li>
    </ul>

    <div class="gridspace">
        <header class="top-grid">       
        </header>

        <div class="mid-grid">
          <div class="boxcontent" align="center">
            <h2 class="headcolor">Booking Income</h2>
          </div>

            <div class="boxcontent2">
                <script src="highcharts/highcharts.js"></script>
                <script src="highcharts/modules/data.js"></script>
                <script src="highcharts/modules/drilldown.js"></script>
                <script src="highcharts/modules/exporting.js"></script>
                <script src="highcharts/modules/export-data.js"></script>
                <script src="highcharts/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
                <script type="text/javascript">
                    Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'The bar graph shows the revenue from room bookings'
                    },
                    subtitle: {
                        text: 'From the 1st - 4th quarter 2022'
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Room Booking Income (Bath)'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {   
                                enabled: true,
                                format: '{point.y:.1f} BATH'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: Total <b>{point.y:.2f}</b> BATH<br/>'
                    },

                    series: [
                        {
                            name: "Quarter",
                            colorByPoint: true,
                            data: [
                                {
                                    name: "Quarter1",
                                    y: <?php echo $sum_quarter1;?>,
                                    drilldown: "Quarter1"
                                },
                                {
                                    name: "Quarter2",
                                    y: <?php echo $sum_quarter2;?>,
                                    drilldown: "Quarter2"
                                },
                                {
                                    name: "Quarter3",
                                    y: <?php echo $sum_quarter3;?>,
                                    drilldown: "Quarter3"
                                },
                                {
                                    name: "Quarter4",
                                    y: <?php echo $sum_quarter4;?>,
                                    drilldown: "Quarter4"
                                }
                            ]
                        }
                    ],
                    drilldown: {
                        breadcrumbs: {
                            position: {
                                align: 'right'
                            }
                        },
                        series: [
                            {
                                name: "Quarter1",
                                id: "Quarter1",
                                data: [
                                    [
                                        "January",
                                        <?php echo $sum_month1;?>
                                    ],
                                    [
                                        "February",
                                        <?php echo $sum_month2;?>
                                    ],
                                    [
                                        "March",
                                        <?php echo $sum_month3;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter2",
                                id: "Quarter2",
                                data: [
                                    [
                                        "April",
                                        <?php echo $sum_month4;?>
                                    ],
                                    [
                                        "May",
                                        <?php echo $sum_month5;?>
                                    ],
                                    [
                                        "June",
                                        <?php echo $sum_month6;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter3",
                                id: "Quarter3",
                                data: [
                                    [
                                        "July",
                                        <?php echo $sum_month7;?>
                                    ],
                                    [
                                        "August",
                                        <?php echo $sum_month8;?>
                                    ],
                                    [
                                        "September",
                                        <?php echo $sum_month9;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter4",
                                id: "Quarter4",
                                data: [
                                    [
                                        "October",
                                        <?php echo $sum_month10;?>
                                    ],
                                    [
                                        "November",
                                        <?php echo $sum_month11;?>
                                    ],
                                    [
                                        "December",
                                        <?php echo $sum_month12;?>
                                    ]
                                ]
                            }   
                        ]
                    }
                    });
                </script>
            </div>
        </div>
        
        <div class="left-grid">
            <div class="boxcontent1" align="center">
                <h2 class="headcolor">Menu</h2>
            </div>
            <div class="boxcontent3" align="center">
                <a href="Booking_income.php"><button class="buttonG buttonGS">Booking Income</button></a>
                <a href="Booking_list.php"><button class="buttonG buttonGS">Booking List</button></a>
                <a href="Booking_statics.php"><button class="buttonG buttonGS">Booking Statistics</button></a>
                <a href="Booking_statics2.php"><button class="buttonG buttonGS">Booking Statistics 2</button></a>
                <a href="Room_list.php"><button class="buttonG buttonGS">Room List</button></a>
                <a href="StaffAndCustomer_list.php"><button class="buttonG buttonGS">Staff and Customer List</button></a>
            </div>
        </div>

        <div class="right-grid">
            <div class="boxcontent1" align="center">
                    <h2 class="headcolor">2022 Revenue Summary</h2>
            </div>
            <div class="boxcontent2 "align="center">
                <h1 class="fontstyle"><?php  
                        $result_quarter = $sum_quarter1+$sum_quarter2+$sum_quarter3+$sum_quarter4;
                        echo $result_quarter;
                
                ?>  BATH</h1>
            </div>

        </div>
    <div class="paddingtop"></div>
    <div class="footer textfooter footers">
        <p>Follow Us</p>
        <a href="https://facebook.com"><i class="fa-brands fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com"><i class="fa-brands fa-instagram-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://line.me"><i class="fa-brands fa-line"></i></a>
        <br>

                License by Winai Wongthai
                <br>           
                Hotel Web Design & Online Marketing by NU Members of Internet Programming Subject
                <br>
                Tel +(66 5)583-1423|+(66 5)535-8972
                <br>
                (8:30-17:30 Mon - Sat)
                <br>
                Email:Sales@nextgenhotel.com

    </div>
      
    </body>
		
</body>
</html>