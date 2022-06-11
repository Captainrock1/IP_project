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
    $booking_quarter1 = mysqli_num_rows($run_posts);

    //รายได้ในเดือน1
    $month1 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-01-01' AND '2022-01-31'));";
    $run_m1 = mysqli_query($db, $month1);
    $booking_month1 = mysqli_num_rows($run_m1);


    //รายได้ในเดือน2
    $month2 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-02-01' AND '2022-02-28'));";
    $run_m2 = mysqli_query($db, $month2);
    $booking_month2 = mysqli_num_rows($run_m2);

    //รายได้ในเดือน3
    $month3 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-03-01' AND '2022-03-31'));";
    $run_m3 = mysqli_query($db, $month3);
    $booking_month3 = mysqli_num_rows($run_m3);

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
    $booking_quarter2 = mysqli_num_rows($run_posts);

    //รายได้ในเดือน4
    $month4 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-04-01' AND '2022-04-30'));";
    $run_m4 = mysqli_query($db, $month4);
    $booking_month4 = mysqli_num_rows($run_m4);

    //รายได้ในเดือน5
    $month5 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-05-01' AND '2022-05-31'));";
    $run_m5 = mysqli_query($db, $month5);
    $booking_month5 = mysqli_num_rows($run_m5);

    //รายได้ในเดือน6
    $month6 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-06-01' AND '2022-06-30'));";
    $run_m6 = mysqli_query($db, $month6);
    $booking_month6 = mysqli_num_rows($run_m6);

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
    $booking_quarter3 = mysqli_num_rows($run_posts);

    //รายได้ในเดือน7
    $month7 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-07-01' AND '2022-07-31'));";
    $run_m7 = mysqli_query($db, $month7);
    $booking_month7 = mysqli_num_rows($run_m7);

    //รายได้ในเดือน8
    $month8 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-08-01' AND '2022-08-31'));";
    $run_m8 = mysqli_query($db, $month8);
    $booking_month8 = mysqli_num_rows($run_m8);

    //รายได้ในเดือน9
    $month9 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-09-01' AND '2022-09-30'));";
    $run_m9 = mysqli_query($db, $month9);
    $booking_month9 = mysqli_num_rows($run_m9);
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
    $booking_quarter4 = mysqli_num_rows($run_posts);

    //รายได้ในเดือน10
    $month10 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-10-01' AND '2022-10-31'));";
    $run_m10 = mysqli_query($db, $month10);
    $booking_month10 = mysqli_num_rows($run_m10);

    //รายได้ในเดือน11
    $month11 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-11-01' AND '2022-11-30'));";
    $run_m11 = mysqli_query($db, $month11);
    $booking_month11 = mysqli_num_rows($run_m11);

    //รายได้ในเดือน12
    $month12 = "SELECT booking.book_id, booking.checkin, bill.bill_total
    FROM booking INNER JOIN bill ON booking.book_id = bill.book_id
    WHERE (((booking.checkin) BETWEEN '2022-12-01' AND '2022-12-31'));";
    $run_m12 = mysqli_query($db, $month12);
    $booking_month12 = mysqli_num_rows($run_m12);


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
            font-size: 25px;
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
            <h2 class="headcolor">Summary of bookings in 2022</h2>
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
                        text: 'Graph showing bookings'
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
                                format: '{point.y} Booking'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: Number of reservations <b>{point.y}</b> Booking<br/>'
                    },

                    series: [
                        {
                            name: "Quarter",
                            colorByPoint: true,
                            data: [
                                {
                                    name: "Quarter1",
                                    y: <?php echo $booking_quarter1;?>,
                                    drilldown: "Quarter1"
                                },
                                {
                                    name: "Quarter2",
                                    y: <?php echo $booking_quarter2;?>,
                                    drilldown: "Quarter2"
                                },
                                {
                                    name: "Quarter3",
                                    y: <?php echo $booking_quarter3;?>,
                                    drilldown: "Quarter3"
                                },
                                {
                                    name: "Quarter4",
                                    y: <?php echo $booking_quarter4;?>,
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
                                        <?php echo $booking_month1;?>
                                    ],
                                    [
                                        "February",
                                        <?php echo $booking_month2;?>
                                    ],
                                    [
                                        "March",
                                        <?php echo $booking_month3;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter2",
                                id: "Quarter2",
                                data: [
                                    [
                                        "April",
                                        <?php echo $booking_month4;?>
                                    ],
                                    [
                                        "May",
                                        <?php echo $booking_month5;?>
                                    ],
                                    [
                                        "June",
                                        <?php echo $booking_month6;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter3",
                                id: "Quarter3",
                                data: [
                                    [
                                        "July",
                                        <?php echo $booking_month7;?>
                                    ],
                                    [
                                        "August",
                                        <?php echo $booking_month8;?>
                                    ],
                                    [
                                        "September",
                                        <?php echo $booking_month9;?>
                                    ]
                                ]
                            },
                            {
                                name: "Quarter4",
                                id: "Quarter4",
                                data: [
                                    [
                                        "October",
                                        <?php echo $booking_month10;?>
                                    ],
                                    [
                                        "November",
                                        <?php echo $booking_month11;?>
                                    ],
                                    
                                    [
                                        "December",
                                        <?php echo $booking_month12;?>
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